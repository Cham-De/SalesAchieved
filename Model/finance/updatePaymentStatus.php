<?php

session_start();
require '../db-con.php';

if (isset($_POST['status']) && isset($_POST['image_id'])) {
  $status = $_POST['status'];
  $id = $_POST['image_id'];


  if ($status === 'disapproved' && isset($_POST['reason'])) {
    $reason = $_POST['reason'];
    $sql = "UPDATE slips SET approvalStatus='$status', rejectedReason='$reason' WHERE orderID=$id";
  } else {
    $sql = "UPDATE slips SET approvalStatus='$status' WHERE orderID=$id";
  }

  // $sql = "UPDATE slips SET paymentStatus='$status' WHERE orderID=$id";
  $res = mysqli_query($con, $sql);

  header("Location: ../../Controller/finance/view-slip.php?orderID=" . $id);
}



?>