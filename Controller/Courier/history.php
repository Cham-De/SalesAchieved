<?php
    require __DIR__.'/../../Model/utils.php';
    require_once("../../Model/courier/historyCRUD.php");
    require __DIR__.'/../../Model/notificationCRUD.php';
    $agentData = courier_check_login();
    $notifData = get_notification_data_agent($agentData["agentUsername"]);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Courier-Dashboard</title>
    <link rel="stylesheet"
      href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!--stylesheet for icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Stylesheet for nav bar-->
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <!--Stylesheet for table-->
    <link rel="stylesheet" href="../../View/styles/table.css">
    <!--Stylesheet for requests.php-->
    <link rel="stylesheet" href="../../View/styles/courier/requestsUi.css">
    <!-- Stylesheet for notification -->
    <link rel="stylesheet" href="../../View/styles/notification.css">

  </head>
  <body>
    <!--common top nav and side bar content-->
    <div class="nav_bar">

      <div class="user-wrapper">

      <a href="calendar.php"><i class="fa-solid fa-calendar-days"></i></a>

      <!-- Notifications -->
      <div class="icon" onclick="toggleNotifi()">
          <i class="fa-solid fa-bell"></i><span><?php echo mysqli_num_rows($notifData) ?></span>
        </div>
        <div class="notifi-box" id="box">
          <h2>Notifications <span><?php echo mysqli_num_rows($notifData) ?></span></h2>
            <?php 
              while ($row = mysqli_fetch_array($notifData)){
                $title = $row['title'];
                $message = $row['message'];
                $notificationID = $row['notificationID'];
                echo  "
                <div class='notifi-item' style='display:none;'>
                <i class='fa-solid fa-circle-info' style='font-size:2em;padding-left: 10px;'></i>
                  <div class='text'>
                    <h4>$title</h4>
                    <form method='post'>
                      <input type='hidden' name='notificationID' value='$notificationID'>
                      <button id='remove' class='remove' type='remove' value='remove' name='remove' style='border: none; background-color: transparent;'>
                        <i class='fa-regular fa-circle-xmark' style='padding-left: 200px; cursor: pointer;'></i>
                      </button>
                    </form>
                    <p>$message</p>
                  </div>
                </div>";
              }
            ?>
        </div>

          <img src="../../View/assets/man.png" width="50px" height="50px" alt="user image">
          <div>
              <h4><?php echo $agentData['companyName'];?></h4>
              <small>Courier</small>
          </div>
      </div>
  </div>

  <div class="side_bar">
      <div class="logo">
          <img src="../../View/assets/saleslogo-final.png" width="70%" height="70%">
      </div>
      <ul>
          <li><a href="landingUi.php"><i class="fa-solid fa-house"></i>Home</a></li>
          <li class="active"><a href="ordersUi.php"><i class="fa-solid fa-file-circle-check"></i>Orders</a></li>
          <li><a href="paymentsUi.php"><i class="fa-solid fa-user-group"></i>Payments</a></li>
          <li><a href="requests.php"><i class="fa-solid fa-circle-exclamation"></i>Requests</a></li>
      </ul>
      <table class="side-bar-icons">
          <tr>
            <td><i class="fa-regular fa-circle-user"></i></td>
            <td><a href="./profile.php">Profile</a></td>
          </tr>
          <tr>
            <td><i class="fa-solid fa-arrow-right-from-bracket"></i></i></td>
            <td><a href="../home/logout.php">Log out</a></td>
          </tr>
        </table>
  </div>
  <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
  <!---end of side and nav bars-->

<!--Table-->
<table class="content-table">
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Delivery Date</th>
            <th>Address</th>
            <th>Delivery Charges<br/>(Rs.)</th>
        </tr>
    </thead>
    <?php
        while($row = mysqli_fetch_array($result)){
    ?>
    <tbody>
        <tr>
            <td><?php echo $row['orderID'];?></td>
            <td><?php echo $row['actualDeliveryDate'];?></td>
            <td><?php echo $row['address'];?></td>
            <td><?php echo $row['charges'];?></td>
        </tr>
    </tbody>
    <?php } ?>
  </table>
  
  <script src="../../View/notification.js"></script>
  
</body>
</html>