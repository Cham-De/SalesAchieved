<?php
    require 'connect.php';
    //Read
    if(isset($_GET['orderID'])){
        $orderID = $_GET['orderID'];
        $query = "SELECT * FROM orders INNER JOIN customer ON orders.customerID = customer.customerID WHERE orderID='$orderID';";
        $result = mysqli_query($con, $query);
        if (mysqli_error($con)) {
            echo "Failed to connect to MySQL: " . mysqli_error($con);
            exit();
        }
    }
    
    //Update - Update order details
    if(isset($_POST['update'])){
        $orderID = $_GET['orderID'];
        $deliveryDate = htmlspecialchars($_POST["updateDeliveryDate"]);
        $paymentMethod = htmlspecialchars($_POST["updatePaymentMethod"]);
        $orderStatus = htmlspecialchars($_POST["updateOrderStatus"]);

        $sql = "UPDATE orders SET 
        deliveryDate='$deliveryDate', paymentMethod='$paymentMethod', orderStatus='$orderStatus' WHERE orderID='$orderID'";
        mysqli_query($con, $sql);
        header("Location:../../Controller/salesR/ordersUi.php");
    }