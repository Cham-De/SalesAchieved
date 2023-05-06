<?php 
  require __DIR__.'/connect.php';

  function get_notification_data($role, $username){
    $query = "SELECT * FROM notification WHERE recipient  LIKE '%{$role}%' UNION SELECT * FROM notification WHERE recipient  LIKE '%;{$username};%'";
    $result = mysqli_query($GLOBALS['con'], $query);

    return $result;
  }
  
?>