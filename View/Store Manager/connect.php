<?php
    $con=new mysqli('localhost', 'root', '','stocks_addp');

    if(!$con){
        die(mysqli_error($con));
    }
?>