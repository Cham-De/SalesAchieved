<?php

require '../../Model/db-con.php';
if(isset($_POST['commFil_op'])){
    $month_name = $_POST['commFil_op'];
    $month_num = date("m", strtotime($month_name));
  
    echo $month_num;
  }
?>