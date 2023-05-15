<?php
//session_start();
require '../../Model/db-con.php';
require __DIR__.'/../../Model/utils.php';
$role = "Finance Manager";
$userData = check_login($role);
require __DIR__.'/../../Model/notificationCRUD.php';
$notifData = get_notification_data($role, $userData["username"]);


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
    <title>Products</title>
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <link rel="stylesheet" href="../../View/styles/popup-btn-table.css">
    <link rel="stylesheet" href="../../View/styles/filter-buttons.css">
    <!-- Stylesheet for notification -->
    <link rel="stylesheet" href="../../View/styles/notification_fin.css">

    <style>
      .search-wrap-container{
        display: flex;
        justify-content: space-between;
        /* width: 15%; */
        /* margin-left: 22%; */
      }

      .search_container{
        margin-left: 25%;
      }

      .nav_bar{
        margin-bottom: 2%;
      }
      .wrapper{
        display: flex;
        width: auto;
        margin-right: 8%;
      }

      div.side_bar ul li{
        padding-top: 8%;
        padding-bottom: 6%;
      }
    </style>
</head>
<body>
<div class="nav_bar">
        
        <div class="user-wrapper">

        <!-- Notifications -->
        <div class="finIcon" onclick="toggleNotifi()">
          <i class="fa-solid fa-bell"></i><span><?php echo mysqli_num_rows($notifData) ?></span>
        </div>
        <div class="notifi-box" id="box">
          <h2>Notifications <span><?php echo mysqli_num_rows($notifData) ?></span></h2>
          <?php 
          while ($row = mysqli_fetch_array($notifData)){
            $title = $row['title'];
            $message = $row['message'];
            $notificationID = $row['notificationID'];
            echo  "
            <div class='notifi-item' style='display:none;'>
            <i class='fa-solid fa-circle-info' style='font-size:2em;padding-left: 10px;'></i>
              <div class='text'>
                <h4>$title</h4>
                <p>$message</p>
                
              </div>
              <div style='margin-right: 0;margin-left: auto; display:block;'>
              <form method='post'>
              <input type='hidden' name='notificationID' value='$notificationID'>
              <button id='remove' type='submit' value='remove' name='remove' style='border: none;padding: 0px;background-color: white;'>
                <i class='fa-regular fa-circle-xmark' style='cursor: pointer;'></i>
              </button>
              </form>
              </div>
            </div>";
          }
          ?>
        </div>

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
            <li><a href="finance-home.php"><i style="margin-right: 2%;" class="fa-solid fa-house"></i>Home</a></li>
            <li><a href="commissions.php"><i style="margin-right: 2%;" class="fa-solid fa-money-check-dollar"></i>Commissions</a></li>
            <li class="active"><a href="products.php"><i style="margin-right: 2%;" class="fa-solid fa-boxes-stacked"></i>Products</a></li>
            <li><a href="sales.php"><i style="margin-right: 2%;" class="fa-solid fa-magnifying-glass-dollar"></i>Sales</a></li>
            <li><a href="payment.php"><i style="margin-right: 2%;" class="fa-solid fa-hand-holding-dollar"></i>Payments</a></li>
            <li><a href="reports.php"><i style="margin-right: 2%;" class="fa-solid fa-file-contract"></i>Reports</a></li>
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

    <div class="search-wrap-container">
        <!-- <div class="search_container">
          <table class="element_container">
            <tr>
              <td>
                <input type="text" placeholder="Search Product..." class="search">
              </td>
              <td>
                <a><i class="fa-solid fa-magnifying-glass"></i></a>
              </td>
            </tr>
          </table>
        </div> -->
        <!-- <select name="productFilter" id="productFilter">--Select Filter--
          <option value="resetProducts">Reset</option>
        </select> -->
        
        
      </div>

      
     <table class="content-table">
        <thead>
          <tr>
            <th>Category</th>
            <th>Code</th>
            <th>Product</th>
            <th>Buying Price<br>(Rs.)</th>
            <th>Selling Price<br>(Rs.)</th>
            <th>Quantity Sold</th>
            <th>Total Revenue<br>(Rs.)</th>
            <th>Total Cost<br>(Rs.)</th>
            <th>Gross Profit<br>(Rs.)</th>
          </tr>
        </thead>
        <tbody>
          <?php
          
          $sql = "SELECT p.productCategory, p.productCode, p.productName, p.buyingPrice, p.sellingPrice, SUM(order_product.quantity) as totalQuantity, ((p.sellingPrice - p.buyingPrice) * SUM(order_product.quantity)) as totalRevenue, (p.buyingPrice * SUM(order_product.quantity)) as totalCost, 
          (p.sellingPrice * SUM(order_product.quantity)) - (p.buyingPrice * SUM(order_product.quantity)) as grossProfit
      FROM product p
      INNER JOIN order_product ON order_product.productCode = p.productCode
      GROUP BY p.productCategory, p.productName limit $start_from, $num_per_page
      ";


$query = mysqli_query($con, $sql);

      if(mysqli_num_rows($query) > 0 ){
        foreach($query as $thing){
          ?>
              <tr>
                    <td scope="row"><?=$thing['productCategory']; ?></td>
                    <td><?=$thing['productCode']; ?></td>
                    <td><?=$thing['productName']; ?></td>
                    <td><?=$thing['buyingPrice']; ?></td>
                    <td><?=$thing['sellingPrice']; ?></td>
                    <td> <?=$thing['totalQuantity']; ?></td>
                    <td> <?=$thing['totalRevenue']; ?></td>
                    <td> <?=$thing['totalCost']; ?></td>
                    <td> <?=$thing['grossProfit']; ?></td>
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

      <!-- <div class="navigation-table">
        <i class="fa-solid fa-circle-chevron-left fa-lg"></i>
        <i class="fa-solid fa-circle-chevron-right fa-lg"></i>
      </div> -->

      <?php
  $pr_query = "SELECT p.productCategory, p.productCode, p.productName, p.buyingPrice, p.sellingPrice, SUM(order_product.quantity) as totalQuantity, (p.sellingPrice * SUM(order_product.quantity)) as totalRevenue, (p.buyingPrice * SUM(order_product.quantity)) as totalCost, 
                (p.sellingPrice * SUM(order_product.quantity)) - (p.buyingPrice * SUM(order_product.quantity)) as grossProfit
                FROM product p
                INNER JOIN order_product ON order_product.productCode = p.productCode
                GROUP BY p.productCategory, p.productName";
  $pr_res = mysqli_query($con, $pr_query);

  $total_records = mysqli_num_rows($pr_res);

  $total_pages = ceil($total_records/$num_per_page);
?>

<div style="margin-left: 750px; margin-bottom:30px;">

    <?php
      if($page>1){
        echo " <button style='margin-left:10px; border: none; outline: none;' ><a href='payment.php?page=".($page-1)." '><i class='fa-solid fa-circle-chevron-left fa-lg' style='color:#F8914A;'></i></a></button>";
      } 

      for($i = 1; $i < $total_pages; $i++){

        echo " <button style='margin-left:10px; border: none; outline: none; padding: 10px; background:#F8914A;' ><a href='payment.php?page=".$i." ' style='text-decoration:none; color:#FFFFFF;'>$i</a></button>";

      }

      if($i>$page){
        echo " <button style='margin-left:10px; border: none; outline: none;' ><a href='payment.php?page=".($page+1)." '><i class='fa-solid fa-circle-chevron-right fa-lg' style='color:#F8914A;'></i></a></button>";
      } 
    ?>

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
    </script>
    <!-- Script for notifications functionality -->
    <script src="../../View/notification.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

      <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
</body>
</html>