<?php
require '../../Model/db-con.php';

$querySales = "SELECT MONTH(o.orderDate) AS month, SUM((p.sellingPrice-p.buyingPrice) * d.quantity) as revenue
FROM order_product d
JOIN product p ON d.productCode = p.productCode
JOIN orders o ON o.orderID = d.orderID
GROUP BY MONTH(o.orderDate)";

$result = mysqli_query($con, $querySales);

$month = [];
$revenue = [];

if(mysqli_num_rows($result) > 0 ){
  foreach($result as $thing){
          $month_name = date('F', mktime(0, 0, 0, $thing['month'], 1));
          
          $month[] = $month_name;
          $revenue[] = $thing['revenue'];
      }
}

$queryProducts = "SELECT p.productCode, ((p.sellingPrice-p.buyingPrice) * SUM(order_product.quantity)) as totalRevenue
FROM product p
INNER JOIN order_product ON order_product.productCode = p.productCode
GROUP BY p.productCode
";

$resultP = mysqli_query($con, $queryProducts);

$codes = [];
$tRevenue = [];

if(mysqli_num_rows($resultP) > 0 ){
  foreach($resultP as $thingP){
          $codes[] = $thingP['productCode'];
          $tRevenue[] = $thingP['totalRevenue'];
      }
}

$queryStat = "SELECT orderStatus, COUNT(*) as num_orders
FROM orders
GROUP BY orderStatus";

$resultS = mysqli_query($con, $queryStat);

$stat = [];
$num = [];

if(mysqli_num_rows($resultS) > 0 ){
  foreach($resultS as $thingS){
          $stat[] = $thingS['orderStatus'];
          $num[] = $thingS['num_orders'];
      }
}

// kpis

$kpi_1 = "SELECT SUM(DATEDIFF(dispatchDate, orderDate)) AS total_diff, COUNT(*) AS all_orders, SUM(CASE WHEN orderStatus = 'Completed' THEN 1 ELSE 0 END) AS success_orders FROM orders";
$resultK1 = mysqli_query($con, $kpi_1);

if(mysqli_num_rows($resultK1) > 0 ){
  foreach($resultK1 as $thingK1){
          
          $avg_time = $thingK1['total_diff']/$thingK1['all_orders'];
          $days = floor($avg_time);
          $success = $thingK1['success_orders'];
          $fullfil_rate = ($success/$thingK1['all_orders'])*100;
          $fullfil_rate = round($fullfil_rate, 2);

      }
}

