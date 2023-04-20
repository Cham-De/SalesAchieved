<?php

  require '../../Model/db-con.php';
  if(isset($_GET['page'])){
    $page = $_GET['page'];
  } else {
    $page = 1;
  }

  $num_per_page = 5;
  $start_from = ($page-1)*5;

  $campaigns_query = "SELECT * FROM campaign";
  $campaigns_result = mysqli_query($con, $campaigns_query);
  $total_records = mysqli_num_rows($campaigns_result);
  $total_pages = ceil($total_records/$num_per_page);?>

<table class="content-table" id="content_data">
            <thead>
              <tr>
                <th>Campaign ID</th>
                <th>Start Date</th>
                <th>Objective</th>
                <th>Status</th>
                <th>Budget<br>(Rs.)</th>
              </tr>
            </thead>
            <tbody>
            <?php

                    // $sql = "SELECT * FROM campaign limit $start_from, $num_per_page";
                    $sql = "SELECT * FROM campaign limit $start_from, $num_per_page ";

                    $query = mysqli_query($con, $sql);

                    if(mysqli_num_rows($query) > 0 ){

                        foreach($query as $thing){
                            ?>
                                <tr>
                                    <td scope="row"><?=$thing['id']; ?></td>
                                    <td><?=$thing['startdate']; ?></td>
                                    <td><?=$thing['objective']; ?></td>
                                    <td>
                                        <select id="status" name="stat">
                                          <option value="unknown"><?=$thing['cmpg_stat']; ?></option>
                                          <option value="tobelaunched">To-be Launched</option>
                                          <option value="ongoing">Ongoing</option>
                                          <option value="complete">Complete</option>
                                        </select>   
                                    </td>
                                    <td><?=$thing['budget']; ?></td> 
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

