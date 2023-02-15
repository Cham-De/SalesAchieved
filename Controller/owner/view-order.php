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
    <link rel="stylesheet" href="../../View/styles/owner/owner-view-order-inner-page.css">
    
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

    .view-card h1{
        margin-top: 30%;
        text-align: center;
    }
    .view-cards-wrapper{
        border: none;
    }
    .view-card{
        width: 28%;
        margin-bottom: 5%;
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
            <li class="active"><a href="owner-payments.php"><i style="margin-right: 2%;" class="fa-solid fa-money-check-dollar"></i>Payments</a></li>
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

          <div class="middle-2">
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
    
          <button id="back_btn">Back</button>
    
    
          <script>
    const back_btn = document.getElementById('back_btn');

    back_btn.addEventListener('click', () => {
      location.href = "./owner-payments.php";
    });

</script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
</body>
</html>