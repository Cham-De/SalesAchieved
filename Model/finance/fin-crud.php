<?php

session_start();
require '../db-con.php';

if(isset($_POST['save'])){

    $wCol = mysqli_real_escape_string($con, $_POST['wCol']);
    $sCol = mysqli_real_escape_string($con, $_POST['sCol']);
    $oCol = mysqli_real_escape_string($con, $_POST['oCol']);
}

$data = $_POST;

if (empty($data['wCol']) ||
    empty($data['sCol']) ||
    empty($data['oCol'])) {
    
    die('Please fill all required fields!');
}
else{
    $sql = "INSERT INTO delivery (withCol, subCol, outCol) values ('$wCol','$sCol','$oCol')";
}


$query = mysqli_query($con, $sql);
if($query){

    $_SESSION['message'] = "User added successfully";
    header("Location: ../../Controller/finance/finance-home.php ");
    exit(0);
}
else{
    $_SESSION['message'] = "User not added";
    header("Location: ../../Controller/finance/finance-home.php ");
    exit(0);
}

?>