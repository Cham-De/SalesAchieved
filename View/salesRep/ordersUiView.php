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
    <link rel="stylesheet" href="../styles/navBar.css">
    <!--Stylesheet for cards-->
    <link rel="stylesheet" href="../styles/orderDetailsCards.css">
    <!--Stylesheet for ordersUiView-->
    <link rel="stylesheet" href="ordersUiView.css">
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
            <img src="../assets/man.png" width="50px" height="50px" alt="user image">
            <div>
                <h4>John Doe</h4>
                <small>Sales Representative</small>
            </div>
        </div>
    </div>
  
    <div class="side_bar">
        <div class="logo">
            <img src="../assets/logosales.png" width="80%" height="80%">
        </div>
        <ul>
            <li><a href="#"><i class="fa-solid fa-house"></i>Home</a></li>
            <li class="active"><a href="#"><i class="fa-solid fa-file-circle-check"></i>Orders</a></li>
            <li><a href="customersUi.php"><i class="fa-solid fa-user-group"></i>Customers</a></li>
            <li><a href="stocksUi.php"><i class="fa-solid fa-warehouse"></i>Stocks</a></li>
            <li><a href="salesUi.php"><i class="fa-solid fa-sack-dollar"></i>Sales</a></li>
            <li><a href="complaints.php"><i class="fa-solid fa-comment"></i>Complaints</a></li>
        </ul>
        <ul class="profile">
            <li>
                <a href="../profile.php"><i class="fa-regular fa-circle-user"></i>Profile</a>
            </li>
            <li>
                <a href="#"><i class="fa-solid fa-arrow-right-from-bracket"></i>Log out</a>
            </li>
        </ul>
    </div>
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
                <td><p>Customer Name</p><b>Senu Dilshara</b></td>
                <td><p>Payment Status</p><b>Pending</b></td>
            </tr>
            <tr>
                <td><p>Address</p><b>23/B, Flower Road, Maharagama</b></td>
                <td><p>Order Status</p><b>Complete</b></td>
            </tr>
            <tr>
                <td><p>Phone Number</p><b>0786546567</b></td>
                <td><p>Delivery Date</p><b>02/11/2022</b></td>
            </tr>
            <tr>
                <td><p>Order Date</p><b>08/10/2022</b></td>
                <td><p>Dispatch Date</p><b>12/10/2022</b></td>
            </tr>
            <tr>
                <td><p>Payment Method</p><b>Bank Transfer</b></td>
                <td><p>Approved</p><b>Yes</b></td>
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