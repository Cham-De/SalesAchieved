<?php
    require 'connect.php';
    if(isset($_POST['submit'])){
        $customerID = $_POST["customerID"];
        $orderDetails = $_POST["orderDetails"];
        $orderStatus = $_POST["orderStatus"];
        $paymentMethod = $_POST["paymentMethod"];
        $deliveryDate = $_POST["deliveryDate"];
        $deliveryRegion = $_POST["deliveryRegion"];
        if(!empty($customerID) && !empty($orderDetails) && !empty($orderStatus) && !empty($paymentMethod) && !empty($deliveryDate) && !empty($deliveryRegion))
		{
			mysqli_query($con, "INSERT INTO orders(customerID, orderDetails, orderStatus, paymentMethod, deliveryDate, deliveryRegion) values('$customerID', '$orderDetails', '$orderStatus', '$paymentMethod', '$deliveryDate', '$deliveryRegion')");
			//echo("Error description: " . mysqli_error($con));
            header("Location:../../Controller/salesR/ordersUi.php");
		}
		else
		{
			echo "<script>window.alert('Please enter valid information');</script>";
		}
        unset($_POST);
    }

    // $query = "SELECT * FROM complaint INNER JOIN orders ON orders.orderID = complaint.orderID;";
    // $result = mysqli_query($con, $query);
    // if (mysqli_error($con)) {
    //     echo "Failed to connect to MySQL: " . mysqli_error($con);
    //     exit();
    // }
?>