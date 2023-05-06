<?php

  require '../../Model/db-con.php';
  if(isset($_GET['page'])){
    $page = $_GET['page'];
  } else {
    $page = 1;
  }

  $num_per_page = 4;
  $start_from = ($page-1)*4;

  $campaigns_query = "SELECT * FROM campaign";
  $campaigns_result = mysqli_query($con, $campaigns_query);
  $total_records = mysqli_num_rows($campaigns_result);
  $total_pages = ceil($total_records/$num_per_page);?>

<div class="cards-middle" id="cards_middle">
      <ul class="middle-cards">

      <?php
          $sql = "SELECT * FROM campaign limit $start_from, $num_per_page ";

          $query = mysqli_query($con, $sql);

          if(mysqli_num_rows($query) > 0 ){

              foreach($query as $thing){
      ?>

      <?php 
        // Define a variable to store the CSS class for the status div element
        $statusClass = '';

        // Conditionally set the CSS class based on the value of the 'cmpg_stat' key
        if ($thing['cmpg_stat'] === 'ongoing') {
          $statusClass = 'ongoing';
        } elseif ($thing['cmpg_stat'] === 'complete') {
          $statusClass = 'complete';
        }
        elseif ($thing['cmpg_stat'] === 'tobelaunched') {
          $statusClass = 'tobelaunched';
        }

      ?>

        <li>
            <div class="cards">
              <div class="cmpg"><h2>Campaign <?=$thing['id']; ?></h2></div>
                <div class="dv">
                  <div class="status  <?=$statusClass;?>"><h4><?=$thing['cmpg_stat']; ?></h4></div>
                  <a href="stats-view.php"><button id="performance" class="perf">View</button></a>
                </div>                    
            </div>
        </li>

        <?php 

            }
        }
        else{
            echo "<h4>No records</h4>";
        }
        ?>
    </ul>   

  </div>

