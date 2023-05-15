<?php

  require '../../Model/db-con.php';
  if(isset($_GET['page_campaigns'])){
    $page = $_GET['page_campaigns'];

    $num_per_page = 5;
    $start_from = ($page-1)*5;
    $campaigns_query = "SELECT * FROM campaign";
    $campaigns_result = mysqli_query($con, $campaigns_query);
    $total_records = mysqli_num_rows($campaigns_result);
    $total_pages = ceil($total_records/$num_per_page);
    
    if ($_GET['identifier'] === 'campaign_pagin'){

      ?>
      <table class="content-table" id="content_data">
                <thead>
                  <tr>
                    <th>Campaign</th>
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
                                            <!-- <select id="status_update_<?= $thing['id']; ?>" name="stat" class="status_update">
                                              <option value="unknown"><?=$thing['cmpg_stat']; ?></option>
                                              <option value="tobelaunched">To-be Launched</option>
                                              <option value="ongoing">Ongoing</option>
                                              <option value="complete">Complete</option>
                                            </select>    -->
                                            <?=$thing['cmpg_stat']; ?>
                                        </td>
                                        <td><?=$thing['budget']; ?></td> 
                                    </tr>

                                <?php 

                            }
                        }
                        else{
                          ?>
                          <tr>
                              <td colspan="5"><?php echo "No Records"; ?></td>
                          </tr>
                          <?php
                        }
                    ?>
                </tbody>
                  
                
              </table>
              
              <?php
    }
    ?>
    

              <?php
  }


  if(isset($_GET['page_dms'])){
    $page = $_GET['page_dms'];

    $num_per_page = 5;
    $start_from = ($page-1)*5;

    if ($_GET['identifier'] === 'customer_pagin'){

      ?>
      <table class="content-table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Address</th>
          <th>Email</th>
          <th>Social Media<br>Platform</th>
        </tr>
      </thead>
      <tbody>

      <?php

      // $custom = "SELECT * FROM customer";
      // $query_cust = mysqli_query($con, $custom);

      // pagination related queries----------------------------------------------
      $custom_pagin = "SELECT * FROM customer limit $start_from, $num_per_page";
      $query_cust_pagin = mysqli_query($con, $custom_pagin);
      // $cust_num_rows = mysqli_num_rows($query_cust);
      
      // $tPages = ceil($cust_num_rows/$num_per_page); 

      if(mysqli_num_rows($query_cust_pagin) > 0){
        foreach($query_cust_pagin as $thingCust){
          ?>
          <tr>
            <td><?php echo $thingCust['customerName']?></td>
            <td><?php echo $thingCust['address']?></td>
            <td><?php echo $thingCust['email']?></td>
            <td><?php echo $thingCust['socialMediaPlatform']?></td>
          </tr>
          <?php
        }
      }
      ?>
        
      </tbody>
    </table>

    <?php
    }

  }




  // } else 
  // {
  //             $page = 1;
  // }



  
