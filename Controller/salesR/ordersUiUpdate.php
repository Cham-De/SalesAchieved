<?php
    require __DIR__.'/../../Model/utils.php';
    require_once("../../Model/salesR/ordersUpdateCRUD.php");
    $username = check_login("Sales Representative");
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
    <!--stylesheet for the ordersUiUpdate page-->
    <link rel="stylesheet" href="../../View/styles/salesR/ordersUiUpdate.css">
    <!--Stylesheet for nav bar-->
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <!--Stylesheet for cards-->
    <link rel="stylesheet" href="../../View/styles/orderDetailsCards.css">

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
    <form method="post">
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
                <h4>John Doe</h4>
                <small>Sales Representative</small>
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

    <!--Card Topic-->
    <?php $row = mysqli_fetch_array($result);
        $orderID = $row['orderID'];?>
    
    <h1 class="orderNo">
        Order No: <?php echo $row['orderID'];?>
    </h1>
    
    <!--Cards with details-->
    <div class="middle">
            <table class="prof-table">
                <!-- <tr>
                     <td>
                        <div class="orderForm">
                            <label for="customerName">Customer Name
                                <p class="noEdit"><?php //echo $row['name']; ?></p>
                                
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="orderForm">
                            <label for="paymentStatus">Payment Status
                                <p class="noEdit"><?php //echo $row['paymentStatus']; ?></p>
                            </label>
                        </div>
                    </td>
                </tr> -->
                <!-- <tr>
                    <td>
                        <div class="orderForm">
                            <label for="address">Address
                                <p class="noEdit"><?php //echo $row['address']; ?></p>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="orderForm">
                            <label for="orderStatus">Order Status
                                <p class="noEdit"><?php //echo $row['orderStatus']; ?></p>
                            </label>
                        </div>
                    </td>
                </tr> -->
                <tr>
                    <!-- <td>
                        <div class="orderForm">
                            <label for="phoneNumber">Phone Number
                                <p class="noEdit"><?php //echo $row['phone']; ?></p>
                            </label>
                        </div>
                    </td> -->
                    <td>
                        <label for="deliveryDate">Delivery Date
                            <input type="date" id="deliveryDate" name="updateDeliveryDate" value=<?php echo '"'.$row['deliveryDate'].'"'; ?>>
                        </label>
                    </td>
                    <td>
                        <div class="orderForm">
                            <label for="orderStatus">Order Status
                                <select id="orderStatus" name="updateOrderStatus" value=<?php echo '"'.$row['orderStatus'].'"'; ?>>
                                    <?php
                                        echo "<option value='Pending' ".(($row["orderStatus"] == "Pending") ? "selected" : "").">Pending</option>";
                                        echo "<option value='Cancel' ".(($row["orderStatus"] == "Cancel") ? "selected" : "").">Cancel</option>";
                                    ?>
                                </select>
                            </label>
                        </div>
                    </td>
                </tr>
                    <!-- <td>
                        <div class="orderForm">
                            <label for="orderDate">Order Date
                                <p class="noEdit"><?php //echo $row['orderDate']; ?></p>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="orderForm">
                            <label for="dispatchDate">Dispatched Date
                                <?php //if($row['dispatchDate'] == NULL){?>
                                    <p class="noEdit">Not yet Dispatched</p>
                                <?php //}
                                //else{?>
                                    <p class="noEdit"><?php //echo $row['dispatchDate']; ?></p>
                                <?php //} ?>
                            </label>
                        </div>
                    </td> -->
                </tr>
                <!-- <tr>
                    <td>
                        <div class="orderForm">
                            <label for="paymentMethod">Payment Method
                                <select id="paymentMethod" name="updatePaymentMethod" value=<?php //echo '"'.$row['paymentMethod'].'"'; ?>>
                                    <option value="COD">Cash on Delivery</option>
                                    <option value="BT">Bank Transactions</option>
                                </select>
                            </label>
                        </div>
                    </td> -->
                    <!-- <td>
                        <div class="orderForm">
                            <label for="deliveryRegion">Delivery Region
                                <select id="deliveryRegion" name="updateDeliveryRegion" value=<?php //echo '"'.$row['deliveryRegion'].'"'; ?>>
                                    <option value="Within Colombo">Within Colombo</option>
                                    <option value="Colombo Suburbs">Colombo Suburbs</option>
                                    <option value="Out of Colombo">Out of Colombo</option>
                                </select>
                            </label>
                        </div>
                    </td> -->
                </tr>
            </table>
      </div>
      <!-- <div class="middle">
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
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>4000.00</td>
                  </tr>
              </tbody>
        </table>
      </div> -->

      <!--Buttons-->
      <div class="btn_back">
        <a href="ordersUi.php"><button id="Back_btn">Back</button></a>
      </div>
      <div class="btn_cancel">
        <button id="Cancel_btn">Cancel</button>
      </div>
      <div class="btn_update">
        <button id="Update_btn" name="update">Update</button>
      </div>
</form>
</body>
</html>