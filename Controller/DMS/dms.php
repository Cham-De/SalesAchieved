<?php
require '../../Model/db-con.php';
require __DIR__.'/../../Model/utils.php';
require './dms_charts.php';
$role = "Digital Marketing Strategist";
$userData = check_login($role);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Marketing Strategist</title>
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <link rel="stylesheet" href="../../View/styles/popup-btn-table.css">
    <link rel="stylesheet" href="../../View/styles/filter-buttons.css">
    <link rel="stylesheet" href="../../View/styles/cards-large.css">
    <link rel="stylesheet" href="../../View/styles/stats.css">

    <style>
      #years, #months{
            font-size: 2.5vh;
            border: 1px solid #F8914A;
            border-radius: 5px;
            
        }
        .wrapper{
        position: absolute;
        display: flex;
        width: 70%;
        top: 16%;
        margin-left:25%;
    }

    .name{
        margin-top: 2%;
        margin-left:25%;
    }
    .view-card h1{
        margin-top: 45%;
    }
    .view-cards-wrapper{
        border: none;
    }
    .chartBox{
      margin-left: 11%;
      /* border: 1px solid black; */
      height: 90%;
      width: 70%;
    }
    .chartBoxbar{
      /* margin-left: 11%; */
      /* border: 1px solid black; */
      height: 100%;
      /* width: 70%; */
    }
    </style>
</head>
<body>
<div class="nav_bar">
        <div class="user-wrapper">
            <img src="../../View/assets/chamodi.png" width="50px" height="50px" alt="user image">
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
            <li class="active"><a href="dms.php"><i style="margin-right: 2%;" class="fa-solid fa-house"></i>Home</a></li>
            <li><a href="campaigns.php"><i style="margin-right: 2%;" class="fa-solid fa-globe"></i>Campaigns</a></li>
            <li><a href="stats.php"><i style="margin-right: 2%;" class="fa-solid fa-chart-line"></i>Statistics</a></li>
            <li><a href="cust-dms.php"><i style="margin-right: 2%;" class="fa-solid fa-users"></i></i>Customers</a></li>
        </ul>
        <table class="side-bar-icons">
          <tr>
            <td><i class="fa-regular fa-circle-user"></i></td>
            <td><a href="../home/profile.php">Profile</a></td>
          </tr>
          <tr>
            <td><i class="fa-solid fa-arrow-right-from-bracket"></i></i></td>
            <td><a href="../home/logout.php">Log out</a></td>
          </tr>
        </table>
    </div>
    

    <div class="wrapper">
        <div class="dropdown">
              <select name="month_fil" id="month_fil">
              <option value="" disabled="" selected="">--Select Month--</option>
              <?php
                for($i=0; $i<4; $i++){
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
                  url: "./dms_charts.php",
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- chart.js charts----------------------------------------- -->
<div class="dynamic_content">
    <div class="graphs-large">
        <div class="sales">
                <h2 class="card-title" style="margin-bottom: 5%;">Budget Variation</h2>
                <div class="chartBoxbar"><canvas id="dms_chart1"></canvas></div>
        </div>
        <div class="products">
                <h2 class="card-title">Social Media Channel Usage</h2>
                <div class="chartBox"><canvas id="dms_chart2"></canvas></div>
        </div>  
    </div>
        
<!-- kpis----------------------------------------------------- -->
    <div class="view-cards-wrapper">
      <h2 class="name">Key Performance Indicators</h2>
      <div class="kpi-cards-row">
      <div class="view-card">
        <table class="card-title-tb">
          <tr>
            <td>
              <h3>Avg. Budget Per Campaign</h3>
            </td>
          </tr>
        </table>
        <h1><?php echo 'Rs. '.$avgBgt.'.00'; ?></h1>
      </div>
      <div class="view-card">
      <table class="card-title-tb">
          <tr>
            <td>
              <i class="fa-sharp fa-solid fa-arrow-up-right-from-square fa-lg"></i>
            </td>
            <td>
              <h3>Page Visits</h3>
            </td>
          </tr>
        </table>
        <h1>50</h1>
      </div>
      <div class="view-card" style="margin-right: 3%;">
        <table class="card-title-tb">
          <tr>
            <td>
              <i class="fa-sharp fa-solid fa-bag-shopping fa-lg"></i>
            </td>
            <td>
              <h3>Engagement</h3>
            </td>
          </tr>
        </table>
        <h1>45%</h1>
      </div>
      </div>
      
    </div>
  </div>

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

        function show(anything){
          document.querySelector('.button__text').value = anything;
        }
    </script>

<!-- chart generation---------------------------------------------- -->
    <script>

        const cht1 = document.getElementById('dms_chart1');

        new Chart(cht1, {
          type: 'bar',
          data: {
            labels: <?php echo json_encode($month) ?>,
            datasets: [{
              label: 'Total Budget Spent',
              data: <?php echo json_encode($monthlyBudget) ?>,
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

        const cht2 = document.getElementById('dms_chart2');

        new Chart(cht2, {
          type: 'pie',
          data: {
            labels: <?php echo json_encode($channel) ?>,
            datasets: [{
              label: 'Social Media Channel Usage',
              data: <?php echo json_encode($channelCount) ?>,
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

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
</body>
</html>