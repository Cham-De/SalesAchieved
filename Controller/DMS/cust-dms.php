<?php
require '../../Model/db-con.php';
require __DIR__.'/../../Model/utils.php';
$role = "Digital Marketing Strategist";
$userData = check_login($role);

if(isset($_GET['page'])){

  $page = $_GET['page'];

}
else{
  $page = 1;
}

$num_per_page = 05;
$start_from = ($page-1)*05;


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


    <style>

      .nav_bar{
        margin-bottom: 2%;
      }
      .search_container{
        margin-left: 22%;
      }
      .profile li{
        padding-top: 2%;
        padding-bottom: 2%;
      }
      #btnSearch{
        background: none;
        border: none;
      }
      #search_content{
        position: absolute;
        width: 21%;
        border-radius: 5px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        /* background: rgba(238, 237, 237, 0.89); */
        background: white;
        /* padding: 1%; */
        margin-top: 1%;
        list-style-type: none;
        /* 
        border: 1px solid black;
         */
      }
    </style>
</head>
<body>
    <div class="nav_bar">
        <div class="user-wrapper">
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
            <li><a href="dms.php"><i style="margin-right: 2%;" class="fa-solid fa-house"></i>Home</a></li>
            <li><a href="campaigns.php"><i style="margin-right: 2%;" class="fa-solid fa-globe"></i>Campaigns</a></li>
            <!-- <li><a href="stats.php"><i style="margin-right: 2%;" class="fa-solid fa-chart-line"></i>Statistics</a></li> -->
            <li class="active"><a href="cust-dms.php"><i style="margin-right: 2%;" class="fa-solid fa-users"></i></i>Customers</a></li>
        </ul>
        <table class="side-bar-icons">
          <tr>
            <td><i class="fa-regular fa-circle-user"></i></td>
            <td><a href="profile.php">Profile</a></td>
          </tr>
          <tr>
            <td><i class="fa-solid fa-arrow-right-from-bracket"></i></i></td>
            <td><a href="../home/logout.php">Log out</a></td>
          </tr>
        </table>
    </div>
    

      <div class="btn_cmpg">
        <!--<div class="search_box">
            <input type="text" class="input" placeholder="Search...">
            <div class="icon">
              <i class="fa-solid fa-magnifying-glass"></i>
            </div>
        </div>-->
        <div class="search_container">
          <table class="element_container">
          <tr>
              
              <td>
                    <input type="text" class="search" id="search" placeholder="Search Table...">
              </td>
              <td>            
                    <button id="btnSearch"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>              
              </td>
              
            </tr>
          </table>

          <ul name="search_content" id="search_content">
          </ul>

        </div>

      </div>
        

      
      <!-- pagination -->
<script>
  
  $(document).ready(function() {
      // Fetch the initial page on page load
      fetchNextPage(<?php echo $page; ?>);

      // Attach click event listeners to the pagination links
      $('.prev-page').click(function() {
        fetchNextPage(<?php echo $page - 1; ?>);
      });

      $('.next-page').click(function() {
        fetchNextPage(<?php echo $page + 1; ?>);
      });

      $('.page-number').click(function() {
        var pageNumber = parseInt($(this).find('a').text());
        console.log("pagenumber working: ",pageNumber);
        fetchNextPage(pageNumber);
      });    
  });

  function fetchNextPage(pageNumber) {
    $.ajax({
      url: 'pagin_copy.php',
      type: 'GET',
      data: {
        page_dms: pageNumber,
        identifier: 'customer_pagin'
      },
      success: function(data) {
        // Update the campaign list with the new data
        $('.content-table').html(data);

        // Update the URL with the new page number
        window.history.pushState({
          page: pageNumber
        }, '', '?page=' + pageNumber);

        // Update the active class for the pagination links
        $('.page-number').removeClass('active');
        $('.page-number').eq(pageNumber - 1).addClass('active');
      }
   });
  }

</script>

<div class="dynamic_content">
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

            $custom = "SELECT * FROM customer";
            $query_cust = mysqli_query($con, $custom);

            // pagination related queries----------------------------------------------
            $custom_pagin = "SELECT * FROM customer limit $start_from, $num_per_page";
            $query_cust_pagin = mysqli_query($con, $custom_pagin);
            $cust_num_rows = mysqli_num_rows($query_cust);
            
            $tPages = ceil($cust_num_rows/$num_per_page); 

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

  
            
          <div style="margin-left: 750px; margin-bottom:30px;">
    <?php
    
      for ($i = 1; $i <= $tPages; $i++) {

        if($i == $page){
          echo "<button class='page-link page-number' style='margin-left:10px; border: none; outline: none; padding: 10px; background:#F8914A;'><a href='#' style='text-decoration:none; color:#FFFFFF;'>$i</a></button>";
        }
        else{
          echo "<button class='page-link page-number' style='margin-left:10px; border: none; outline: none; padding: 10px; background:#F8914A;'><a href='#' style='text-decoration:none; color:#FFFFFF;'>$i</a></button>";
        }
        
      }
    
    ?>

  </div>
  </div>

    <!-- autocomplete search bar -->
    <script src="./search_bar.js"></script>
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
</body>
</html>