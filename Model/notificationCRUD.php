<?php 
  require __DIR__.'/connect.php';

  function get_notification_data($role, $username){
    $query = "SELECT * FROM notification WHERE recipient  LIKE '%{$role}%' UNION SELECT * FROM notification WHERE recipient  LIKE '%;{$username};%'";
    $result = mysqli_query($GLOBALS['con'], $query);

    return $result;
  }

  function get_notification_data_agent($agentUsername){
    $query = "SELECT * FROM notification WHERE recipient LIKE '%;{$agentUsername};%'";
    $result = mysqli_query($GLOBALS['con'], $query);

    return $result;
  }

  if(isset($_POST['remove'])){
        $notificationID = $_POST["notificationID"];
        mysqli_query($con, "DELETE FROM notification WHERE notificationID = \"$notificationID\"");
  }
  
?>