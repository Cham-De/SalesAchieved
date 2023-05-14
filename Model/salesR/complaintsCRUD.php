<?php
    require 'connect.php';
    if(isset($_POST['submit'])){
        $orderID = $_POST["orderID"];
        $productCode = $_POST["productCode"];
        $complaint = $_POST["complaint"];
        if(!empty($orderID) && !empty($productCode) && !empty($complaint))
		{
			mysqli_query($con, "INSERT INTO complaint(orderID, productCode, complaint) values('$orderID', '$productCode', '$complaint')");
            header("Location:../../Controller/salesR/complaints.php");
		}
		else
		{
			echo "<script>
            window.alert('Please enter valid information');
            window.location.href='complaints.php';
            </script>";
		}
        unset($_POST);
    }

    $query = "SELECT * FROM complaint INNER JOIN orders ON orders.orderID = complaint.orderID;";
    $result = mysqli_query($con, $query);
    if (mysqli_error($con)) {
        echo "Failed to connect to MySQL: " . mysqli_error($con);
        exit();
    }

    $query = "SELECT productCode, productName FROM product";
    $products = mysqli_query($con, $query);
    if (mysqli_error($con)) {
        echo "Failed to connect to MySQL: " . mysqli_error($con);
        exit();
    }

    $query = "SELECT orderID FROM orders WHERE orderStatus='Dispatched'";
    $dispatchedOrders = mysqli_query($con, $query);
    if (mysqli_error($con)) {
        echo "Failed to connect to MySQL: " . mysqli_error($con);
        exit();
    }
?>