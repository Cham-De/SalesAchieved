<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <link rel="stylesheet" href="../../View/styles/popup-btn-table.css">
    <link rel="stylesheet" href="../../View/styles/filter-buttons.css">

    <style>
      .search-wrap-container{
        display: flex;
        justify-content: space-between;
      }

      .search_container{
        margin-left: 25%;
      }

      .nav_bar{
        margin-bottom: 2%;
      }
      .wrapper{
        display: flex;
        width: auto;
        margin-right: 8%;
      }

      div.side_bar ul li{
        padding-top: 8%;
        padding-bottom: 6%;
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
                <small style="color:rgb(235, 137, 58)">Finance Manager</small>
            </div>
        </div>
    </div>

    <div class="side_bar">
        <div class="logo">
            <img src="../../View/assets/saleslogo-final.png" width= "70%" height="70%">
        </div>
        <ul class="icon-list">
            <li><a href="finance-home.php"><i style="margin-right: 2%;" class="fa-solid fa-house"></i>Home</a></li>
            <li><a href="commissions.php"><i style="margin-right: 2%;" class="fa-solid fa-money-check-dollar"></i>Commissions</a></li>
            <li><a href="products.php"><i style="margin-right: 2%;" class="fa-solid fa-boxes-stacked"></i>Products</a></li>
            <li  class="active"><a href="sales.php"><i style="margin-right: 2%;" class="fa-solid fa-magnifying-glass-dollar"></i>Sales</a></li>
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

    <div class="search-wrap-container">
        <div class="search_container">
          <table class="element_container">
            <tr>
              <td>
                <input type="text" placeholder="Search Sales Rep..." class="search">
              </td>
              <td>
                <a><i class="fa-solid fa-magnifying-glass"></i></a>
              </td>
            </tr>
          </table>
        </div>

        <div class="wrapper">
        <div class="dropdown">
                <button onclick="myFunction(this)" class="dropbtn"><span class="button__text">2022</span> 
                    <span class="button__icon" onclick="myFunction(this)">
                        <!--<ion-icon name="arrow-down-circle-outline"></ion-icon>-->
                        <i style="color: #F8914A;" class="fa-solid fa-chevron-down fa-lg"></i>
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
                        <i style="color: #F8914A;" class="fa-solid fa-chevron-down fa-lg"></i>
                    </span>
                </button>
                 <div id="myDropdown2" class="dropdown-content">
                    <a href="#">February</a>
                    <a href="#">March</a>
                    <a href="#">April</a>
                 </div>
             </div> 
     </div>
      </div>



      
     <table class="content-table">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Product</th>
            <th>Sales Rep Name</th>
            <th>Selling Price<br>(Rs.)</th>
            <th>Quantity Sold</th>
            <th>Date</th>
            <th>Revenue<br>(Rs.)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>11</td>
            <td>Product 4</td>
            <td>Anil Kumara</td>
            <td>1500.00</td>
            <td>2</td>
            <td>23/02/2022</td>
            <td>3,000.00</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Product 2</td>
            <td>Sanduni Perera</td>
            <td>2500.00</td>
            <td>1</td>
            <td>25/02/2022</td>
            <td>2,000.00</td>
          </tr>
          <tr>
            <td>8</td>
            <td>Product 3</td>
            <td>Chathu De Silva</td>
            <td>1500.00</td>
            <td>1</td>
            <td>15/02/2022</td>
            <td>2,100.00</td>
          </tr>
          <tr>
            <td>13</td>
            <td>Product 3</td>
            <td>Anil Kumara</td>
            <td>1900.00</td>
            <td>2</td>
            <td>20/02/2022</td>
            <td>3,800.00</td>
          </tr>
          <tr>
            <td>5</td>
            <td>Product 5</td>
            <td>Malka Nayomi</td>
            <td>1600.00</td>
            <td>3</td>
            <td>11/02/2022</td>
            <td>4,800.00</td>
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
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

      <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
</body>
</html>