<?php
    require __DIR__.'/../../Model/utils.php';
    require_once("../../Model/salesR/salesUiCRUD.php");
    require __DIR__.'/../../Model/notificationCRUD.php';
    $userData = check_login("Sales Representative");
    $curDate = date("Y-m-d");
    $result = getOrderDetails($userData['username'], $curDate);
    $commRates = getCommissionRate();
    $role = "Sales Representative";
    $notifData = get_notification_data($role, $userData["username"]);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>SalesAchieved</title>
    <link rel="stylesheet"
      href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!--stylesheet for icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Stylesheet for nav bar-->
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <!--Stylesheet for tables-->
    <link rel="stylesheet" href="../../View/styles/table.css">
    <!--Stylesheet for table navigation buttons-->
    <link rel="stylesheet" href="../../View/styles/navButtons.css">
    <link rel="stylesheet" href="../../View/styles/salesR/salesUi.css">
     <!-- Stylesheet for notification -->
    <link rel="stylesheet" href="../../View/styles/notification.css">

    <style>
      div.side_bar ul li{
        padding-top: 8%;
        padding-bottom: 4%;
    }

    .side-bar-icons{
      margin-top: 20%;
    }
    .content-table{
      margin-left: 22%;
    }
    </style>
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
                <p>$message</p>
                
              </div>
              <div style='margin-right: 0;margin-left: auto; display:block;'>
              <form method='post'>
              <input type='hidden' name='notificationID' value='$notificationID'>
              <button id='remove' type='submit' value='remove' name='remove' style='border: none;padding: 0px;background-color: white;'>
                <i class='fa-regular fa-circle-xmark' style='cursor: pointer;'></i>
              </button>
              </form>
              </div>
            </div>";
          }
          ?>
        </div>

          <img src="../../View/assets/man.png" width="50px" height="50px" alt="user image">
          <div>
            <h4><?php echo $userData['name'];?></h4>
            <small><?php echo $userData['user_role'];?></small>
          </div>
      </div>
  </div>

  <div class="side_bar">
      <div class="logo">
          <img src="../../View/assets/saleslogo-final.png" width= "70%" height="70%">
      </div>
      <ul>
          <li><a href="landingUi.php"><i class="fa-solid fa-house"></i>Home</a></li>
          <li><a href="ordersUi.php"><i class="fa-solid fa-file-circle-check"></i>Orders</a></li>
          <li><a href="customersUi.php"><i class="fa-solid fa-user-group"></i>Customers</a></li>
          <li><a href="stocksUi.php"><i class="fa-solid fa-warehouse"></i>Stocks</a></li>
          <li class="active"><a href="salesUi.php"><i class="fa-solid fa-sack-dollar"></i>Sales</a></li>
          <li><a href="complaints.php"><i class="fa-solid fa-comment"></i>Complaints</a></li>
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
                <th>Completion Date</th>
                <th>Revenue<br>(Rs.)</th>
                <th>Commission<br>(Rs.)</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $currentCommission = 0;
            while ($row = mysqli_fetch_array($result)){
              $orderID = $row['orderID'];
              $completionDate = $row['completionDate'];
              $revenue = $row['revenue'];
              $commission = $revenue * $commRates[substr($completionDate, 0, 7)] / 100;
              $currentCommission = $currentCommission + $commission;

              echo "
              <tr>
                  <td>$orderID</td>
                  <td>$completionDate</td>
                  <td>$revenue</td>
                  <td>$commission</td>
              </tr>";
            }?>
        </tbody>
      </table>

    <!--Table navigation-->
    <div class="navigation-table" id="nav_table">
        <i class="fa-solid fa-circle-chevron-left fa-lg"></i>
        <i class="fa-solid fa-circle-chevron-right fa-lg"></i>
    </div>

    <!--Commission Rate-->
    <div class="commissionRate">
        <h3>Commission Rate: </h3>
        <h2><?php echo $commRates[substr($curDate, 0, 7)]; ?> %</h2>
    </div>

    <!--Current Commission-->
    <div class="currentCommission">
        <h3>Current Commission: </h3>
        <h2><?php echo $currentCommission?></h2>
    </div>

    <!-- Script for notifications functionality -->
    <script src="../../View/notification.js"></script>

  </body>
</html>