<?php
  //require __DIR__.'/../../Model/utils.php';
  require_once("../../Model/courier/landingUiCRUD.php");
  require __DIR__.'/../../Model/notificationCRUD.php';
  require_once("../../Model/courier/chartsCRUD.php");
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
    <!--Stylesheet for KPI Cards-->
    <link rel="stylesheet" href="../../View/styles/kpiCards.css">
    <!--Stylesheet for graphs-->
    <link rel="stylesheet" href="../../View/styles/graphs.css">
    <!-- <link rel="stylesheet" href="../../View/styles/filter-buttons.css"> -->
    <!-- Stylesheet for notification -->
    <link rel="stylesheet" href="../../View/styles/notification.css">
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <style>
    .side-bar-icons{
      margin-top: 45%;
    }
    .dropdown {
      position: relative;
      display: inline-block;
    }

    .wrapper{
        position: absolute;
        display: flex;
        width: 75%;
        top: 16%;
        margin-left:22%;
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
          <li class="active"><a href="landingUi.php"><i class="fa-solid fa-house"></i>Home</a></li>
          <li><a href="ordersUi.php"><i class="fa-solid fa-file-circle-check"></i>Orders</a></li>
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
    <!---end of side and nav bars-->

    <div class="wrapper">
            <div class="dropdown">
                 <select name="month_fil" id="month_fil">
                  <option value="" disabled="" selected="">--Select Month--</option>
                  <?php
                    for($i=0; $i<3; $i++){
                      $month_filter = date("F", strtotime("-$i month"));
                      echo '<option value="'.$month_filter.'">'.$month_filter.'</option>';
                    }
                  ?>
                  <option value="reset_filter">--Reset--</option>
                 </select>
             </div> 
    </div>
    
    <script>

      var month_fil = document.getElementById('month_fil');
      month_fil.addEventListener('change', function() {
        filter_charts();
      });

      function filter_charts(){
        var month_fil_op = document.getElementById("month_fil").value;
        console.log("selected :", month_fil_op);

        $(document).ready(function(){
                  $.ajax({
                    url: "../../Model/Courier/landingUiCRUD.php",
                    type: "POST",
                    data: {month_fil_op: month_fil_op},
                    success: function(response){
                    // Handle the response from the server here
                    console.log(response);
                    $(".KPIs").html(response);
                  }
                });
              }); 
      }


    </script>

    <!--KPI cards-->

    <main>
      <div class="last_card1">
        <div class="KPIs">
          <div class="card1">
            <?php
              $ordersAccepted = getOrdersAccepted($agentData['agentUsername']);
            ?>
            <h2>Accpted<br />Orders</h2>
            <h4>Monthly</h4>
            <h1><?php echo $ordersAccepted; ?></h1>
          </div>
          <div class="card2">
            <?php
              $completedOrders = getCompletedOrders($agentData['agentUsername']);
            ?>
            <h2>Completed <br>Orders </h2>
            <h4>Monthly</h4>
            <h1><?php echo $completedOrders; ?></h1>
          </div>
          <div class="card3">
            <?php
              $inCompletedOrders = getInCompletedOrders($agentData['agentUsername']);
            ?>
            <h2>Incompleted<br>Orders</h2>
            <h4>Monthly</h4>
            <h1><?php echo $inCompletedOrders; ?></h1>
          </div>
          <div class="card4">
            <?php
              $onTimeDeliveryRate = getOnTimeDeliveryRate($agentData['agentUsername']);
            ?>
            <h2>Ontime-Delivery <br>Rate </h2>
            <h4>Monthly</h4>
            <h1><?php echo $onTimeDeliveryRate; ?>%</h1>
          </div>
          <div class="card5">
            <?php
              $requestsPending = getRequestsPending($agentData['agentUsername']);
            ?>
            <h2>Requests <br>Pending </h2>
            <h4>Monthly</h4>
            <h1><?php echo $requestsPending; ?></h1>
          </div>
        </div>
        
        <!--graphs-->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <div class="graphs">
          <div class="gr1">
            <h2>Monthly Deliveries</h2>
            <img src="../../View/assets/graph1.png" alt="monthly sales">
          </div>
          <div class="gr2">
            <h2>Order Status</h2>
            <canvas id="orderStatusChart" style="margin: 0 auto;"></canvas>
          </div>
        </div>
      </div>
    </main>

    <script>
      var label = <?php echo json_encode($label)?>;
      var data = <?php echo json_encode($data)?>;
      const ctx = document.getElementById('orderStatusChart');
    
      const chart = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: label,
          datasets: [{
            label: 'Order Status',
            data: data,
            borderWidth: 1
          }]
        },
        options: {
          
        }
      });
      chart.resize(600, 600);
    </script>

    <script src="../../View/notification.js"></script>
  </body>


  <script>
        var myFunction = function(target) {
   target.parentNode.querySelector('.dropdown-content').classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.button__text')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
    </script>
  <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
  
</html>