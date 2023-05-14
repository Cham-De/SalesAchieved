<?php
//session_start();
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
    <title>Commissions</title>
    <!--stylesheet for icons-->
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <link rel="stylesheet" href="../../View/styles/popup-btn-table.css">
    <link rel="stylesheet" href="../../View/styles/searchNfilter.css">
    <!-- Stylesheet for notification -->
    <link rel="stylesheet" href="../../View/styles/notification_fin.css">
    
    <style>
      .chng_rate{
        display: inline-block;
        padding: 2%;
        background: #FFFFFF;
        border: 1px solid #D9D9D9;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 10px;
      }

      .chng_rate h4{
        position: relative;
        top: 50%;
        transform: translate(0, -50%);
      }

      .btn_cmpg_ex{
        display: flex;
        margin-left: 20%;
        justify-content: space-between;
        margin: 0 auto;
      }

      .fetchval{
        width: 15%;
        margin-left: 22%;
      }
      .rightmost-items{
        display: flex;
        width: 30%;
        margin-right: 2%;
      }

      .nav_bar{
        margin-bottom: 2%;
      }

      .search_container{
        margin-left: 25%;
      }

      #btnRate{
        cursor: pointer;
        border: none;
        background: #F8914A;
        color: white;
        padding: 3% 15px;
        border-radius: 12px;
        margin-left: 2%;
      }

      #btnRate:hover{
        font-weight: 200;
        color: #F8914A;
        border: 2px solid #F8914A;
        background: white;
      }

      div.side_bar ul li{
        padding-top: 8%;
        padding-bottom: 6%;
      }
      .topic {
      text-align: center;
      margin-bottom: 20px;
      font-size: 3.5vh;
    }
    
    .popup-modal{
    padding: 20px;
    margin-left: 35%;
    position: absolute;
    top: 50%;
    transform: translate(0, -50%);
    max-width: 500px;
    /*border: 1px solid rgba(131, 10, 10, 0.87);*/
    background: #FFFFFF;
    border: 1px solid rgba(222, 221, 221, 0.69);
    border-radius: 15px;
}
    </style>

