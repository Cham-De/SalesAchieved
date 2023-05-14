<?php
//session_start();
require '../../Model/db-con.php';
require __DIR__.'/../../Model/utils.php';
require './fin_charts.php';
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
    <title>Finance Manager</title>
    <!--stylesheet for icons-->
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <link rel="stylesheet" href="../../View/styles/popup-btn-table.css">
    <link rel="stylesheet" href="../../View/styles/filter-buttons.css">
    <link rel="stylesheet" href="../../View/styles/cards-large.css">
    <!-- Stylesheet for notification -->
    <link rel="stylesheet" href="../../View/styles/notification_fin.css">

    <style>

    .card1, .card2{
        text-align: left;
    }
    .wrapper{
        position: absolute;
        display: flex;
        width: 75%;
        top: 16%;
        margin-left:22%;
    }

    div.side_bar ul li{
        padding-top: 8%;
        padding-bottom: 6%;
    }

    #charge_btn{
        cursor: pointer;
        border: none;
        background: #F8914A;
        color: white;
        padding: 10px 15px;
        border-radius: 12px;
        margin-left: 63%;
    }

    #charge_btn:hover{
        color: #F8914A;
        border: 2px solid #F8914A;
        background: white;
    }

    .graph-kpi{
      margin-top: 2%;
    }
    
    .topic {
      text-align: center;
      margin-bottom: 20px;
      font-size: 3.5vh;
    }

    .orders{
        border: 1px solid #D9D9D9;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 15px;
        width: 45%;
        text-align: center;
        margin-left: 3%;
    }
    .chartBox{
      margin-left: 11%;
      /* border: 1px solid black; */
      height: 90%;
      width: 70%;
    }
    .card-title{
      margin-bottom: 3%;
    }
    .error_msg{
      color: red;
      margin-bottom: 5%;
      text-align: center;
      display: none;
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
        <div class="notifi-box" id="box" style="border: 1px solid black;">
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
            <li class="active"><a href="index.php"><i style="margin-right: 2%;" class="fa-solid fa-house"></i>Home</a></li>
            <li><a href="commissions.php"><i style="margin-right: 2%;" class="fa-solid fa-money-check-dollar"></i>Commissions</a></li>
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


             <button id="charge_btn">Update Delivery Charges</button>
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
                    url: "./fin_charts.php",
                    type: "POST",
                    data: {month_fil_op: month_fil_op},
                    success: function(response){
                    // Handle the response from the server here
                    console.log(response);
                    $(".dynamic_content").html(response);
                  }
                });
              }); 
      }


    </script>

<!-- chart.js charts------------------------------------------- -->

 <div class="dynamic_content">
    <div class="graphs-large">

    <!-- sales revenue by month chart - unfiltered -->
        <div class="sales">
                <h2 class="card-title">Sales Revenue</h2> 
                <canvas id="myChart"></canvas>
        </div>

        <!-- sales revenue per product - no month filter -->
        <div class="products">
                <h2 class="card-title">Product Sales</h2>
                <canvas id="myChartP"></canvas>
        </div>  

    </div>
    
    <div class="graph-kpi">

    <!-- orders categorized by status - no month filter -->
        <div class="orders">
                <h2 class="card-title">Order Status</h2>
                <div class="chartBox"><canvas id="myChartO"></canvas></div>
        </div>
