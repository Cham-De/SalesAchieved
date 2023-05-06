<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <link rel="stylesheet" href="../../View/styles/popup-btn-table.css">
    <link rel="stylesheet" href="../../View/styles/filter-buttons.css">
    <link rel="stylesheet" href="../../View/styles/cards-large.css">
    <link rel="stylesheet" href="../../View/styles/stats.css">
    <style>
        div.side_bar ul li{
        text-align: left;
        padding-left: 30%;
        padding-top: 8%;
        padding-bottom: 9%;
    }
    .wrapper{
        position: absolute;
        display: flex;
        width: 70%;
        top: 16%;
        margin-left:25%;
    }

    .name{
        margin-top: 2%;
        margin-left:25%;
    }

    .view-cards-wrapper{
        border: none;
    }
    .view-card h1{
        margin-top: 45%;
    }
    </style>
</head>
<body>
<div class="nav_bar">
        <div class="search-container">
            <table class="element-container">
              <tr>
                <td>
                  <input type="text" placeholder="Search..." class="search">
                </td>
                <td>
                  <a><i style="color:rgb(235, 137, 58)" class="fa-solid fa-magnifying-glass"></i></a>
                </td>
              </tr>
            </table>
        </div>
        <div class="user-wrapper">
            <img src="../../View/assets/man.png" width="50px" height="50px" alt="user image">
            <div>
                <h4>John Doe</h4>
                <small style="color:rgb(235, 137, 58)">Owner</small>
            </div>
        </div>
    </div>

    <div class="side_bar">
        <div class="logo">
            <img src="../../View/assets/saleslogo-final.png" width= "70%" height="70%">
        </div>
        <ul class="icon-list">
            <li><a href="owner-landing.php"><i style="margin-right: 2%;" class="fa-solid fa-house"></i>Home</a></li>
            <li><a href="owner-orders.php"><i style="margin-right: 2%;" class="fa-solid fa-cart-arrow-down"></i>Orders</a></li>
            <li><a href="owner-payments.php"><i style="margin-right: 2%;" class="fa-solid fa-money-check-dollar"></i>Payments</a></li>
            <li class="active"><a href="owner-stat.php"><i style="margin-right: 2%;" class="fa-solid fa-chart-line"></i>Statistics</a></li>
            <li><a href="returned-goods.php"><i style="margin-right: 2%;" class="fa-solid fa-box-open"></i>Returned Goods</a></li>
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
    <main>

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
        

    <div class="graphs-large">
        <div class="sales">
                <h2 class="card-title">Audience</h2>
                <img src="../../View/assets/graph3.png" width="80%" height="80%" alt="monthly sales">
        </div>
        <div class="products">
                <h2 class="card-title">Page Reach</h2>
                <img src="../../View/assets/graph1.png" width="80%" height="80%" alt="monthly sales">
        </div>  
    </div>
        

    <div class="view-cards-wrapper">
      <h2 class="name">Overall KPIs</h2>
      <div class="kpi-cards-row">
      <div class="view-card">
        <table class="card-title-tb">
          <tr>
            <td>
              <i class="fa-solid fa-globe fa-lg"></i>
            </td>
            <td>
              <h3>Bounce Rate</h3>
            </td>
          </tr>
        </table>
        <h1>21.8%</h1>
      </div>
      <div class="view-card">
      <table class="card-title-tb">
          <tr>
            <td>
              <i class="fa-sharp fa-solid fa-arrow-up-right-from-square fa-lg"></i>
            </td>
            <td>
              <h3>Page Visits</h3>
            </td>
          </tr>
        </table>
        <h1>50</h1>
      </div>
      <div class="view-card" style="margin-right: 3%;">
        <table class="card-title-tb">
          <tr>
            <td>
              <i class="fa-sharp fa-solid fa-bag-shopping fa-lg"></i>
            </td>
            <td>
              <h3>Engagement</h3>
            </td>
          </tr>
        </table>
        <h1>45%</h1>
      </div>
      </div>
      
    </div>

        

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
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
</body>
</html>