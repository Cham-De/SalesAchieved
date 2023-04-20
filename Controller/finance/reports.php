<?php
session_start();
require '../../Model/db-con.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <link rel="stylesheet" href="../../View/styles/popup-btn-table.css">
    <link rel="stylesheet" href="../../View/styles/filter-buttons.css">
    <link rel="stylesheet" href="../../View/styles/finance/reports.css">

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
      
    </style>
</head>
<body>
<div class="nav_bar">
        <div class="user-wrapper">
            <img src="../../View/assets/man.png" width="50px" height="50px" alt="user image">
            <div>
                <h4>John Doe</h4>
                <small style="color:rgb(235, 137, 58)">Finance Manager</small>
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
          <ul><li class="title_li">Daily</li>
          <li class="report_name">Sales Report</li>
          <li class="report_name">Accounts Receivable</li>

          <li class="title_li_below">Weekly</li>
          <li class="report_name">Inventory Report</li>

          <li class="title_li_below">Monthly</li>
          <li class="report_name">Income Statement</li>
          <li class="report_name">Budget Forecast</li>

          <li class="title_li_below">Unspecified</li>
          <li class="report_name">Performance Review</li>
          </ul>
          </div>

          <div class="right-column">
            <div class="content">
              <h3>Performance Review</h3>
              <Label for="subjet" class="subject_label">Select a subject</Label>
              <select name="subject" id="subject">
              <option value="" disabled="" selected="" >Select Subject</option>
                <option value="">Products</option>
                <option value="">Users</option>
                <option value="">Processes</option>
              </select>

              <Label for="month_range" class="subject_label">Month</Label>
              <select name="month" id="month">
                <option value="" disabled="" selected="" >--Select--</option>
                <option value="">January</option>
                <option value="">February</option>
                <option value="">March</option>
                <option value="">April</option>
                <option value="">May</option>
                <option value="">June</option>
                <option value="">July</option>
              </select>

            </div>
          </div>
    </div>
      
    


    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
</body>
</html>