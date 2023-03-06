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
            $check_customerID = mysqli_query($con, "SELECT customerID FROM customer where customerID = '$customerID'");
            if(mysqli_num_rows($check_customerID) > 0){
			    mysqli_query($con, "INSERT INTO orders(customerID, orderDetails, orderStatus, paymentMethod, deliveryDate, deliveryRegion) values('$customerID', '$orderDetails', '$orderStatus', '$paymentMethod', '$deliveryDate', '$deliveryRegion')");
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
        unset($_POST);
    }

    //functions required for store views to view data
    $query_for_get_all_orders = "SELECT * FROM orders;";
    $result_for_get_all_orders = mysqli_query($con, $query_for_get_all_orders);
    if (mysqli_error($con)) {
        echo "Failed to connect to MySQL: " . mysqli_error($con);
        exit();
    }

    //functions required for store views to view data
    $query_for_get_customer_details = "SELECT * FROM customer;";
    $result_for_get_customer_details = mysqli_query($con, $query_for_get_customer_details);
    if (mysqli_error($con)) {
        echo "Failed to connect to MySQL: " . mysqli_error($con);
        exit();
    }
?>