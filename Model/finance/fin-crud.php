<?php

session_start();
require '../db-con.php';

if(isset($_POST['update'])){
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $wCol = mysqli_real_escape_string($con, $_POST['wCol']);
    $sCol = mysqli_real_escape_string($con, $_POST['sCol']);
    $oCol = mysqli_real_escape_string($con, $_POST['oCol']);
    
    $result = mysqli_query($con, "UPDATE delivery SET withCol = '$wCol', subCol = '$sCol', outCol = '$oCol' WHERE chargeID = $id");

    header("Location: ../../Controller/finance/finance-home.php ");
}

?>