<?php
    // require 'connect.php';
    include "../db-con.php";
    if(isset($_POST['submit'])){
        $customerID = $_POST["customerID"];
        $productCode = $_POST["productCode"];
        $orderStatus = $_POST["orderStatus"];
        $paymentMethod = $_POST["paymentMethod"];
        $deliveryDate = $_POST["deliveryDate"];
        $deliveryRegion = $_POST["deliveryRegion"];
        if(!empty($customerID) && !empty($productCode) && !empty($orderStatus) && !empty($paymentMethod) && !empty($deliveryDate) && !empty($deliveryRegion))
		{
            $check_customerID = mysqli_query($con, "SELECT customerID FROM customer where customerID = '$customerID'");
            if(mysqli_num_rows($check_customerID) > 0){
			    mysqli_query($con, "INSERT INTO orders(customerID, productCode, orderStatus, paymentMethod, deliveryDate, deliveryRegion) values('$customerID', '$productCode', '$orderStatus', '$paymentMethod', '$deliveryDate', '$deliveryRegion')");
			    // echo("Error description: " . mysqli_error($con));
                header("Location:../../Controller/salesR/ordersUi.php");
            }
            else{
                echo "<script>
                    window.alert('The customer ID you entered does not exist');
                    window.location.href='ordersUi.php';
                </script>";
            }
		}
		else
		{
			echo "<script>
                window.alert('Please enter valid information');
                window.location.href='ordersUi.php';
            </script>";
		}
        // unset($_POST);
    }

    // $query = "SELECT * FROM orders INNER JOIN customer ON orders.customerID = customer.customerID;";
    // $result = mysqli_query($con, $query);
    // if (mysqli_error($con)) {
    //     echo "Failed to connect to MySQL: " . mysqli_error($con);
    //     exit();
    // }
?>