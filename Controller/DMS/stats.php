<?php
session_start();
require '../../Model/db-con.php';


if(isset($_GET['page'])){

  $page = $_GET['page'];

}
else{
  $page = 1;
}

$num_per_page = 04;
$start_from = ($page-1)*04;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Marketing Strategist</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <link rel="stylesheet" href="../../View/styles/stats.css">
    <link rel="stylesheet" href="../../View/styles/dms/campaigns.css">

    <style>
      .nav_bar{
        margin-bottom: 2%;
      }
      .search_container{
        margin-left: 22%;
      }

      #nav_table{
        position: absolute;
        margin-top: 5%;
        margin-left: 55%;
      }
      .pagin{
        margin-top: 10%;
        margin-left: 53%;
        margin-bottom:30px
      }
    </style>
</head>
<body>
<div class="nav_bar">
        <div class="user-wrapper">
            <img src="../../View/assets/chamodi.png" width="50px" height="50px" alt="user image">
            <div>
                <h4>Chamodi</h4>
                <small style="color:rgb(235, 137, 58)">Digital Marketing Strategist</small>
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
            <li class="active"><a href="stats.php"><i style="margin-right: 2%;" class="fa-solid fa-chart-line"></i>Statistics</a></li>
            <li><a href="cust-dms.php"><i style="margin-right: 2%;" class="fa-solid fa-users"></i></i>Customers</a></li>
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

    <div class="search_container">
          <table class="element_container">
            <tr>
              <td>
                <input type="text" placeholder="Search Table..." class="search">
              </td>
              <td>
                <a><i class="fa-solid fa-magnifying-glass"></i></a>
              </td>
            </tr>
          </table>
    </div>

    <script>
     function fetchNextPage(pageNumber) {
      $.ajax({
        url: 'pagin_stat.php',
        type: 'GET',
        data: {
          page: pageNumber
        },
        success: function(data) {
          // Update the campaign list with the new data
          $('.cards-middle').html(data);

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

  </script>

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

    <!--stat cards-->
    <?php
      $pr_query = "SELECT * FROM campaign";
      
      $pr_res = mysqli_query($con, $pr_query);

      $total_records = mysqli_num_rows($pr_res);

      $total_pages = ceil($total_records/$num_per_page);?>

  <div class="pagin">
    <?php

      if ($page > 1) {
        echo "<button class='page-link prev-page' style='margin-left:10px; border: none; outline: none;'><i class='fa-solid fa-circle-chevron-left fa-lg' style='color:#F8914A;'></i></button>";
      }
    
      for ($i = 1; $i <= $total_pages; $i++) {
        echo "<button class='page-link page-number' style='margin-left:10px; border: none; outline: none; padding: 10px; background:#F8914A;'><a href='#' style='text-decoration:none; color:#FFFFFF;'>$i</a></button>";
      }
    
      if ($i - 1 > $page) {
        echo "<button class='page-link next-page' style='margin-left:10px; border: none; outline: none;'><i class='fa-solid fa-circle-chevron-right fa-lg' style='color:#F8914A;'></i></button>";
      }
    ?>

  </div>
    
    <script>
       
    </script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>

</body>
</html>