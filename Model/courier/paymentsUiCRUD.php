<?php
    require __DIR__.'/../connect.php';

    $agentUsername = $_SESSION['username'];
    $query = "SELECT SUM(order_product.quantity * product.sellingPrice) as revenue, orders.orderID, actualDeliveryDate, approvalStatus FROM orders
                INNER JOIN slips ON slips.orderID = orders.orderID
                INNER JOIN order_product ON orders.orderID = order_product.orderID
                INNER JOIN product ON order_product.productCode = product.productCode
                WHERE agentUsername = 'courier1'
                GROUP BY orders.orderID;";
    $result = mysqli_query($con, $query);
    if(mysqli_error($con)){
        echo "Failed to connect to MYSQL: " . mysqli_error($con);
        exit();
    }
?>