<?php

require '../../Model/db-con.php';
require __DIR__.'/../../Model/utils.php';
$role = "Finance Manager";
$userData = check_login($role);
require __DIR__.'/../../Model/notificationCRUD.php';
$notifData = get_notification_data($role, $userData["username"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <link rel="stylesheet" href="../../View/styles/popup-btn-table.css">
    <link rel="stylesheet" href="../../View/styles/filter-buttons.css">
    <link rel="stylesheet" href="../../View/styles/finance/reports.css">
    <!-- Stylesheet for notification -->
    <link rel="stylesheet" href="../../View/styles/notification_fin.css">

    <style>
      .search-wrap-container{
        display: flex;
        justify-content: space-between;
      }

      .search_container{
        margin-left: 25%;
      }

      .nav_bar{
        margin-bottom: 2%;
      }
      .wrapper{
        display: flex;
        width: auto;
        margin-right: 8%;
      }

      div.side_bar ul li{
        padding-top: 8%;
        padding-bottom: 6%;
      }
      ul {
        list-style: none;
      }
      .initial{
        color: rgb(188, 191, 192);
        font-size: 2.3vh;
        font-weight: bolder;
        margin-top: 40%;
        margin-left: 35%;
      }
    </style>
</head>
<body>
<div class="nav_bar">
        <div class="user-wrapper">

        <!-- Notifications -->
        <div class="finIcon" onclick="toggleNotifi()">
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
        <ul class="icon-list">
            <li><a href="finance-home.php"><i style="margin-right: 2%;" class="fa-solid fa-house"></i>Home</a></li>
            <li><a href="commissions.php"><i style="margin-right: 2%;" class="fa-solid fa-money-check-dollar"></i>Commissions</a></li>
            <li><a href="products.php"><i style="margin-right: 2%;" class="fa-solid fa-boxes-stacked"></i>Products</a></li>
            <li><a href="sales.php"><i style="margin-right: 2%;" class="fa-solid fa-magnifying-glass-dollar"></i>Sales</a></li>
            <li><a href="payment.php"><i style="margin-right: 2%;" class="fa-solid fa-hand-holding-dollar"></i>Payments</a></li>
            <li class="active"><a href="reports.php"><i style="margin-right: 2%;" class="fa-solid fa-file-contract"></i>Reports</a></li>
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

    <div class="outer-container">
          <div class="left-column">
          <!-- content for left column goes here -->
          <ul>
            <!-- <li class="title_li">Sales</li> -->
          <!-- <li class="report_name" value="sales_report" onclick="getContent('sales_report')" >Sales Report</li> -->

          <li class="title_li">Inventory</li>
          <li class="report_name" value="inventory_report" onclick="getContent('inventory_report')">Inventory Report</li>

          <li class="title_li_below">Sales</li>
          <li class="report_name" value="budget_forecast" onclick="getContent('budget_forecast')">Sales Forecast</li>
          <li class="report_name" value="income_stmt" onclick="getContent('income_stmt')">Sales Income Statement</li>
          <!-- <li class="report_name" value="accounts_rec" onclick="getContent('accounts_rec')">Accounts Receivable</li> -->

          <li class="title_li_below">Performance</li>
          <li class="report_name" value="performance" onclick="getContent('performance')">Performance Review</li>
          </ul>
          </div>

          <div class="right-column">
            <div class="content">
              <p class="initial">Select a report</p>
            </div>
          </div>
    </div>
      
    <script>

      var reportName;
      function getContent(name){

        reportName = name;
        console.log("report name :",reportName);

        $(document).ready(function(){
          $.ajax({
            url: "reportsFetch.php",
            type: "POST",
            data: {reportName: reportName},
            success: function(response){
            // Handle the response from the server here
            console.log(response);
            $(".content").html(response);
          }
        });
      }); 
      }
    </script>

    <!-- Script for notifications functionality -->
    <script src="../../View/notification.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
</body>
</html>