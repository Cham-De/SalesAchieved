<?php
    require __DIR__.'/../connect.php';
    //Assigning the order
    if(isset($_POST['assign'])){
        $orderID = $_POST['orderID'];
        $username = $_SESSION["username"];
        mysqli_query($con, "UPDATE orders SET username = '$username' WHERE orderID = '$orderID'");
    }

    //Get order details
    $query = "SELECT * FROM orders
                WHERE username IS NULL";
    $result = mysqli_query($con, $query);

?>