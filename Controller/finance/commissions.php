<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commissions</title>
    <!--stylesheet for icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <link rel="stylesheet" href="../../View/styles/popup-btn-table.css">
    
    <style>
      .chng_rate{
        display: inline-block;
        padding: 2%;
        background: #FFFFFF;
        border: 1px solid #D9D9D9;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 10px;
      }

      .chng_rate h4{
        position: relative;
        top: 50%;
        transform: translate(0, -50%);
      }

      .btn_cmpg_ex{
        display: flex;
        margin-left: 20%;
        justify-content: space-between;
        margin: 0 auto;
      }

      .rightmost-items{
        display: flex;
        width: 30%;
        margin-right: 2%;
      }

      .nav_bar{
        margin-bottom: 2%;
      }

      .search_container{
        margin-left: 25%;
      }

      #add_btn_ex{
        cursor: pointer;
        border: none;
        background: #F8914A;
        color: white;
        padding: 3% 15px;
        border-radius: 12px;
        margin-left: 2%;
      }

      #add_btn_ex:hover{
        font-weight: 200;
        color: #F8914A;
        border: 2px solid #F8914A;
        background: white;
      }

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
            <li class="active"><a href="commissions.php"><i style="margin-right: 2%;" class="fa-solid fa-money-check-dollar"></i>Commissions</a></li>
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
            <td><a href="../home/logout.php">Log out</a></td>
          </tr>
        </table>
    </div>
    <!---end of side and nav bars-->

    <div class="btn_cmpg_ex">
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

        <div class="rightmost-items">
        <div class="chng_rate">
          <h4>Commission Rate = 5%</h4>
        </div>

        <button id="add_btn_ex">Change Rate</button>
        </div>
        

      </div>

    <!--<div class="search_box">
      <input type="text" class="input" placeholder="Search...">
      <div class="icon">
        <i class="fa-solid fa-magnifying-glass"></i>
      </div>
    </div>

    <div class="commission">
      <h4>Commission Rate :</h4>
      <h2>5%</h2>
      <button class="chg_com">Change</button>
    </div>-->

    <!--table-->
    <table class="content-table">
        <thead>
          <tr>
            <th>Sales Rep ID</th>
            <th>Name</th>
            <th>Successful Orders<br>(Rs.)</th>
            <th>Commission<br>(Rs.)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>12</td>
            <td>Sanduni Perera</td>
            <td>15,000.00</td>
            <td>750.00</td>
          </tr>
          <tr>
            <td>8</td>
            <td>Vihanga Anushka</td>
            <td>13,000.00</td>
            <td>650.00</td>
          </tr>
          <tr>
            <td>4</td>
            <td>Malka Nayomi</td>
            <td>19,000.00</td>
            <td>950.00</td>
          </tr>
          <tr>
            <td>6</td>
            <td>Chathu De Silva</td>
            <td>6,800.00</td>
            <td>340.00</td>
          </tr>
          <tr>
            <td>14</td>
            <td>Anil Kumara</td>
            <td>27,860.00</td>
            <td>1,393.00</td>
          </tr>
        </tbody>
      </table>
      <div class="navigation-table">
        <i class="fa-solid fa-circle-chevron-left fa-lg"></i>
        <i class="fa-solid fa-circle-chevron-right fa-lg"></i>
      </div>
      <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
</body>
</html>