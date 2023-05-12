<?php
    require __DIR__.'/../connect.php';

    $agentUsername = $_SESSION['username'];
    $query = "SELECT * FROM orders
                INNER JOIN customer ON customer.customerID = orders.customerID
                INNER JOIN delivery ON delivery.deliveryRegion = orders.deliveryRegion
                WHERE orderStatus = 'Completed' && agentUsername = '$agentUsername'";
    $result = mysqli_query($con, $query);
    if(mysqli_error($con)){
        echo "Failed to connect to MYSQL: " . mysqli_error($con);
        exit();
    }
?>