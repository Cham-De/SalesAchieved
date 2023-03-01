<?php
    require 'connect.php';
    
    $query = "SELECT * FROM product";
    $result = mysqli_query($con, $query);
    if (mysqli_error($con)) {
        echo "Failed to connect to MySQL: " . mysqli_error($con);
        exit();
    }
?>