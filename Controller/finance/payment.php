<?php
session_start();
require '../../Model/db-con.php';


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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Finance Manager</title>
    <link rel="stylesheet"
      href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!--stylesheet for icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Stylesheet for nav bar-->
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <!--Stylesheet for table search bar-->
    <link rel="stylesheet" href="../../View/styles/tableSearch.css">
    <!--Stylesheet for table-->
    <link rel="stylesheet" href="../../View/styles/table.css">
    <!--Stylesheet for table navigation buttons-->
    <link rel="stylesheet" href="../../View/styles/navButtons.css">
    <!--Stylesheet for paymentsUi.css-->
    <link rel="stylesheet" href="../../View/styles/courier/paymentsUi.css">
    <link rel="stylesheet" href="../../View/styles/filter-buttons.css">
    <link rel="stylesheet" href="../../View/styles/popup-btn-table.css">

    <style>
    
    #status{
        border: 1px solid rgb(235, 137, 58);
        padding: 2%;
      }

      .search-wrap-container{
        /* display: flex;
        justify-content: space-between; */
        margin-top: 2%;
        width:18%;
        margin-left: 22%;
      }
      div.side_bar ul li{
        padding-top: 8%;
        padding-bottom: 6%;
    }
    .content-table{
      margin-left: 21%;
    }
    .button-link{
      background: none;
  border: 1px solid rgb(235, 137, 58);
  cursor: pointer;
  padding: 3px;
  border-radius: 5px;
    }
    .button-link a{
      text-decoration: none;
      color: rgb(235, 137, 58);
    }
    </style>
  </head>
  <body>
    <!--common top nav and side bar content-->
    <div class="nav_bar">
      <div class="user-wrapper">
          <img src="../../View/assets/man.png" width="50px" height="50px" alt="user image">
          <div>
              <h4>John Doe</h4>
              <small>Finance Manager</small>
          </div>
      </div>
  </div>

  <div class="side_bar">
      <div class="logo">
          <img src="../../View/assets/saleslogo-final.png" width="70%" height="70%">
      </div>
      <ul class="icon-list">
            <li><a href="finance-home.php"><i style="margin-right: 2%;" class="fa-solid fa-house"></i>Home</a></li>
            <li><a href="commissions.php"><i style="margin-right: 2%;" class="fa-solid fa-money-check-dollar"></i>Commissions</a></li>
            <li><a href="products.php"><i style="margin-right: 2%;" class="fa-solid fa-boxes-stacked"></i>Products</a></li>
            <li><a href="sales.php"><i style="margin-right: 2%;" class="fa-solid fa-magnifying-glass-dollar"></i>Sales</a></li>
            <li class="active"><a href="payment.php"><i style="margin-right: 2%;" class="fa-solid fa-hand-holding-dollar"></i>Payments</a></li>
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
  
    <!---end of side and nav bars-->

  <!--Table search bar-->
  <div class="search-wrap-container">
    <select name="paymentStatFil" id="paymentStatFil">
      <option value="" disabled="" selected="">--Select Status--</option>
      <option value="Pending">Pending</option>
      <option value="approved">Approved</option>
      <option value="disapproved">Disapproved</option>
      <option value="reset_filter">All</option>
    </select>
    </div>

    <script>
      var paymentStatFil = document.getElementById('paymentStatFil');
      paymentStatFil.addEventListener('change', function(){
        filterStat();
      });

      function filterStat(){
        var paymentStatFil_op = document.getElementById('paymentStatFil').value;
        console.log("selected :", paymentStatFil_op);

        $(document).ready(function(){
            $.ajax({
              url: "./fin_filter_copy.php",
              type: "POST",
              data: {paymentStatFil_op: paymentStatFil_op,
                identifier: 'payment_statFilter'},
              success: function(response){
              // Handle the response from the server here
              console.log("dynamic response :", response);
              $(".dynamic_content").html(response);
            }
          });
        });
      }
    </script>

<!--Table-->

<div class="dynamic_content">
<table class="content-table">
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Payment<br>(Rs.)</th>
            <th>Date</th>
            <th>View Slip</th>
            <th>Approval Status</th>
        </tr>
    </thead>
    <tbody>

    <?php
      $sql = "SELECT o.orderID, o.deliveryDate, SUM(order_product.quantity * p.sellingPrice) as orderAmount, s.approvalStatus
      FROM orders o
      INNER JOIN order_product ON o.orderID = order_product.orderID
      JOIN product p ON order_product.productCode = p.productCode
      LEFT JOIN slips s ON o.orderID = s.orderID
      WHERE s.slipID IS NOT NULL
      GROUP BY o.orderID limit $start_from, $num_per_page
      ";

      $query = mysqli_query($con, $sql);

      if(mysqli_num_rows($query) > 0 ){
        foreach($query as $thing){
          ?>
              <tr>
                    <td scope="row"><?=$thing['orderID']; ?></td>
                    <td><?=$thing['orderAmount']; ?></td>
                    <td><?=$thing['deliveryDate']; ?></td>
                    <!-- <td><a href="view-slip.php?orderID=<?php echo $thing['orderID']; ?>">View Slip</a></td> -->
                    <td><button class="button-link"><a href="view-slip.php?orderID=<?php echo $thing['orderID']; ?>">View Slip</a></button></td>
                    <td> <?=$thing['approvalStatus']; ?>
                      <!-- <select id="status" name="stat">
                      <option value="approve">Approved</option>
                      <option value="napprove">Not Approved</option>
                      </select>    -->
                    </td>
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

    
<?php
  $pr_query = "SELECT o.orderID, o.deliveryDate, SUM(order_product.quantity * p.sellingPrice) as orderAmount
  FROM orders o
  INNER JOIN order_product ON o.orderID = order_product.orderID
  JOIN product p ON order_product.productCode = p.productCode
  GROUP BY o.orderID";
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

<!-- <script>
    const v_slip = document.getElementById('v_slip');

    v_slip.addEventListener('click', () => {
      const orderId = v_slip.getAttribute('data-order-id');
      location.href = `./view-slip.php?orderID=` + orderId;

      //location.href = "./view-slip.php";
    });


</script> -->

    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
  </body>
</html>