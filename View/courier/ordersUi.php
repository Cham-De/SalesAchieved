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
    <link rel="stylesheet" href="../styles/navBar.css">
    <!--Stylesheet for order cards-->
    <link rel="stylesheet" href="../styles/cards.css">
    <!--Stylesheet for buttons on order cards-->
    <link rel="stylesheet" href="../styles/buttons.css">
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
              <small>Courier</small>
          </div>
      </div>
  </div>

  <div class="side_bar">
      <div class="logo">
          <img src="../assets/logosales.jpeg" width="65%" height="55%">
      </div>
      <ul>
          <li><a href="landingUi.php"><i class="fa-solid fa-house"></i>Home</a></li>
          <li class="active"><a href="ordersUi.php"><i class="fa-solid fa-file-circle-check"></i>Orders</a></li>
          <li><a href="paymentsUi.php"><i class="fa-solid fa-user-group"></i>Payments</a></li>
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

  <!--Orders Cards-->
  <div class="cards-middle" id="cards_middle">
    <ul class="middle-cards">
        <li>
            <div class="cards">
                <div class="cmpg">
                    <h2>Order 23</h2>
                    <div class="orderStatus">
                        <h5>Pending</h5>
                    </div>
                </div>
                <div class="dv">
                    <div class="customerName">
                        Senu Dilshara<br>
                        15/11/2022
                    </div>
                    <div class="button view">
                        <table>
                            <tr>
                                <td><i class="fa-solid fa-eye"></i></td>
                                <td><button id="performance" class="view-txt"><a href="ordersUiView.php">View</a></button></td>
                            </tr>
                        </table>
                    </div>
                    <div class="button delivered">
                        <table>
                            <tr>
                                <td><i class="fa-solid fa-clipboard-check"></i></td>
                                <td><button id="performance" class="delivered-txt"><a href="#">Delivered</a></button></td>
                            </tr>
                        </table>
                    </div>
                    <div class="button uploadSlip">
                        <table>
                            <tr>
                                    <td><i class="fa-solid fa-angles-up"></i></td>
                                    <td><button id="performance" class="uploadSlip-txt"><a href="uploadSlip.php">Upload Slip</a></button></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="cards">
                <div class="cmpg">
                    <h2>Order 24</h2>
                    <div class="orderStatus">
                        <h5>Pending</h5>
                    </div>
                </div>
                <div class="dv">
                    <div class="customerName">
                        Bethmi Navanjana<br>
                        15/11/2022
                    </div>
                    <div class="button view">
                        <table>
                            <tr>
                                <td><i class="fa-solid fa-eye"></i></td>
                                <td><button class="view-txt"><a href="ordersUiView.php">View</a></button></td>
                            </tr>
                        </table>
                    </div>
                    <div class="button delivered">
                        <table>
                            <tr>
                                <td><i class="fa-solid fa-clipboard-check"></i></td>
                                <td><button id="performance" class="delivered-txt"><a href="#">Delivered</a></button></td>
                            </tr>
                        </table>
                    </div>
                    </div>
            </div>
        </li>
        <li>
            <div class="cards">
                <div class="cmpg">
                    <h2>Order 25</h2>
                    <div class="orderStatus">
                        <h5>Pending</h5>
                    </div>
                </div>
                <div class="dv">
                    <div class="customerName">
                        Binu De Silva<br>
                        15/11/2022
                    </div>
                    <div class="button view">
                        <table>
                            <tr>
                                <td><i class="fa-solid fa-eye"></i></td>
                                <td><button class="view-txt"><a href="ordersUiView.php">View</a></button></td>
                            </tr>
                        </table>
                    </div>
                    <div class="button delivered">
                        <table>
                            <tr>
                                <td><i class="fa-solid fa-clipboard-check"></i></td>
                                <td><button id="performance" class="delivered-txt"><a href="#">Delivered</a></button></td>
                            </tr>
                        </table>
                    </div>
                    </div>
            </div>
        </li>
        <li>
            <div class="cards">
                <div class="cmpg">
                    <h2>Order 26</h2>
                    <div class="orderStatus">
                        <h5>Pending</h5>
                    </div>
                </div>
                <div class="dv">
                    <div class="customerName">
                        Senu Dilshara<br>
                        15/11/2022
                    </div>
                    <div class="button view">
                        <table>
                            <tr>
                                <td><i class="fa-solid fa-eye"></i></td>
                                <td><button id="performance" class="view-txt"><a
                                            href="ordersUiView.php">View</a></button></td>
                            </tr>
                        </table>
                    </div>
                    <div class="button delivered">
                        <table>
                            <tr>
                                <td><i class="fa-solid fa-clipboard-check"></i></td>
                                <td><button id="performance" class="delivered-txt"><a href="#">Delivered</a></button></td>
                            </tr>
                        </table>
                    </div>
                    <div class="button uploadSlip">
                        <table>
                            <tr>
                                <td><i class="fa-solid fa-file"></i></td>
                                <td><button id="performance" class="uploadSlip-txt"><a
                                            href="viewSlip.php">View Slip</a></button></td>
                            </tr>
                        </table>
                    </div>
                    </div>
            </div>
        </li>
        <li>
            <div class="cards">
                <div class="cmpg">
                    <h2>Order 27</h2>
                    <div class="orderStatus">
                        <h5>Pending</h5>
                    </div>
                </div>
                <div class="dv">
                    <div class="customerName">
                        Senu Dilshara<br>
                        15/11/2022
                    </div>
                    <div class="button view">
                        <table>
                            <tr>
                                <td><i class="fa-solid fa-eye"></i></td>
                                <td><button id="performance" class="view-txt"><a
                                            href="ordersUiView.php">View</a></button></td>
                            </tr>
                        </table>
                    </div>
                    <div class="button delivered">
                        <table>
                            <tr>
                                <td><i class="fa-solid fa-clipboard-check"></i></td>
                                <td><button id="performance" class="delivered-txt"><a href="#">Delivered</a></button></td>
                            </tr>
                        </table>
                    </div>
                    </div>
            </div>
        </li>
    </ul>
    
  </body>
</html>