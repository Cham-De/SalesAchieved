<?php
    require_once("../../Model/salesR/ordersCRUD.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Rep</title>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!--stylesheet for icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Stylesheet for nav bar-->
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <!--Stylesheet for cards-->
    <link rel="stylesheet" href="../../View/styles/orderDetailsCards.css">
    <!--Stylesheet for ordersUiView-->
    <link rel="stylesheet" href="../../View/styles/store/ordersUiView.css">

    <style>
      div.side_bar ul li{
        padding-top: 8%;
        padding-bottom: 8%;
    }

    .side-bar-icons{
      margin-top: 15%;
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

        <?php $order_id = $_GET['order_id']; $cus_id = $_GET['cus_id'];?>
  
        <div class="user-wrapper">
            <img src="../../View/assets/man.png" width="50px" height="50px" alt="user image">
            <div>
                <h4>John Doe</h4>
                <small>Store Manager</small>
            </div>
        </div>
    </div>
  
    <div class="side_bar">
        <div class="logo">
            <img src="../../View/assets/saleslogo-final.png" width= "70%" height="70%">
        </div>
        <ul>
            <li><a href="landingUi.php"><i class="fa-solid fa-house"></i>Home</a></li>
            <li><a href="stocksUi.php"><i class="fa-solid fa-warehouse"></i>Stocks</a></li>
            <li class="active"><a href="ordersUi.php"><i class="fa-solid fa-file-circle-check"></i>Orders</a></li>
            <li><a href="agentsUi.php"><i class="fa-solid fa-user-group"></i>Agents</a></li>
            <li><a href="returnedGoodsUi.php"><i class="fa-solid fa-user-group"></i>Returned Goods</a></li>
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

    <?php $filtered_results_for_get_customer_details = array();
      while ($row = mysqli_fetch_assoc($result_for_get_customer_details)) {
        if ($row['customerID'] == $cus_id) {
          $filtered_results_for_get_customer_details[] = $row;
        }
      } 
    ?>

    <?php $filtered_result_for_get_all_orders = array();
      while ($row = mysqli_fetch_assoc($result_for_get_all_orders)) {
        if ($row['orderID'] == $order_id) {
          $filtered_result_for_get_all_orders[] = $row;
        }
      } 
    ?>



    <!---end of side and nav bars-->

    <!--Card Topic-->
    <h1 class="orderNo">
        Order: <?php echo $order_id ?>
    </h1>
    
    <!--Cards with details-->
    <div class="middle">
        <table class="prof-table">
            <tr>
                <td><p>Customer Name</p><b><?php echo $filtered_results_for_get_customer_details[0]['name']?></b></td>
                <td><p>Payment Status</p><b><?php echo $filtered_result_for_get_all_orders[0]['orderStatus']?></b></td> <!--payment status eka danna -->
            </tr>
            <tr>
                <td><p>Address</p><b><?php echo $filtered_results_for_get_customer_details[0]['address']?></b></td>
                <td><p>Order Status</p><b><?php echo $filtered_result_for_get_all_orders[0]['orderStatus']?></b></td>
            </tr>
            <tr>
                <td><p>Phone Number</p><b><?php echo $filtered_results_for_get_customer_details[0]['phone']?></b></td>
                <td><p>Delivery Date</p><b><?php echo $filtered_result_for_get_all_orders[0]['deliveryDate']?></b></td>
            </tr>
            <tr>
                <td><p>Order Date</p><b><?php echo $filtered_result_for_get_all_orders[0]['orderDate']?></b></td>
                <td><p>Dispatch Date</p><b><?php echo $filtered_result_for_get_all_orders[0]['dispatchDate']?></b></td>
            </tr>
            <tr>
                <td><p>Payment Method</p><b><?php echo $filtered_result_for_get_all_orders[0]['paymentMethod']?></b></td>
                <td><p>Approved</p><b><?php echo $filtered_result_for_get_all_orders[0]['orderStatus']?></b></td> <!--Approved eka danna -->
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
                <tr>
                  <td>001</td>
                  <td>Bag</td>
                  <td>1000.00</td>
                  <td>1</td>
                  <td>1000.00</td>
                </tr>
                <tr>
                    <td>001</td>
                    <td>Bag</td>
                    <td>1000.00</td>
                    <td>1</td>
                    <td>1000.00</td>
                  </tr>
                  <tr>
                    <td>001</td>
                    <td>Bag</td>
                    <td>1000.00</td>
                    <td>1</td>
                    <td>1000.00</td>
                  </tr>
                  <tr>
                    <td>001</td>
                    <td>Bag</td>
                    <td>1000.00</td>
                    <td>1</td>
                    <td>1000.00</td>
                  </tr>
                  <tr>
                    <td>001</td>
                    <td>Bag</td>
                    <td>1000.00</td>
                    <td>1</td>
                    <td>1000.00</td>
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