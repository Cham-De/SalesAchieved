<?php
require '../../Model/db-con.php';

if(isset($_GET['page'])){
  $page = $_GET['page'];
} else {
  $page = 1;
}

$num_per_page = 5;
$start_from = ($page-1)*5;



if(isset($_POST['sql_query'])){
    $sql_query = $_POST['sql_query'];

    // $sql_query .= " limit $start_from, $num_per_page ";
    $sql_query_new = $sql_query . " limit $start_from, $num_per_page ";

    $query = mysqli_query($con, $sql_query_new);

    if ($_POST['identifier'] === 'campaign_filter'){
      ?>
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

<?php

  //  if(isset($_POST['sql_query'])){
      
      $pr_res = mysqli_query($con, $sql_query);

      $total_records = mysqli_num_rows($pr_res);

      $total_pages = ceil($total_records/$num_per_page);

      ?>

  <div style="margin-left: 750px; margin-bottom:30px;">
    <?php

      if ($page > 1) {
        echo "<button class='page-link prev-page-f' style='margin-left:10px; border: none; outline: none;'><i class='fa-solid fa-circle-chevron-left fa-lg' style='color:#F8914A;'></i></button>";
      }
    
      for ($i = 1; $i <= $total_pages; $i++) {
        echo "<button class='page-link page-number-f' style='margin-left:10px; border: none; outline: none; padding: 10px; background:#F8914A;'><a href='#' style='text-decoration:none; color:#FFFFFF;'>$i</a></button>";
      }
    
      if ($i - 1 > $page) {
        echo "<button class='page-link next-page-f' style='margin-left:10px; border: none; outline: none;'><i class='fa-solid fa-circle-chevron-right fa-lg' style='color:#F8914A;'></i></button>";
      }
    ?>
    </div>   
    <?php

    }

    ?>
<?php
    


}

// else{
//   $sql = "SELECT * FROM campaign limit $start_from, $num_per_page ";
//   $query = mysqli_query($con, $sql);
// }



if(isset($_POST['searchVal2'])){
  $searchVal2 = $_POST['searchVal2'];

  if ($_POST['identifier'] === 'custom_filter'){

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

            $custom = "SELECT * FROM customer WHERE customerName = '$searchVal2' ";
            $query = mysqli_query($con, $custom);

            // pagination related queries----------------------------------------------
            // $custom_pagin = "SELECT * FROM customer limit $start_from, $num_per_page";
            // $query_cust_pagin = mysqli_query($con, $custom_pagin);
            // $cust_num_rows = mysqli_num_rows($query_cust);
            
            // $tPages = ceil($cust_num_rows/$num_per_page); 

            if(mysqli_num_rows($query) > 0){
              foreach($query as $thingCust){
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

?>



    

        
          