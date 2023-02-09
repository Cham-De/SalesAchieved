<?php

session_start();
require '../../Model/db-con.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Marketing Strategist</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <link rel="stylesheet" href="../../View/styles/popup-btn-table.css">
    <link rel="stylesheet" href="../../View/styles/searchNfilter.css">


    <style>

      .nav_bar{
        margin-bottom: 2%;
      }

      .profile li{
      padding-top: 2%;
      padding-bottom: 2%;
    }
    </style>
</head>
<body>
    <div class="nav_bar">
        <div class="search-container">
            <table class="element-container">
              <tr>
                <td>
                  <input type="text" placeholder="Search..." class="search">
                </td>
                <td>
                  <a><i style="color:rgb(235, 137, 58)" class="fa-solid fa-magnifying-glass"></i></a>
                </td>
              </tr>
            </table>
        </div>
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
            <li><a href="stats.php"><i style="margin-right: 2%;" class="fa-solid fa-chart-line"></i>Statistics</a></li>
            <li class="active"><a href="cust-dms.php"><i style="margin-right: 2%;" class="fa-solid fa-users"></i></i>Customers</a></li>
        </ul>
        <table class="side-bar-icons">
          <tr>
            <td><i class="fa-regular fa-circle-user"></i></td>
            <td><a href="./profile.php">Profile</a></td>
          </tr>
          <tr>
            <td><i class="fa-solid fa-arrow-right-from-bracket"></i></i></td>
            <td><a href="#">Log out</a></td>
          </tr>
        </table>
    </div>
    

      <div class="search_wrapper">
      <div class="dropdown">
              <select name="yrs" id="years" >
                <option value="22">All</option>
                <option value="21">Platform</option>
                <option value="20">Name</option>
                <option value="20">Region</option>
              </select>
        </div>
        <div class="search_bar">
          <table class="icon_container">
            <tr>
              <form action="" method="GET">
              <td>
                <input type="text" name="searchVal" value="<?php if(isset($_GET['searchVal'])){ echo $_GET['searchVal']; } ?>" class="search" placeholder="Search Customers...">
              </td>
              <td>
                <!--<a><i class="fa-solid fa-magnifying-glass"></i></a>-->
                <button type="submit">Search</button>
              </td>
              </form>
            </tr>
          </table>
        </div>

    </div>
      
        <table class="content-table">
            <thead>
              <tr>
                <th>Customer ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Social Media<br>Platform</th>
              </tr>
            </thead>
            <tbody>

            <?php
            
                if(isset($_GET['searchVal'])){
                    $filterVal = $_GET['searchVal'];
                    $sql = "SELECT * FROM custdms WHERE CONCAT(custName, custAddr, mediaPlat) LIKE '%$filterVal%'";
                }
                else{
                  $sql = "SELECT * FROM custdms";
                }
            
                $query = mysqli_query($con, $sql);

                if(mysqli_num_rows($query) > 0 ){

                    foreach($query as $thing){
                      ?>
                          <tr>
                              <td scope="row"><?=$thing['custID']; ?></td>
                              <td><?=$thing['custName']; ?></td>
                              <td><?=$thing['custAddr']; ?></td>
                              <td><?=$thing['mediaPlat']; ?></td>
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


          <div class="navigation-table">
            <i class="fa-solid fa-circle-chevron-left fa-lg"></i>
            <i class="fa-solid fa-circle-chevron-right fa-lg"></i>
          </div>
            
      
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
</body>
</html>