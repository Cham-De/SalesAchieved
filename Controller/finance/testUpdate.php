<?php

session_start();
require '../db-con.php';

if (!isset($_POST['orderID']) || !isset($_POST['paymentStatus'])) {
  die('Error: orderID or paymentStatus not set');
}

$orderID = $_POST['orderID'];
$paymentStatus = $_POST['paymentStatus'];

$sql = "UPDATE slips SET paymentStatus='$paymentStatus' WHERE orderID=$orderID";

$res = mysqli_query($con,  $sql);

?>