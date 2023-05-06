<?php
  require __DIR__.'/../../Model/utils.php';
  require_once("../../Model/courier/ordersUiViewCRUD.php");
  $agentData = courier_check_login();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SalesAchieved</title>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!--stylesheet for icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Stylesheet for nav bar-->
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <!--Stylesheet for cards-->
    <link rel="stylesheet" href="../../View/styles/orderDetailsCards.css">
    <!-- Stylesheet for ordersUiView -->
    <link rel="stylesheet" href="../../View/styles/courier/ordersUiView.css">

    <style>
    .side-bar-icons{
      margin-top: 45%;
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
            <img src="../../View/assets/man.png" width="50px" height="50px" alt="user image">
            <div>
              <h4><?php echo $agentData['companyName'];?></h4>
              <small>Courier</small>
            </div>
        </div>
    </div>
  
    <div class="side_bar">
        <div class="logo">
            <img src="../../View/assets/saleslogo-final.png" width="70%" height="70%">
        </div>
        <ul>
            <li><a href="landingUi.php"><i class="fa-solid fa-house"></i>Home</a></li>
            <li class="active"><a href="ordersUi.php"><i class="fa-solid fa-file-circle-check"></i>Orders</a></li>
            <li><a href="paymentsUi.php"><i class="fa-solid fa-user-group"></i>Payments</a></li>
            <li><a href="requests.php"><i class="fa-solid fa-circle-exclamation"></i>Requests</a></li>
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
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
    <!---end of side and nav bars-->

    <!--Card Topic-->
    <?php $row = mysqli_fetch_array($result)?>
    <h1 class="orderNo">
        Order: 23
    </h1>
    
    <!--Cards with details-->
      <div class="middle">
        <table class="prof-table">
            <tr>
                <td><p>Customer Name</p><b><?php echo $row['customerName'];?></b></td>
                <td><p>Order Status</p><b><?php echo $row['orderStatus'];?></b></td>
            </tr>
            <tr>
                <td><p>Address</p><b><?php echo $row['address'];?></b></td>
                <td><p>Delivery Date</p><b><?php echo $row['deliveryDate'];?></b></td>
            </tr>
            <tr>
                <td><p>Phone Number</p><b><?php echo $row['phone'];?></b></td>
                <td><p>Dispatch Date</p><b><?php if($row['dispatchDate'] == NULL){
                                                          echo 'Not yet set';}
                                                      else{
                                                          echo $row['dispatchDate'];}?></b></td>
            </tr>
            <tr>
                <td><p>Payment Method</p><b><?php echo $row['paymentMethod'];?></b></td>
            </tr>
        </table>
      </div>

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
                $charge = 0;
                $totalPrice = 0;
                while($rows = mysqli_fetch_assoc($resultOrder))
                  {
              ?>
                <tr>
                  <td><?php echo $rows['productCode'];?></td>
                  <td><?php echo $rows['productName'];?></td>
                  <td><?php echo $rows['sellingPrice'];?></td>
                  <td><?php echo $rows['quantity'];?></td>
                  <td><?php echo $rows['sellingPrice'] * $rows['quantity'];?></td>
                </tr>
                <?php
                  $charge = $rows['charges'];
                  $totalPrice = $totalPrice + $rows['sellingPrice'] * $rows['quantity'];
                  }
                ?>
                <tr>
                  <td colspan="4" style="text-align:right"><b>Total Order Value</b></td>
                  <td><?php echo $totalPrice;?></td>
                </tr>
                <tr>
                  <td colspan="4" style="text-align:right"><b>Delivery Charges</b></td>
                  <td><?php echo $charge;?><hr /></td>
                </tr>
                <tr>
                  <td colspan="4" style="text-align:right"><b>Total Charges</b></td>
                  <td><?php echo $charge + $totalPrice;?><hr /><hr /></td>
                </tr>
              </tbody>
        </table>
      </div>
      
    <!--Buttons-->
    <div class="btn_back">
    <a href="ordersUi.php"><button id="Back_btn">Back</button></a>
    </div>
</body>
</html>