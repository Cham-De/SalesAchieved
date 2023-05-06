<?php
    require __DIR__.'/../connect.php';
    if(isset($_POST['submit'])){
        $username = $_POST["username"];
        $customerID = $_POST["customerID"];
        // $orderStatus = $_POST["orderStatus"];
        $paymentMethod = $_POST["paymentMethod"];
        $deliveryDate = $_POST["deliveryDate"];
        $deliveryRegion = $_POST["deliveryRegion"];
        if(!empty($customerID) && !empty($paymentMethod) && !empty($deliveryDate) && !empty($deliveryRegion))
		{
            $check_customerID = mysqli_query($con, "SELECT customerID FROM customer where customerID = '$customerID'");
            if(mysqli_num_rows($check_customerID) > 0){
			    mysqli_query($con, "INSERT INTO orders(customerID, paymentMethod, deliveryDate, deliveryRegion, source, username) values('$customerID', '$paymentMethod', '$deliveryDate', '$deliveryRegion', 'Call', '$username')");
                $orderid = mysqli_insert_id($con);

                $orderDetails = $_POST["orderDetails"];
                $quantityDetails = $_POST["quantityDetails"];
                mysqli_query($con, "INSERT INTO order_product(orderID, productCode, quantity) values('$orderid', '$orderDetails', '$quantityDetails')");
                
                if (mysqli_connect_errno()) {
                    echo("Error description: " . mysqli_error($con) . ". Product ID: ". $orderDetails);
                    exit();
                }

                $i = 1;
                while (isset($_POST['orderDetails'.$i])) {
                    $orderDetails = $_POST["orderDetails".$i];
                    $quantityDetails = $_POST["quantityDetails".$i];
                    mysqli_query($con, "INSERT INTO order_product(orderID, productCode, quantity) values('$orderid', '$orderDetails', '$quantityDetails')");
                    $i += 1;
                }
			    
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

    //Search bar functionality
    if(isset($_POST['search'])){
        $orderSearch = $_POST['orderSearch'];
        $result = mysqli_query($con, "SELECT * FROM orders
                                        INNER JOIN customer ON customer.customerID = orders.customerID
                                        LEFT JOIN slips ON orders.orderID = slips.orderID 
                                        WHERE orders.orderID LIKE \"%$orderSearch%\" OR customerName LIKE \"%$orderSearch%\"");
        if (mysqli_error($con)) {
            echo "Failed to connect to MySQL: " . mysqli_error($con);
            exit();
        }
    }
    else{
        //Read Order Details
        $query = "SELECT orders.*, customer.*, slips.rejectedReason, approvalStatus
                    FROM orders 
                    INNER JOIN customer ON orders.customerID = customer.customerID 
                    LEFT JOIN slips ON orders.orderID = slips.orderID";
        $result = mysqli_query($con, $query);
        if (mysqli_error($con)) {
            echo "Failed to connect to MySQL: " . mysqli_error($con);
            exit();
        }
    }
?>