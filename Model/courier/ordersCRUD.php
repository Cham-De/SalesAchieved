<?php
    require __DIR__.'/../connect.php';
    
    $query = "SELECT * FROM orders INNER JOIN customer ON orders.customerID = customer.customerID;";
    $result = mysqli_query($con, $query);
    if (mysqli_error($con)) {
        echo "Failed to connect to MySQL: " . mysqli_error($con);
        exit();
    }
?>