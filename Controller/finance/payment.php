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
    <!--Stylesheet for table search bar-->
    <link rel="stylesheet" href="../../View/styles/tableSearch.css">
    <!--Stylesheet for table-->
    <link rel="stylesheet" href="../../View/styles/table.css">
    <!--Stylesheet for table navigation buttons-->
    <link rel="stylesheet" href="../../View/styles/navButtons.css">
    <!--Stylesheet for paymentsUi.css-->
    <link rel="stylesheet" href="../../View/styles/courier/paymentsUi.css">

    <style>
    
    #status{
        border: 1px solid rgb(235, 137, 58);
        padding: 2%;
      }

      div.side_bar ul li{
        padding-top: 8%;
        padding-bottom: 6%;
    }
    .content-table{
      margin-left: 21%;
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
            <li><a href="finance-home.php"><i style="margin-right: 2%;" class="fa-solid fa-house"></i>Home</a></li>
            <li><a href="commissions.php"><i style="margin-right: 2%;" class="fa-solid fa-money-check-dollar"></i>Commissions</a></li>
            <li><a href="products.php"><i style="margin-right: 2%;" class="fa-solid fa-boxes-stacked"></i>Products</a></li>
            <li><a href="sales.php"><i style="margin-right: 2%;" class="fa-solid fa-magnifying-glass-dollar"></i>Sales</a></li>
            <li class="active"><a href="payment.php"><i style="margin-right: 2%;" class="fa-solid fa-hand-holding-dollar"></i>Payments</a></li>
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
  
    <!---end of side and nav bars-->

  <!--Table search bar-->
  <div class="search_container">
    <table class="element_container">
      <tr>
        <td>
          <input type="text" placeholder="Search Table..." class="search">
        </td>
        <td>
          <a><i class="fa-solid fa-magnifying-glass"></i></a>
        </td>
      </tr>
    </table>
    </div>
<script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>

<!--Table-->
<table class="content-table">
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Payment<br>(Rs.)</th>
            <th>Date</th>
            <th>View Slip</th>
            <th>Approval Status</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>2</td>
            <td>1,250.00</td>
            <td>23/11/2022</td>
            <td><button id="v_slip" class="viewSlip_btn">View Slip</button></td>
            <td>
                <select id="status" name="stat">
                    <option value="approve">Approved</option>
                    <option value="napprove">Not Approved</option>
                </select>   
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>1,250.00</td>
            <td>23/11/2022</td>
            <td><button class="viewSlip_btn">View Slip</button></td>
            <td>
                <select id="status" name="stat">
                    <option value="approve">Approved</option>
                    <option value="napprove">Not Approved</option>
                </select>   
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>1,250.00</td>
            <td>23/11/2022</td>
            <td><button class="viewSlip_btn">View Slip</button></td>
            <td>
                <select id="status" name="stat">
                    <option value="approve">Approved</option>
                    <option value="napprove">Not Approved</option>
                </select>   
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>1,250.00</td>
            <td>23/11/2022</td>
            <td><button class="viewSlip_btn">View Slip</button></td>
            <td>
                <select id="status" name="stat">
                    <option value="approve">Approved</option>
                    <option value="napprove">Not Approved</option>
                </select>   
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>1,250.00</td>
            <td>23/11/2022</td>
            <td><button class="viewSlip_btn">View Slip</button></td>
            <td>
                <select id="status" name="stat">
                    <option value="approve">Approved</option>
                    <option value="napprove">Not Approved</option>
                </select>   
            </td>
        </tr>
    </tbody>
  </table>

  <!--Table navigation-->
  <div class="navigation-table" id="nav_table">
    <i class="fa-solid fa-circle-chevron-left fa-lg"></i>
    <i class="fa-solid fa-circle-chevron-right fa-lg"></i>
</div>
    


<script>
    const v_slip = document.getElementById('v_slip');

    v_slip.addEventListener('click', () => {
      location.href = "./view-slip.php";
    });


</script>

<script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
  </body>
</html>