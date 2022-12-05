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
    <!--Stylesheet for KPI Cards-->
    <link rel="stylesheet" href="../styles/kpiCards.css">
    <!--Stylesheet for quick actions buttons-->
    <link rel="stylesheet" href="../styles/quickActions.css">
    <!--Stylesheet for graphs-->
    <link rel="stylesheet" href="../styles/graphs.css">
    <!--Stylesheet for graphs-->
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
              <small>Sales Representative</small>
          </div>
      </div>
  </div>

  <div class="side_bar">
      <div class="logo">
          <img src="../assets/logosales.png" width="80%" height="80%">
      </div>
      <ul>
          <li class="active"><a href="landingUi.php"><i class="fa-solid fa-house"></i>Home</a></li>
          <li><a href="ordersUi.php"><i class="fa-solid fa-file-circle-check"></i>Orders</a></li>
          <li><a href="customersUi.php"><i class="fa-solid fa-user-group"></i>Customers</a></li>
          <li><a href="stocksUi.php"><i class="fa-solid fa-warehouse"></i>Stocks</a></li>
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
    <!--KPI cards-->
    <main>
      <div class="last_card1">
        <div class="KPIs">
          <div class="card1">
            <h2>Retention <br>Rate </h2>
            <h4>Monthly</h4>
            <h1>Rs.120,000</h1>
          </div>
          <div class="card2">
            <h2>New Customer <br>Development </h2>
            <h4>Monthly</h4>
            <h1>48.09%</h1>
          </div>
          <div class="card3">
            <h2>Postive Feedback Rate</h2>
            <h4>Monthly</h4>
            <h1>96.07%</h1>
          </div>
          <div class="card4">
            <h2>Sales <br>Commissions </h2>
            <h4>Monthly</h4>
            <h1>Rs. 25,560</h1>
          </div>
          <div class="card5">
            <h2>Retention <br>Rate </h2>
            <h4>Monthly</h4>
            <h1>Rs.120,000</h1>
          </div>
        </div>

        <!--Quick actions buttons-->
        <div class="btn_one">
          <button id="order_btn">Add Order</button>
        </div>
        <div class="btn_two">
          <button id="feedback_btn">Add<br>Feedback</button>
        </div>
        <div class="btn_three">
          <button id="complaint_btn">Add<br>Complain</button>
        </div>

        <!--graphs-->
        <div class="graphs">
          <div class="gr1">
            <h2>Sales Revenue Generated per Month</h2>
            <img src="../assets/graph1.png" alt="monthly sales">
          </div>
          <div class="gr2">
            <h2>Complete Vs. Incomplete Orders</h2>
            <img src="../assets/graph2.jpg" width="90%" height="80%"
              alt="monthly sales">
          </div>
        </div>
      </div>
    </main>

    <!--Popup Form - Complaints-->
    <div class="popup-container" id="popup_container_complaints">
        <div class="popup-modal">
          <form method="post" action="complaints.php">
            <label for="orderID">Order ID
                <input type="number" id="orderID" name="orderID" required="required">
            </label>
            <label for="productCode">Product Code
                <input type="string" id="productCode" name="productCode" required="required">
            </label>
            <label for="complaint">Complaint
                <textarea name="complaint" id="complaint" required="required"></textarea>
            </label>
            <button class="cancel" id="close_complaints" type="reset" value="Reset">Cancel</button>
            <button class="submit" id="save_complaints" type="submit" value="Submit" name="submit">Save</button>
          </form>
        </div>
      </div>

    <!--Popup Form - Feedback-->
    <div class="popup-container" id="popup_container_feedback">
      <div class="popup-modal">
        <form method="post" action="feedback.php">
          <label for="orderID">Order ID
              <input type="number" id="orderID" name="orderID" required="required">
          </label>
          <label for="feedback">Feedback
            <!-- <input type=“radio” name=“feedback”>1<BR>
            <input type=“radio” name=“feedback”>2<BR>
            <input type=“radio” name=“feedback”>3<BR>
            <input type=“radio” name=“feedback”>4<BR>
            <input type=“radio” name=“feedback”>5<BR> -->
            <input type="number" id="feedbackNo" name="feedbackNo" required="required">
          </label>
          <button class="cancel" id="close_feedback" type="reset" value="Reset">Cancel</button>
          <button class="submit" id="save_feedback" type="submit" value="Submit" name="submit">Save</button>
        </form>
      </div>
    </div>

    <!--Popup Form - Orders-->
    <!-- <div class="popup-container" id="popup_container_order">
      <div class="popup-modal">
        <form method="post" action="feedback.php">
          <p>Sorry Asela Ayyeee.... :(<br> Meka hadanna amathaka unaaaaa...:p</p>
          <button class="cancel" id="close_feedback" type="reset" value="Reset">Cancel</button>
          <button class="submit" id="save_feedback" type="submit" value="Submit" name="submit">Save</button>
        </form>
      </div>
    </div> -->

    <script>
        const complaint_btn = document.getElementById('complaint_btn');
        const feedback_btn = document.getElementById('feedback_btn');
        // const order_btn = document.getElementById('order_btn');

        const close_complaints = document.getElementById('close_complaints');
        const save_complaints = document.getElementById('save_complaints');
        const close_feedback = document.getElementById('close_feedback');
        const save_feedback = document.getElementById('save_feedback');
        // const close_order = document.getElementById('close_order');
        // const save_order = document.getElementById('save_order');

        const popup_container_complaints = document.getElementById('popup_container_complaints');
        const popup_container_feedback = document.getElementById('popup_container_feedback');
        // const popup_container_order = document.getElementById('popup_container_order');

        complaint_btn.addEventListener('click', () => {
          popup_container_complaints.classList.add('show');
        });

        feedback_btn.addEventListener('click', () => {
          popup_container_feedback.classList.add('show');
        });

        // order_btn.addEventListener('click', () => {
        //   popup_container_order.classList.add('show');
        // });

        close_complaints.addEventListener('click', () => {
            popup_container_complaints.classList.remove('show');
        });

        close_feedback.addEventListener('click', () => {
            popup_container_feedback.classList.remove('show');
        });

        // close_order.addEventListener('click', () => {
        //     popup_container_order.classList.remove('show');
        // });

        save_complaints.addEventListener('click', () => {
            popup_container_complaints.classList.remove('show');
        });

        save_feedback.addEventListener('click', () => {
            popup_container_feedback.classList.remove('show');
        });

        // save_order.addEventListener('click', () => {
        //     popup_container_order.classList.remove('show');
        // });
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
  </body>
</html>