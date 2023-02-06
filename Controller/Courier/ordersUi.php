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
    <!--Stylesheet for order cards-->
    <link rel="stylesheet" href="../../View/styles/cards.css">
    <!--Stylesheet for buttons on order cards-->
    <link rel="stylesheet" href="../../View/styles/buttons.css">
    <link rel="stylesheet" href="../../View/styles/graphs.css">
    <link rel="stylesheet" href="../../View/styles/filter-buttons.css">


    <style>
        .wrapper{
        position: absolute;
        display: flex;
        width: 70%;
        top: 16%;
        margin-left:22%;
    }
    .side-bar-icons{
      margin-top: 45%;
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
            <td><a href="#">Log out</a></td>
          </tr>
        </table>
  </div>
  <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
  <!---end of side and nav bars-->



  <div class="wrapper">
            <div class="dropdown">
                <button onclick="myFunction(this)" class="dropbtn"><span class="button__text">2022</span> 
                    <span class="button__icon" onclick="myFunction(this)">
                        <!--<ion-icon name="arrow-down-circle-outline"></ion-icon>-->
                        <i style="color: #2c0dda;" class="fa-solid fa-chevron-down fa-lg"></i>
                    </span>
                </button>
                 <div style="min-width: 140px;" id="myDropdown1" class="dropdown-content">
                    <a href="#">2021</a>
                    <a href="#">2019</a>
                    <a href="#">2018</a>
                 </div>
             </div> 
            <div class="dropdown">
                <button onclick="myFunction(this)" class="dropbtn"><span class="button__text">January</span>
                    <span class="button__icon" onclick="myFunction(this)">
                        <!--<ion-icon name="arrow-down-circle-outline"></ion-icon>-->
                        <i style="color: #2c0dda;" class="fa-solid fa-chevron-down fa-lg"></i>
                    </span>
                </button>
                 <div id="myDropdown2" class="dropdown-content">
                    <a href="#">February</a>
                    <a href="#">March</a>
                    <a href="#">April</a>
                 </div>
             </div> 
    </div>
  <!--Orders Cards-->
  <div class="cards-middle" id="cards_middle">
    <ul class="middle-cards">
        <li>
            <div class="cards">
                <div class="cmpg">
                    <h2>Order 23</h2>
                    <div class="orderStatus">
                        <h4>Pending</h4>
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
                        <h4 style="color: green;">Complete</h4>
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
                    <div class="button delivered" style="background: blue;">
                        <table>
                            <tr>
                                <td><i class="fa-solid fa-clipboard-check" style="color: white;"></i></td>
                                <td><button id="performance" class="delivered-txt"><a href="#" style="color: white;">Delivered</a></button></td>
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
                        <h4>Pending</h4>
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
                        <h4 style="color: green;">Complete</h4>
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
                    <div class="button delivered" style="background: blue;">
                        <table>
                            <tr>
                                <td><i class="fa-solid fa-clipboard-check" style="color: white;"></i></td>
                                <td><button id="performance" class="delivered-txt"><a href="#" style="color: white;">Delivered</a></button></td>
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
                        <h4>Pending</h4>
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
    
    <script>
        var myFunction = function(target) {
   target.parentNode.querySelector('.dropdown-content').classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.button__text')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
    </script>
</body>
</html>