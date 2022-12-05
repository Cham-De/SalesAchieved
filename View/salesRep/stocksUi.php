<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Sales Rep-Dashboard</title>
    <link rel="stylesheet"
      href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!--stylesheet for icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Stylesheet for nav bar-->
    <link rel="stylesheet" href="../styles/navBar.css">
    <!--Stylesheet for table search bar-->
    <link rel="stylesheet" href="../styles/tableSearch.css">
    <!--Stylesheet for tables-->
    <link rel="stylesheet" href="../styles/table.css">
    <!--Stylesheet for table navigation buttons-->
    <link rel="stylesheet" href="../styles/navButtons.css">
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
              <small>Sales Representative</small>
          </div>
      </div>
  </div>

  <div class="side_bar">
      <div class="logo">
          <img src="../assets/logosales.png" width="80%" height="80%">
      </div>
      <ul>
          <li><a href="landingUi.php"><i class="fa-solid fa-house"></i>Home</a></li>
          <li><a href="ordersUi.php"><i class="fa-solid fa-file-circle-check"></i>Orders</a></li>
          <li><a href="customersUi.php"><i class="fa-solid fa-user-group"></i>Customers</a></li>
          <li class="active"><a href="stocksUi.php"><i class="fa-solid fa-warehouse"></i>Stocks</a></li>
          <li><a href="salesUi.php"><i class="fa-solid fa-sack-dollar"></i>Sales</a></li>
          <li><a href="complaints.php"><i class="fa-solid fa-comment"></i>Complaints</a></li>
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
                <th>Category</th>
                <th>Product Code</th>
                <th>Product</th>
                <th>Selling Price<br>(Rs.)</th>
                <th>Available Quantity</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Cat 1</td>
                <td>PR001</td>
                <td>Product 1</td>
                <td>2,750.00</td>
                <td>24</td>
            </tr>
            <tr>
                <td>Cat 1</td>
                <td>PR001</td>
                <td>Product 1</td>
                <td>2,750.00</td>
                <td>24</td>
            </tr>
            <tr>
                <td>Cat 1</td>
                <td>PR001</td>
                <td>Product 1</td>
                <td>2,750.00</td>
                <td>24</td>
            </tr>
            <tr>
                <td>Cat 1</td>
                <td>PR001</td>
                <td>Product 1</td>
                <td>2,750.00</td>
                <td>24</td>
            </tr>
            <tr>
                <td>Cat 1</td>
                <td>PR001</td>
                <td>Product 1</td>
                <td>2,750.00</td>
                <td>24</td>
            </tr>
        </tbody>
      </table>

      <!--Table navigation-->
      <div class="navigation-table" id="nav_table">
        <i class="fa-solid fa-circle-chevron-left fa-lg"></i>
        <i class="fa-solid fa-circle-chevron-right fa-lg"></i>
    </div>
  </body>
</html>