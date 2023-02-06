<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Finance Manager</title>
    <link rel="stylesheet"
      href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!--stylesheet for icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Stylesheet for nav bar-->
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <!--Stylesheet for order details cards-->
    <link rel="stylesheet" href="../../View/styles/orderDetailsCards.css">
    <!--Stylesheet for buttons-->
    <link rel="stylesheet" href="../../View/styles/courier/viewSlip.css">

    <style>
    
    div.side_bar ul li{
        padding-top: 8%;
        padding-bottom: 6%;
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
              <small>Finance Manager</small>
          </div>
      </div>
  </div>

  <div class="side_bar">
      <div class="logo">
          <img src="../../View/assets/saleslogo-final.png" width="70%" height="70%">
      </div>
      <ul class="icon-list">
            <li class="active"><a href="index.php"><i style="margin-right: 2%;" class="fa-solid fa-house"></i>Home</a></li>
            <li><a href="commissions.php"><i style="margin-right: 2%;" class="fa-solid fa-money-check-dollar"></i>Commissions</a></li>
            <li><a href="products.php"><i style="margin-right: 2%;" class="fa-solid fa-boxes-stacked"></i>Products</a></li>
            <li><a href="sales.php"><i style="margin-right: 2%;" class="fa-solid fa-magnifying-glass-dollar"></i>Sales</a></li>
            <li><a href="payment.php"><i style="margin-right: 2%;" class="fa-solid fa-hand-holding-dollar"></i>Payments</a></li>
            <li><a href="#"><i style="margin-right: 2%;" class="fa-solid fa-file-contract"></i>Reports</a></li>
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
      <div class="slip">
        <img src="../../View/assets/slip.jpg" alt="bank slip">
      </div>

      <!--Buttons-->
      <div class="btn_back">
        <a href="payment.php"><button id="Back_btn">Back</button></a>
      </div>
      <div class="btn_update">
        <button id="Update_btn">Re-Upload</button>
      </div>
  </body>
</html>