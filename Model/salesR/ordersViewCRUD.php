<?php
    require 'connect.php';
    $orderID = $_GET["orderID"];
    $query = "SELECT * FROM orders INNER JOIN customer ON orders.customerID = customer.customerID
                                    LEFT JOIN slips ON orders.orderID = slips.orderID
                                    LEFT JOIN user ON orders.username = user.username WHERE orders.orderID = \"$orderID\";";
    $result = mysqli_query($con, $query);
    if (mysqli_error($con)) {
        echo "Failed to connect to MySQL: " . mysqli_error($con);
        exit();
    }

    $query = "SELECT * FROM orders INNER JOIN order_product ON orders.orderID = order_product.orderID 
        INNER JOIN product ON order_product.productCode = product.productCode 
        INNER JOIN delivery ON delivery.deliveryRegion = orders.deliveryRegion 
        WHERE orders.orderID = \"$orderID\";";
    $resultOrder = mysqli_query($con, $query);
    if (mysqli_error($con)) {
        echo "Failed to connect to MySQL: " . mysqli_error($con);
        exit();
    }
?>