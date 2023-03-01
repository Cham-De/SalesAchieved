<?php
    require 'connect.php';
    $orderID = $_GET["orderID"];
    $query = "SELECT * FROM orders INNER JOIN customer ON orders.customerID = customer.customerID WHERE orderID = \"$orderID\";";
    $result = mysqli_query($con, $query);
    if (mysqli_error($con)) {
        echo "Failed to connect to MySQL: " . mysqli_error($con);
        exit();
    }
?>