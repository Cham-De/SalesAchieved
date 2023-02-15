<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Courier-Dashboard</title>
    <link rel="stylesheet"
      href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!--stylesheet for icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Stylesheet for nav bar-->
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <!--Stylesheet for order details cards-->
    <link rel="stylesheet" href="../../View/styles/orderDetailsCards.css">
    <!--Stylesheet for buttons-->
    <link rel="stylesheet" href="../../View/styles/courier/uploadSlip.css">

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
              <h4>John Doe</h4>
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
      <div class="uploadSlip">
        <table class="slipTable">
          <td>
            <tr>
              <form>
                <input type="file" id="slip" name="slip">
              </form>
            </tr>
          </td>
        </table>
        <!-- <img src="../assets/slip.jpg" alt="bank slip"> -->
      </div>

      <!--Buttons-->
      <div class="btn_back">
        <a href="ordersUi.php"><button id="Back_btn">Back</button></a>
      </div>
      <!-- <div class="btn_uploadSlip">
        <button id="uploadSlip_btn">Upload Slip</button>
      </div> -->
  </body>
</html>