<!-- end of charts -->

        <div class="title-and-kpis">
        <div class="txt"><h2>Key Performance Indicators</h2></div>
            <div class="KPIs">

            <!-- average order processing time -->
                <div class="card1">
                    <h3>Average Order Processing Time</h3>
                    <h2><?php echo $days?> Days <?php 
                    if(($avg_time - $days) > 0){
                      $hours = ($avg_time - $days)*24;
                      echo $hours; ?> Hours <?php
                    }
                     ?></h2>
                </div>

                <!-- order fullfilment rate -->
                <div class="card2">
                    <h3>Order Fullfilment Rate</h3>
                    <h2><?php echo $fullfil_rate ?>%</h2>
                </div>
            </div>
    </div>

    </div>
  </div>  


  <!-- update delivery charges form------------------------------------------------------ -->
    <?php
          $sqlwc = "SELECT * FROM delivery WHERE deliveryRegion = 'Within Colombo' ";
          $querywc = mysqli_query($con, $sqlwc);
             
          while($rowswc = mysqli_fetch_assoc($querywc)){
            $chargewc = $rowswc['charges'];
          }

          $sqlcs = "SELECT * FROM delivery WHERE deliveryRegion = 'Colombo Suburbs' ";
          $querycs = mysqli_query($con, $sqlcs);
             
          while($rowscs = mysqli_fetch_assoc($querycs)){
            $chargecs = $rowscs['charges'];
          }

          $sqloc = "SELECT * FROM delivery WHERE deliveryRegion = 'Out of Colombo' ";
          $queryoc = mysqli_query($con, $sqloc);
             
          while($rowsoc = mysqli_fetch_assoc($queryoc)){
            $chargeoc = $rowsoc['charges'];
          }
    ?>
    <div class="popup-container" id="popup_container">
            <div class="popup-modal" style="max-width: 400px;">
              <div class="topic">Delivery Charges</div>
              <form name="delivery" action="../../Model/finance/fin-crud.php" method="post">
              <label for="colombo">Within Colombo (Rs.)
                <input type="number" step="any" id="s-date" name="wCol" value="<?php echo $chargewc; ?>" required min="40" max="1000">
              </label>
              <label for="suburbs">Colombo Suburbs (Rs.)
                <input type="number" step="any" id="ed" name="sCol" value="<?php echo $chargecs; ?>" required min="40" max="1000">
              </label> 
              <label for="outofcolombo">Out of Colombo (Rs.)
                <input type="number" step="any" id="budget" name="oCol" value="<?php echo $chargeoc; ?>" required min="40" max="1000">
              </label>
              <button class="cancel" id="close" type="reset" value="Reset" style="margin-left: 11%; margin-top: 2%; margin-bottom: 2%;">Cancel</button>
              <button class="submit" id="save" type="submit" value="Submit" name="update">Update</button>
              </form>
    
            </div>
    </div>
    <?php 
    ?>

    <script>

        const charge_btn = document.getElementById('charge_btn');
        const close = document.getElementById('close');
        const save = document.getElementById('save');
        const popup_container = document.getElementById('popup_container');
        const form = document.forms["delivery"];

        charge_btn.addEventListener('click', () => {
            popup_container.classList.add('show');
        });

        close.addEventListener('click', () => {
            popup_container.classList.remove('show');
            resetForm();
        });

        save.addEventListener('click', () => {
          if (validateForm()) {
            form.submit();
            popup_container.classList.remove('show');
          }
        });

        function resetForm() {
          form.reset();
        }

        function validateForm() {
          const wCol = form.elements["wCol"];
          const sCol = form.elements["sCol"];
          const oCol = form.elements["oCol"];

          if ((wCol.value) == "" || (sCol.value) == "" || (oCol.value) == "") {
            alert("Please enter a value");
            wCol.focus();
            return false;
          }
          else if ((wCol.value) > 1000) {
            alert("Please enter a value inside the range 40 - 1000");
            wCol.focus();
            return false;
          }
          return true;

        }


    </script>

<!-- popup functions------------------------------------------------------------- -->
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

    <!-- <script>
        

    </script> -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<!-- charts generation------------------------------------------ -->

<!-- first chart -->
<script>
  const ctx = document.getElementById('myChart');

new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?php echo json_encode($month) ?>,
    datasets: [{
      label: 'Total Sales Revenue Generated',
      data: <?php echo json_encode($revenue) ?>,
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      x: {
                ticks: {
                    font: {
                        weight: 'bold'
                    },
                    color: 'blue'
                }
            },
      y: {
        beginAtZero: true
      }
    },
    plugins: {
            legend: {
                labels: {
                    font: {
                        weight: 'bold'
                    },
                    color:'black'
                }
            }
        }
  }
});

// second bar chart
const pchart = document.getElementById('myChartP');

new Chart(pchart, {
  type: 'bar',
  data: {
    labels: <?php echo json_encode($codes) ?>,
    datasets: [{
      label: 'Sales Revenue per Product',
      data: <?php echo json_encode($tRevenue) ?>,
      backgroundColor: [
        'rgba(255, 99, 132, 0.5)', // red with opacity 0.2
        'rgba(54, 162, 235, 0.5)', // blue with opacity 0.2
        'rgba(255, 206, 86, 0.5)', // yellow with opacity 0.2
        'rgba(75, 192, 192, 0.5)', // green with opacity 0.2
        'rgba(153, 102, 255, 0.5)', // purple with opacity 0.2
        'rgba(255, 159, 64, 0.5)' // orange with opacity 0.2
      ],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      x: {
                ticks: {
                    font: {
                        weight: 'bold'
                    },
                    color: 'blue'
                }
            },
      y: {
        beginAtZero: true
      }
    },
    plugins: {
            legend: {
                labels: {
                    font: {
                        weight: 'bold'
                    },
                    color:'black'
                }
            }
        }
  }
});

// third chart - pie 
const Ochart = document.getElementById('myChartO');

new Chart(Ochart, {
  type: 'pie',
  data: {
    labels: <?php echo json_encode($stat) ?>,
    datasets: [{
      label: 'Order Status',
      data: <?php echo json_encode($num) ?>,
      backgroundColor: [
        'rgba(255, 99, 132, 0.6)', // red with opacity 0.2
        'rgba(54, 162, 235, 0.6)', // blue with opacity 0.2
        'rgba(255, 206, 86, 0.6)', // yellow with opacity 0.2
        'rgba(75, 192, 192, 0.8)', // green with opacity 0.2
        'rgba(153, 102, 255, 0.8)', // purple with opacity 0.2
        'rgba(255, 159, 64, 0.8)' // orange with opacity 0.2
      ],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    },
    plugins: {
            legend: {
                labels: {
                    font: {
                        weight: 'bold'
                    },
                    color:'black'
                }
            }
        }
  }
});
</script>
<!-- Script for notifications functionality -->
<script src="../../View/notification.js"></script>
<!-- <script src="./fin_charts.js"></script> -->
<script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
</body>
</html>