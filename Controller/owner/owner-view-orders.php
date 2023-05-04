<?php
    require __DIR__.'/../../Model/utils.php';
    
    $userData = check_login("Owner");
?>
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
        margin-bottom: 5%;
    }

    

    #charge_btn_back{
        cursor: pointer;
        border: none;
        background: #F8914A;
        color: white;
        padding: 10px 15px;
        border-radius: 12px;
        margin-left: 45%;
    }

    #charge_btn_back:hover{
        color: #F8914A;
        border: 2px solid #F8914A;
        background: white;
    }

    .content-table{
      margin-top: 8%;
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
            <li class="active"><a href="owner-orders.php"><i style="margin-right: 2%;" class="fa-solid fa-cart-arrow-down"></i>Orders</a></li>
            <li><a href="owner-payments.php"><i style="margin-right: 2%;" class="fa-solid fa-money-check-dollar"></i>Payments</a></li>
            <li><a href="owner-stat.php"><i style="margin-right: 2%;" class="fa-solid fa-chart-line"></i>Statistics</a></li>
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

             <button id="charge_btn_back">Back</button>
    </div>

         <table class="content-table">
            <thead>
              <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Address</th>
                <th>Product Category</th>
                <th>Selling Price<br>(Rs.)</th>
                <th>Quantity Sold</th>
                <th>Status</th>
                <th>Delivery Date</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>12</td>
                <td>Senuri Dilshara</td>
                <td>23/B, Flower Rd,
                    Maharagama</td>
                <td>Cat 3</td>
                <td>1500.00</td>
                <td>24</td>
                <td>Delivered</td>
                <td>12/9/2022</td>
              </tr>
              <tr>
                <td>12</td>
                <td>Senuri Dilshara</td>
                <td>23/B, Flower Rd,
                    Maharagama</td>
                <td>Cat 3</td>
                <td>1500.00</td>
                <td>24</td>
                <td>Delivered</td>
                <td>12/9/2022</td>
              </tr>
              <tr>
                <td>12</td>
                <td>Senuri Dilshara</td>
                <td>23/B, Flower Rd,
                    Maharagama</td>
                <td>Cat 3</td>
                <td>1500.00</td>
                <td>24</td>
                <td>Delivered</td>
                <td>12/9/2022</td>
              </tr>
              <tr>
                <td>12</td>
                <td>Senuri Dilshara</td>
                <td>23/B, Flower Rd,
                    Maharagama</td>
                <td>Cat 3</td>
                <td>1500.00</td>
                <td>24</td>
                <td>Delivered</td>
                <td>12/9/2022</td>
              </tr>
              <tr>
                <td>12</td>
                <td>Senuri Dilshara</td>
                <td>23/B, Flower Rd,
                    Maharagama</td>
                <td>Cat 3</td>
                <td>1500.00</td>
                <td>24</td>
                <td>Delivered</td>
                <td>12/9/2022</td>
              </tr>
            </tbody>
          </table>

          <div class="navigation-table">
            <i class="fa-solid fa-circle-chevron-left fa-lg"></i>
            <i class="fa-solid fa-circle-chevron-right fa-lg"></i>
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
    <script>
    const charge_btn = document.getElementById('charge_btn_back');

    charge_btn.addEventListener('click', () => {
      location.href = "./owner-orders.php";
    });

</script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
</body>
</html>