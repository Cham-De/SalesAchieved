<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Store Manager-Dashboard</title>
    <link rel="stylesheet"
      href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!--stylesheet for icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Stylesheet for nav bar-->
    <link rel="stylesheet" href="../styles/navBar.css">
    <!--Stylesheet for KPI Cards-->
    <link rel="stylesheet" href="../styles/kpiCards.css">
    <!--Stylesheet for quick actions buttons-->
    <link rel="stylesheet" href="../styles/quickActions.css">
    <!--Stylesheet for graphs-->
    <link rel="stylesheet" href="../styles/graphs.css">
    <!--Stylesheet for popup form-->
    <link rel="stylesheet" href="../styles/popupForm.css">
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
              <small>Store Manager</small>
          </div>
      </div>
  </div>

  <div class="side_bar">
      <div class="logo">
          <img src="../assets/logosales.jpeg" width="65%" height="55%">
      </div>
      <ul>
          <li class="active"><a href="landingUi.php"><i class="fa-solid fa-house"></i>Home</a></li>
          <li><a href="stocksUi.php"><i class="fa-solid fa-warehouse"></i>Stocks</a></li>
          <li><a href="ordersUi.php"><i class="fa-solid fa-file-circle-check"></i>Orders</a></li>
          <li><a href="agentsUi.php"><i class="fa-solid fa-user-group"></i>Agents</a></li>
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
    <!--KPI cards-->
    <main>
      <div class="last_card1">
        <div class="KPIs">
          <div class="card1">
            <h2>Customer <br>Orders </h2>
            <h4>Monthly</h4>
            <h1>24</h1>
          </div>
          <div class="card2">
            <h2>Incomplete <br>Orders </h2>
            <h4>Monthly</h4>
            <h1>11</h1>
          </div>
          <div class="card3">
            <h2>Outstanding Payments</h2>
            <h4>Monthly</h4>
            <h1>Rs. 43,500</h1>
          </div>
          <div class="card4">
            <h2>On-time <br>Delivery Rate </h2>
            <h4>Monthly</h4>
            <h1>86.07%</h1>
          </div>
          <div class="card5">
            <h2>Retention <br>Rate </h2>
            <h4>Monthly</h4>
            <h1>Rs.120,000</h1>
          </div>
        </div>

        <!--Quick actions buttons-->
        <div class="btn_three">
          <button id="product_btn">Add<br>Product</button>
        </div>

        <!--graphs-->
        <div class="graphs">
          <div class="gr1">
            <h2>Successful Order Vs. Returned Orders</h2>
            <img src="../assets/graph1.png" alt="monthly sales">
          </div>
          <div class="gr2">
            <h2>Outstanding Payments</h2>
            <img src="../assets/graph2.jpg" width="90%" height="80%"
              alt="monthly sales">
          </div>
        </div>
      </div>
    </main>

    <!--Popup Form-->
    <div class="popup-container" id="popup_container">
        <div class="popup-modal">
          <form method="post" action="landingUi.php">
            <label for="productName">Product Name
                <input type="string" id="productName" name="productName" required="required">
            </label>
            <label for="productCategory">Product Category
                <input type="string" id="productCategory" name="productCategory" required="required">
            </label>
            <label for="productCode">Product Code
                <input type="string" id="productCode" name="productCode" required="required">
            </label>
            <label for="buyingPrice">Buying Price(Rs.)
                <input type="number" id="buyingPrice" name="buyingPrice" required="required">
            </label>
            <label for="sellingPrice">Selling Price(Rs.)
                <input type="number" id="sellingPrice" name="sellingPrice" required="required">
            </label>
            <label for="quantity">Quantity
                <input type="number" id="quantity" name="quantity" required="required">
            </label>
            <button class="cancel" id="close" type="reset" value="Reset">Cancel</button>
            <button class="submit" id="save" type="submit" value="Submit" name="submit">Save</button>
          </form>
        </div>
      </div>

      <script>
        const product_btn = document.getElementById('product_btn');
        const close = document.getElementById('close');
        const save = document.getElementById('save');
        const popup_container = document.getElementById('popup_container');

        product_btn.addEventListener('click', () => {
            popup_container.classList.add('show');
        });

        close.addEventListener('click', () => {
            popup_container.classList.remove('show');
        });

        save.addEventListener('click', () => {
            popup_container.classList.remove('show');
        });

    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
  </body>
</html>