</head>
<body>
  <!--common top nav and side bar content-->
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
            <li class="active"><a href="commissions.php"><i style="margin-right: 2%;" class="fa-solid fa-money-check-dollar"></i>Commissions</a></li>
            <li><a href="products.php"><i style="margin-right: 2%;" class="fa-solid fa-boxes-stacked"></i>Products</a></li>
            <li><a href="sales.php"><i style="margin-right: 2%;" class="fa-solid fa-magnifying-glass-dollar"></i>Sales</a></li>
            <li><a href="payment.php"><i style="margin-right: 2%;" class="fa-solid fa-hand-holding-dollar"></i>Payments</a></li>
            <li><a href="reports.php"><i style="margin-right: 2%;" class="fa-solid fa-file-contract"></i>Reports</a></li>
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
    <!---end of side and nav bars-->

    <div class="btn_cmpg_ex">
        <select name="commFil" class="fetchval" id="commFil">
          <option value="" disabled="" selected="" >--Select Month--</option>
          <?php
            for($i=0; $i<3; $i++){
              $month_filter = date("F", strtotime("-$i month"));
              echo '<option value="'.$month_filter.'">'.$month_filter.'</option>';
            }
          ?>
          <option style="background: rgba(133, 132, 132, 0.541);" value="reset_filter">Reset</option>
        </select>

        <?php
          $sql = "SELECT * FROM commissions
          ORDER BY commID DESC
          LIMIT 1";
          $query = mysqli_query($con, $sql);
             
          if(mysqli_num_rows($query) > 0 ){
            foreach($query as $thing){
    
        ?>
        <div class="rightmost-items">
        <div class="chng_rate" id="display_rate">
          <h4>Commission Rate: <?php echo $thing['commRate']; ?>%</h4>
        </div>
        <?php
        }

      }
      ?>
        <button id="btnRate" onclick="rateChange('<?php echo $thing['commDate']; ?>')">Change Rate</button>
        </div>
        

      </div>

      <script>
      var commFil = document.getElementById('commFil');
      const bttnRate = document.getElementById("btnRate");
      commFil.addEventListener('change', function() {
        filter_tables();
        if(commFil.value === "reset_filter"){
          bttnRate.style.display = "block";
        }
        else{
          bttnRate.style.display = "none";
        }
      });

      function filter_tables(){
        var commFil_op = document.getElementById("commFil").value;
        console.log("selected :", commFil_op);

        if(commFil_op === "reset_filter"){
          commFil_op.selectedIndex = 0;
        }

        // changing table
        $(document).ready(function(){
            $.ajax({
              url: "./fin_filter_copy.php",
              type: "POST",
              data: {commFil_op: commFil_op,
                identifier: 'commission_filter'},
              success: function(response){
              // Handle the response from the server here
              console.log("dynamic response :", response);
              $(".dynamic_content").html(response);
            }
          });
        }); 

        // changing commission rate in div
        $(document).ready(function(){
            $.ajax({
              url: "./fin_charts.php",
              type: "POST",
              data: {commFil_op: commFil_op},
              success: function(response){
              // Handle the response from the server here
              console.log(response);
              $(".chng_rate").html(response);
            }
          });
        }); 
      }


    </script>
    
    <!--table-->
    <div class="dynamic_content">
    <table class="content-table">
        <thead>
          <tr>
            <th>Sales Rep</th>
            <th>Revenue generated<br>(Rs.)</th>
            <th>Commission<br>(Rs.)</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $com = "SELECT o.orderID, o.orderStatus, u.name, o.orderDate, SUM((p.sellingPrice-p.buyingPrice) * op.quantity) as revenue, SUM((p.sellingPrice - p.buyingPrice) * op.quantity) * c.commRate / 100 AS commission_amount
          FROM orders o
          JOIN order_product op ON o.orderID = op.orderID
          JOIN product p ON op.productCode = p.productCode
          JOIN user u ON u.username = o.username
          JOIN commissions c ON DATE_FORMAT(c.commDate, '%Y-%m') = DATE_FORMAT(o.orderDate, '%Y-%m')
          WHERE o.orderStatus = 'Completed'
          GROUP BY u.name";

          $query = mysqli_query($con, $com);
          if(mysqli_num_rows($query) > 0 ){
            foreach($query as $thing){
              ?>
              <tr>
                <td><?=$thing['name']; ?></td>
                <td><?=$thing['revenue']; ?></td>
                <td><?=$thing['commission_amount']; ?></td>
              </tr>
              <?php
            }
          }
          else{
            echo "<h4>No records</h4>";
          }
          ?>
        </tbody>
      </table>
  </div>

      <?php
          $sql = "SELECT * FROM commissions
          ORDER BY commID DESC
          LIMIT 1";
          $query = mysqli_query($con, $sql);
             
          if(mysqli_num_rows($query) > 0 ){
            foreach($query as $thing){
    
    ?>
      <div class="popup-container" id="popup_container">
            <div class="popup-modal" style="max-width: 400px;  margin-left:10px;">

            </div>
      </div>
    <?php
        }

    }
    ?>
    <script>
      const btnRate = document.getElementById('btnRate');
      // const close = document.getElementById('close');
    // const save = document.getElementById('save');
    // const popup_container = document.getElementById('popup_container');

    btnRate.addEventListener('click', () => {
        popup_container.classList.add('show');
    });

    // close.addEventListener('click', () => {
    //     popup_container.classList.remove('show');
    // });

    // save.addEventListener('click', () => {
    //     popup_container.classList.remove('show');
    // });

    </script>

    <script>
      var rateDate;
      function rateChange(dateString){
        var date = new Date(Date.parse(dateString));
        var formatter = new Intl.DateTimeFormat('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
        var rateDate = formatter.format(date);
        console.log("latest date :",rateDate);

        $(document).ready(function(){
          $.ajax({
            url: "../../Model/finance/fin-crud.php",
            type: "POST",
            data: {rateDate: rateDate},
            success: function(response){
            // Handle the response from the server here
            console.log(response);
            $(".popup-modal").html(response);
          }
        });
      }); 
      }
    </script>

    <!-- Script for notifications functionality -->
    <script src="../../View/notification.js"></script>

    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
</body>
</html>