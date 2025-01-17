<?php 
    require __DIR__.'/../../Model/utils.php';
    require __DIR__.'/../../Model/notificationCRUD.php';
    $userData = check_login("Sales Representative");
    //$username = $userData["username"];
    $role = "Sales Representative";
    $notifData = get_notification_data($role, $userData["username"]);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>SalesAchieved</title>
    <link rel="stylesheet"
      href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!--stylesheet for icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Stylesheet for nav bar-->
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <!--Stylesheet for order details cards-->
    <link rel="stylesheet" href="../../View/styles/orderDetailsCards.css">
    <!--Stylesheet for buttons-->
    <link rel="stylesheet" href="../../View/styles/salesR/uploadSlip.css">
    <link rel="stylesheet" href="../../View/styles/courier/viewSlip.css">
    <!-- Stylesheet for notification -->
    <link rel="stylesheet" href="../../View/styles/notification.css">

    <style>
      div.side_bar ul li{
        padding-top: 8%;
        padding-bottom: 4%;
    }

    .side-bar-icons{
      margin-top: 20%;
    }
    .orderStatus{
        margin-left: 2%;
    }
    .cards{
        margin-left: 22%;
    }
    </style>
  </head>

  <body>
    <!--common top nav and side bar content-->
    <div class="nav_bar">
      <div class="search-container">
          <table class="element-container">
              <tr>
                  <td>
                      <input type="text" placeholder="Search..." class="search">
                  </td>
                  <td>
                      <a><i class="fa-solid fa-magnifying-glass"></i></a>
                  </td>
              </tr>
          </table>
      </div>

      <div class="user-wrapper">
          <a href="calendar.php"><i class="fa-solid fa-calendar-days"></i></a> 
          
          <!-- Notifications -->
        <div class="icon" onclick="toggleNotifi()">
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
      <ul>
        <li><a href="landingUi.php"><i class="fa-solid fa-house"></i>Home</a></li>
        <li class="active"><a href="ordersUi.php"><i class="fa-solid fa-file-circle-check"></i>Orders</a></li>
        <li><a href="customersUi.php"><i class="fa-solid fa-user-group"></i>Customers</a></li>
        <li><a href="stocksUi.php"><i class="fa-solid fa-warehouse"></i>Stocks</a></li>
        <li><a href="salesUi.php"><i class="fa-solid fa-sack-dollar"></i>Sales</a></li>
        <li><a href="complaints.php"><i class="fa-solid fa-comment"></i>Complaints</a></li>
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
  </div>
  <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
    <!---end of side and nav bars-->

    <div class="middle">
        <table class="table-bottom">
            <thead>
                <tr>
                  <th>Product Code</th>
                  <th>Product Name</th>
                  <th>Price<br>(Rs.)</th>
                  <th>Quantity</th>
                  <th>Total Price<br>(Rs.)</th>
                </tr>
              </thead>
              <tbody>
              <?php

                $id = $_GET['orderID'];

                $sql = "SELECT p.productCode, p.productName, p.sellingPrice, quantity, charges, (p.sellingPrice * quantity) as totalPrice
                        FROM orders o
                        INNER JOIN order_product op ON o.orderID = op.orderID
                        INNER JOIN delivery ON delivery.deliveryRegion = o.deliveryRegion
                        JOIN product p ON op.productCode = p.productCode
                        WHERE o.orderID = $id;
                      ";

                $charge = 0;
                $finalPrice = 0;

                $query = mysqli_query($con, $sql);

                if(mysqli_num_rows($query) > 0 ){
                  foreach($query as $thing){
              ?>
        <tr>
              <td scope="row"><?=$thing['productCode']; ?></td>
              <td><?=$thing['productName']; ?></td>
              <td><?=$thing['sellingPrice']; ?></td>
              <td> <?=$thing['quantity']; ?></td>
              <td> <?=$thing['totalPrice']; ?></td>
        </tr>
    <?php
      $charge = $thing['charges'];
      $finalPrice = $finalPrice + $thing['sellingPrice'] * $thing['quantity'];
  }
}
else{
  echo "<h4>No records</h4>";
}
?>
                <tr>
                  <td colspan="4" style="text-align:right"><b>Total Order Value</b></td>
                  <td><?php echo $finalPrice;?></td>
                </tr>
                <tr>
                  <td colspan="4" style="text-align:right"><b>Delivery Charges</b></td>
                  <td><?php echo $charge;?><hr /></td>
                </tr>
                <tr>
                  <td colspan="4" style="text-align:right"><b>Total Charges</b></td>
                  <td><?php echo $charge + $finalPrice;?><hr /><hr /></td>
                </tr>
              </tbody>
        </table>
      </div>
      <!-- <div class="uploadSlip">
        <table class="slipTable">
          <td>
            <tr>
            <form action="../../Model/salesR/uploadSlip.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="paymentSlip">
                <input type="submit" name="submit" value="Upload Slip">
            </form>
            </tr>
          </td>
        </table>
        <img src="../assets/slip.jpg" alt="bank slip">
      </div> -->

      <?php 
          $id = $_GET['orderID'];

          $sql = "SELECT * FROM slips WHERE orderID=$id";
          $res = mysqli_query($con,  $sql);

          if (mysqli_num_rows($res) > 0) {
          	while ($images = mysqli_fetch_assoc($res)) {  ?>
             
             <div class="slip">
             	<img src="../../uploads/<?=$images['slipUrl']?>">
             </div>
          		
    <?php } }?>

      
        <!--<img src="../../View/assets/slip.jpg" alt="bank slip">-->
        <!-- <?php
              //$id = $_GET['orderID'];
            ?> -->

<div class="form-container">

<!-- <a href="ordersUi.php"><button id="Back_btn">Back</button></a> -->
<button id="Back_btn" onclick="window.history.back()">Back</button>
        <form action="../../Model/salesR/uploadSlipBack.php?orderID=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
            
            <input type="hidden" name="orderID" value="<?php echo $id; ?>">
            <input type="file" name="my_image">

            <?php
              $query = "SELECT * FROM slips WHERE orderID = $id";
              $result = mysqli_query($con, $query);

              if (mysqli_num_rows($result) > 0) {
                // image already exists, change submit button text
                echo '<input type="submit" name="submitAgain" value="Re-Upload Slip" id="submitFile">';
              } else {
                // image does not exist, show regular submit button
                echo '<input type="submit" name="submit" value="Upload Slip" id="submitFile">';
              }
            ?>
            
            <!-- <input type="submit" name="submit" value="Upload Slip"> -->
            <input type="reset" value="Reset" id="resetFile">
        </form>

        <!-- <div class="btn_back">
        <a href="ordersUi.php"><button id="Back_btn">Back</button></a>
      </div> -->

        </div>

      

    <!-- <div class="slip">
      <p>Hello</p>
    </div> -->



      <!--Buttons-->
      <!-- <div class="btn_back">
        <a href="ordersUi.php"><button id="Back_btn">Back</button></a>
      </div> -->
      <!-- <div class="btn_uploadSlip">
        <button id="uploadSlip_btn">Upload Slip</button>
      </div> -->

      <!-- Script for notifications functionality -->
      <script src="../../View/notification.js"></script>
  </body>
</html>