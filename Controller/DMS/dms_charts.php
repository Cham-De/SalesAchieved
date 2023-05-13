<?php

require '../../Model/db-con.php';

$chart1 = "SELECT MONTH(startdate) as month, SUM(budget) as monthlyBudget FROM campaign GROUP BY MONTH(startdate)";
$result = mysqli_query($con, $chart1);

$month = [];
$monthlyBudget = [];

if(mysqli_num_rows($result) > 0 ){
  foreach($result as $thing){
          $month_name = date('F', mktime(0, 0, 0, $thing['month'], 1));
          
          $month[] = $month_name;
          $monthlyBudget[] = $thing['monthlyBudget'];
      }
}

$chart2 = "SELECT COUNT(*) as countPlatform, socialMediaPlatform FROM customer GROUP BY socialMediaPlatform";
$result2 = mysqli_query($con, $chart2);

$channel = [];
$channelCount = [];

if(mysqli_num_rows($result2) > 0 ){
  foreach($result2 as $thing){
        
          $channel[] = $thing['socialMediaPlatform'];
          $channelCount[] = $thing['countPlatform'];
      }
}

$dms_kpi1 = "SELECT COUNT(*) as allcamps, SUM(budget) as wholeBudget FROM campaign";
$result_kpi1 = mysqli_query($con, $dms_kpi1);

if(mysqli_num_rows($result_kpi1) > 0 ){
  foreach($result_kpi1 as $thing){
        
          $avgBgt = $thing['wholeBudget']/$thing['allcamps'];
      }
}




if(isset($_POST['month_fil_op'])){
    $month_name = $_POST['month_fil_op'];
    $month_num = date("m", strtotime($month_name));

    if($month_name === "reset_filter"){
        $chart1 = "SELECT MONTH(startdate) as month, SUM(budget) as monthlyBudget FROM campaign GROUP BY MONTH(startdate)";
        $result = mysqli_query($con, $chart1);

        $month = [];
        $monthlyBudget = [];

        if(mysqli_num_rows($result) > 0 ){
        foreach($result as $thing){
                $month_name = date('F', mktime(0, 0, 0, $thing['month'], 1));
                
                $month[] = $month_name;
                $monthlyBudget[] = $thing['monthlyBudget'];
            }
        }
    }
    else{
        $chartFil1 = "SELECT MONTH(startdate) as month, SUM(budget) as objectiveBudget, objective FROM campaign WHERE MONTH(startdate) = $month_num GROUP BY objective ";
        $result = mysqli_query($con, $chartFil1);

        $objective = [];
        $objectiveBudget = [];

        if(mysqli_num_rows($result) > 0 ){
        foreach($result as $thing){
                $month_name = date('F', mktime(0, 0, 0, $thing['month'], 1));
                
                $objective[] = $thing['objective'];
                $objectiveBudget[] = $thing['objectiveBudget'];
            }
        }
    }

    ?>

    <div class="graphs-large">
        <div class="sales">
                <h2 class="card-title">Budget Variation</h2>
                <canvas id="dms_chart1"></canvas>
        </div>
         
    </div>

    <script>
        const chtfill1 = document.getElementById('dms_chart1');

        new Chart(chtfill1, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($objective) ?>,
            datasets: [{
            label: 'Total Budget Spent',
            data: <?php echo json_encode($objectiveBudget) ?>,
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

    </script>

    <?php
}
?>