<?php

require '../../Model/db-con.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales</title>
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <link rel="stylesheet" href="../../View/styles/popup-btn-table.css">
    <link rel="stylesheet" href="../../View/styles/filter-buttons.css">

    <style>
      .search-wrap-container{
        /* display: flex;
        justify-content: space-between; */
        width:18%;
        margin-left: 22%;
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
            <img src="../../View/assets/man.png" width="50px" height="50px" alt="user image">
            <div>
                <h4>John Doe</h4>
                <small style="color:rgb(235, 137, 58)">Finance Manager</small>
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
            <li><a href="products.php"><i style="margin-right: 2%;" class="fa-solid fa-boxes-stacked"></i>Products</a></li>
            <li  class="active"><a href="sales.php"><i style="margin-right: 2%;" class="fa-solid fa-magnifying-glass-dollar"></i>Sales</a></li>
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

    <?php
      $sqlSR = "SELECT u.name FROM user u WHERE u.user_role = 'Sales Representative' ";
      $querySR = mysqli_query($con, $sqlSR);
    ?>
        
      <select name="SalesFilter" id="SalesFilter">
        <option value="" disabled="" selected="">--Select Sales Rep--</option>
        <?php
        if(mysqli_num_rows($querySR)>0){
          foreach($querySR as $thingSR){
            ?>
            <option value="<?=$thingSR['name']?>"><?php echo $thingSR['name']?></option>
            <?php
          }
        }
        ?>
        <option value="reset_sales">All</option> 
      </select>

    </div>

    <script>
      var SalesFilter = document.getElementById('SalesFilter');
      SalesFilter.addEventListener('change', function(){
        filterSalesTable();
      });

      function filterSalesTable(){
        var SalesFilter_op = document.getElementById('SalesFilter').value;
        console.log("selected sales rep :", SalesFilter_op);

        $(document).ready(function(){
            $.ajax({
              url: "./fin_filter_copy.php",
              type: "POST",
              data: {SalesFilter_op: SalesFilter_op,
                identifier: 'sales_filter'},
              success: function(response){
              // Handle the response from the server here
              console.log("dynamic response :", response);
              $(".dynamic_content").html(response);
            }
          });
        });
      }
    </script>
 
 <div class="dynamic_content">
     <table class="content-table" id="salesTable">
        <thead>
          <tr>
            <th>Order ID</th>
            <!-- <th>Product Category</th> -->
            <th>Sales Rep</th>
            <th>Date</th>
            <!-- <th>Selling Price<br>(Rs.)</th>
            <th>Quantity Sold</th> -->
            <th>Revenue<br>(Rs.)</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // $sql = "SELECT d.productCode, d.quantity, o.orderID, p.productCategory, p.sellingPrice, (p.sellingPrice * SUM(d.quantity)) as totalRevenue, u.name, o.orderDate
          // FROM order_product d
          // JOIN product p ON d.productCode = p.productCode
          // JOIN orders o ON o.orderID = d.orderID
          // JOIN user u ON u.username = o.username
          // GROUP BY p.productCode, p.productCategory
          // ";

          $sql="SELECT o.orderID, u.name, o.orderDate, SUM(p.sellingPrice * d.quantity) as revenue
          FROM order_product d
          JOIN product p ON d.productCode = p.productCode
          JOIN orders o ON o.orderID = d.orderID
          JOIN user u ON u.username = o.username
          GROUP BY o.orderID, u.name, o.orderDate
          ORDER BY o.orderDate";
          
          $query = mysqli_query($con, $sql);
          if(mysqli_num_rows($query) > 0 ){
            foreach($query as $thing){
              ?>
              <tr>
                <td><?=$thing['orderID']; ?></td>
                <td><?=$thing['name']; ?></td>
                <td><?=$thing['orderDate']; ?></td>
                <td><?=$thing['revenue']; ?></td>
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
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

      <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
</body>
</html>