// filtering content----------------------------------------------------------------------
if(isset($_POST['month_fil_op'])){
  $month_name = $_POST['month_fil_op'];
  $month_num = date("m", strtotime($month_name));

  //reset for the first chart
  if($month_name == "reset_filter"){

    $labelSalesFIL = 'Total Sales Revenue Generated';

    $querySalesFil = "SELECT MONTH(o.orderDate) AS month, SUM((p.sellingPrice-p.buyingPrice) * d.quantity) as revenue
    FROM order_product d
    JOIN product p ON d.productCode = p.productCode
    JOIN orders o ON o.orderID = d.orderID
    GROUP BY MONTH(o.orderDate)";

    $result = mysqli_query($con, $querySalesFil);

    $label = [];
    $data = [];

    if(mysqli_num_rows($result) > 0 ){
      foreach($result as $thing){
              $month_name2 = date('F', mktime(0, 0, 0, $thing['month'], 1));

              $label[] = $month_name2;
              $data[] = $thing['revenue'];
          }
    }
    
    $queryProducts = "SELECT p.productCode, ((p.sellingPrice-p.buyingPrice) * SUM(order_product.quantity)) as totalRevenue
    FROM product p
    INNER JOIN order_product ON order_product.productCode = p.productCode
    GROUP BY p.productCode
    ";

    $resultP = mysqli_query($con, $queryProducts);

    $labelP = [];
    $dataP = [];

    if(mysqli_num_rows($resultP) > 0 ){
      foreach($resultP as $thingP){
            $labelP[] = $thingP['productCode'];
            $dataP[] = $thingP['totalRevenue'];
          }
    }

    $queryStat = "SELECT orderStatus, COUNT(*) as num_orders
    FROM orders
    GROUP BY orderStatus";

    $resultS = mysqli_query($con, $queryStat);

    $labelS = [];
    $dataS = [];

    if(mysqli_num_rows($resultS) > 0 ){
      foreach($resultS as $thingS){
            $labelS[] = $thingS['orderStatus'];
            $dataS[] = $thingS['num_orders'];
          }
    }

    $kpi_1 = "SELECT SUM(DATEDIFF(dispatchDate, orderDate)) AS total_diff, COUNT(*) AS all_orders, SUM(CASE WHEN orderStatus = 'Completed' THEN 1 ELSE 0 END) AS success_orders FROM orders";
    
    $resultK1 = mysqli_query($con, $kpi_1);

    if(mysqli_num_rows($resultK1) > 0 ){
      foreach($resultK1 as $thingK1){
              
              $avg_time = $thingK1['total_diff']/$thingK1['all_orders'];
              $days = floor($avg_time);
              $success = $thingK1['success_orders'];
              $fullfil_rate = ($success/$thingK1['all_orders'])*100;
              $fullfil_rate = round($fullfil_rate, 2);

          }
    }

  }
  else{

    $labelSalesFIL = 'Sales Revenue Generated in ' .$month_name;

    $querySalesFil = "SELECT u.name, o.orderDate, SUM(p.sellingPrice * d.quantity) as revenue
    FROM order_product d
    JOIN product p ON d.productCode = p.productCode
    JOIN orders o ON o.orderID = d.orderID
    JOIN user u ON u.username = o.username
    WHERE MONTH(o.orderDate) = $month_num
    GROUP BY u.name, MONTH(o.orderDate)
    ";
    $result = mysqli_query($con, $querySalesFil);
    
    $label = [];
    $data = [];
    
    if(mysqli_num_rows($result) > 0 ){
      foreach($result as $thing){
              
              $label[] = $thing['name'];
              $data[] = $thing['revenue'];
          }
    }


    $queryProducts = "SELECT o.orderDate, p.productCode, ((p.sellingPrice-p.buyingPrice) * SUM(order_product.quantity)) as totalRevenue
    FROM product p
    INNER JOIN order_product ON order_product.productCode = p.productCode
    JOIN orders o ON o.orderID = order_product.orderID
    WHERE MONTH(o.orderDate) = $month_num
    GROUP BY p.productCode, MONTH(o.orderDate)
    ";

    $resultP = mysqli_query($con, $queryProducts);

    $labelP = [];
    $dataP = [];

    if(mysqli_num_rows($resultP) > 0 ){
      foreach($resultP as $thingP){
            $labelP[] = $thingP['productCode'];
            $dataP[] = $thingP['totalRevenue'];
          }
    }

    $queryStat = "SELECT orderDate, orderStatus, COUNT(*) as num_orders
    FROM orders 
    WHERE MONTH(orderDate) = $month_num
    GROUP BY orderStatus, MONTH(orderDate)";

    $resultS = mysqli_query($con, $queryStat);

    $labelS = [];
    $dataS = [];

    if(mysqli_num_rows($resultS) > 0 ){
      foreach($resultS as $thingS){
            $labelS[] = $thingS['orderStatus'];
            $dataS[] = $thingS['num_orders'];
          }
    }

    $kpi_1 = "SELECT orderDate, SUM(DATEDIFF(dispatchDate, orderDate)) AS total_diff, COUNT(*) AS all_orders, SUM(CASE WHEN orderStatus = 'Completed' THEN 1 ELSE 0 END) AS success_orders FROM orders
    WHERE MONTH(orderDate) = $month_num";

    $resultK1 = mysqli_query($con, $kpi_1);

    if(mysqli_num_rows($resultK1) > 0 ){
      foreach($resultK1 as $thingK1){
              
        // in months with 0 orders, handling the 0 order count (divisionbyzero error)--------------
              if($thingK1['all_orders'] == 0){
                $avg_time = 0;
                $fullfil_rate = 0;
              }
              else{
                $avg_time = $thingK1['total_diff']/$thingK1['all_orders'];
                $success = $thingK1['success_orders'];
                $fullfil_rate = ($success/$thingK1['all_orders'])*100;
                $fullfil_rate = round($fullfil_rate, 2);

              }
              $days = floor($avg_time);
              
          }
    }

  } 
  ?>
  <div class="graphs-large">
        <div class="sales">
                <h2 class="card-title"><?php if($month_name == "reset_filter"){
                  echo 'Sales Revenue';
                }
                else{
                  echo 'Sales Revenue in '.$month_name;
                }?></h2>
                <canvas id="myChartFil1"></canvas>

        </div>
        <div class="products">
                <h2 class="card-title"><?php if($month_name == "reset_filter"){
                  echo 'Sales Revenue Per Product';
                }
                else{
                  echo 'Sales Revenue Per Product in '.$month_name;
                }?></h2>
                <canvas id="myChartFillP"></canvas>
        </div>  
    </div>
    
    <div class="graph-kpi">
        <div class="orders">
                <h2 class="card-title"><?php if($month_name == "reset_filter"){
                  echo 'Order Status';
                }
                else{
                  echo 'Order Status in '.$month_name;
                }?></h2>
                <div class="chartBox"><canvas id="myChartFillO"></canvas></div>
        </div>

        <div class="title-and-kpis">
        <div class="txt"><h2>Key Performance Indicators</h2></div>
            <div class="KPIs">
                <div class="card1">
                    <h3>Average Order Processing Time</h3>
                    <?php if($month_name != "reset_filter"){
                      ?><h5>In <?php echo '('.$month_name.')'?></h5>
                      <?php
                    } ?>
                    <h2><?php echo $days?> Days <?php 
                    if(($avg_time - $days) > 0){
                      $hours = ($avg_time - $days)*24;
                      echo $hours; ?> Hours <?php
                    }
                     ?></h2>
                </div>
                <div class="card2">
                    <h3>Order Fullfilment Rate</h3>
                    <?php if($month_name != "reset_filter"){
                      ?><h5>In <?php echo '('.$month_name.')'?></h5>
                      <?php
                    } ?>
                    <h2><?php echo $fullfil_rate ?>%</h2>
                </div>
            </div>
    </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- first chart -->
    <script>
      var filSale;
      filSale = document.getElementById('myChartFil1');
      new Chart(filSale, {
        type: 'bar',
        data: {
          labels: <?php echo json_encode($label) ?>,
          datasets: [{
            label: <?php echo json_encode($labelSalesFIL) ?>,
            data: <?php echo json_encode($data) ?>,
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });

      var fillpchart;
      fillpchart = document.getElementById('myChartFillP');

      new Chart(fillpchart, {
        type: 'bar',
        data: {
          labels: <?php echo json_encode($labelP) ?>,
          datasets: [{
            label: 'Sales Revenue per Product',
            data: <?php echo json_encode($dataP) ?>,
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
            y: {
              beginAtZero: true
            }
          }
        }
      });

      var FillOchart;
      FillOchart = document.getElementById('myChartFillO');

      new Chart(FillOchart, {
        type: 'pie',
        data: {
          labels: <?php echo json_encode($labelS) ?>,
          datasets: [{
            label: 'Order Status',
            data: <?php echo json_encode($dataS) ?>,
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
            y: {
              beginAtZero: true
            }
          }
        }
      });
  </script>
    <?php


}

?>

<!-- commissions filter - commission rate div -->

<?php

if(isset($_POST['commFil_op'])){
  $month_name = $_POST['commFil_op'];
  $month_num = date("m", strtotime($month_name));

  if($month_name == "reset_filter"){
    $sql = "SELECT * FROM commissions
          ORDER BY commID DESC
          LIMIT 1";
          $query = mysqli_query($con, $sql);
  }
  else{
    $sql = "SELECT * FROM commissions WHERE MONTH(commDate) = $month_num
          ORDER BY commID DESC
          LIMIT 1";
          $query = mysqli_query($con, $sql);
  }
  
             
  if(mysqli_num_rows($query) > 0 ){
    foreach($query as $thing){

        ?>
          <h4>Commission Rate: <?php echo $thing['commRate']; ?>%</h4>
        <?php
    }
  }

}
?>


