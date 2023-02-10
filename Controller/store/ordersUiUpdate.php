<?php
    require_once("../../Model/store/OrdersUpdate.php");
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
    <link rel="stylesheet" href="../../View/styles/store/ordersUiUpdate.css">
    <!--Stylesheet for nav bar-->
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <!--Stylesheet for cards-->
    <link rel="stylesheet" href="../../View/styles/orderDetailsCards.css">

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
            <td><a href="#">Log out</a></td>
          </tr>
        </table>
    </div>
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
    <!---end of side and nav bars-->

    <!--Card Topic-->
    <h1 class="orderNo">
        Order: 23
    </h1>
    
    <!--Cards with details-->
    <div class="middle">
            <table class="prof-table">
                <tr>
                    <td>
                        <div class="orderForm">
                            <label for="customerName">Customer Name
                            <input type="text" id="customerName" name="customerName" value="Senu Dilshara">
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="orderForm">
                            <label for="paymentStatus">Payment Status
                                <select id="paymentStatus" name="paymentStatus">
                                    <option value="pending">Pending</option>
                                    <option value="done">Done</option>
                                    <option value="fault">Fault</option>
                                </select>
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="orderForm">
                            <label for="address">Address
                                <input type="text" id="address" name="address" value="23/A, Flower Road, Maharagama">
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="orderForm">
                            <label for="orderStatus">Order Status
                                <select id="orderStatus">
                                    <option value="inProgress">In progress</option>
                                    <option value="dispatched">Dispatched</option>
                                    <option value="delivered">Delivered</option>
                                    <option value="completed">Completed</option>
                                </select>
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="orderForm">
                            <label for="phoneNumber">Phone Number
                                <input type="text" id="phoneNumber" name="phone" value="0717483988">
                            </label>
                        </div>
                    </td>
                    <td>
                        <label for="deliveryDate">Delivery Date
                            <input type="date" id="deliveryDate" name="deliveryDate" value="2022-11-02">
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="orderDate">Order Date
                            <input type="date" id="orderDate" name="orderDate" value="2022-11-02">
                        </label>
                    </td>
                    <td>
                        <label for="dispatchDate">Dispatch Date
                            <input type="date" id="dispatchDate" name="dispatchDate" value="2022-11-02">
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="orderForm">
                            <label for="paymentMethod">Payment Method
                                <select id="paymentMethod" name="paymentMethod">
                                    <option value="cod">Cash on Delivery</option>
                                    <option value="bt">Bank Transactions</option>
                                </select>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="orderForm">
                            <label for="deliveryRegion">Delivery Region
                                <select id="deliveryRegion" name="deliveryRegion">
                                    <option value="withinColombo">Within Colombo</option>
                                    <option value="suburbs">Colombo Suburbs</option>
                                    <option value="outOfColombo">Out of Colombo</option>
                                </select>
                            </label>
                        </div>
                    </td>
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
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>4000.00</td>
                  </tr>
              </tbody>
        </table>
      </div>

      <!--Buttons-->
      <div class="btn_back">
        <a href="ordersUi.php"><button id="Back_btn">Back</button></a>
      </div>
      <div class="btn_cancel">
        <button id="Cancel_btn">Cancel</button>
      </div>
      <div class="btn_update">
        <button id="Update_btn" type="Submit" value="Submit" name="submit">Update</button>
      </div>
</body>
</html>