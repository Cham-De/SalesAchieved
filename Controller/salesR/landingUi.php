<?php 
  require __DIR__.'/../../Model/utils.php';
  require __DIR__.'/../../Model/notificationCRUD.php';
  require_once("../../Model/salesR/landingUiCRUD.php");
  $role = "Sales Representative";
  $userData = check_login($role);
  $notifData = get_notification_data($role, $userData["username"]);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>SalesAchieved</title>
    <link rel="stylesheet"
      href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!--stylesheet for icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Stylesheet for nav bar-->
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <!--Stylesheet for KPI Cards-->
    <link rel="stylesheet" href="../../View/styles/kpiCards.css">
    <!--Stylesheet for quick actions buttons-->
    <link rel="stylesheet" href="../../View/styles/quickActions.css">
    <!--Stylesheet for graphs-->
    <link rel="stylesheet" href="../../View/styles/graphs.css">
    <!--Stylesheet for popup forms-->
    <link rel="stylesheet" href="../../View/styles/popupForm.css">
    <!-- Stylesheet for notification -->
    <link rel="stylesheet" href="../../View/styles/notification.css">

    <style>
      div.side_bar ul li{
        padding-top: 8%;
        padding-bottom: 4%;
    }

    .side-bar-icons{
      margin-top: 20%;
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

        <a href="calendar.php"><i class="fa-solid fa-calendar-days"></i></a>

        <!-- Notifications -->
        <div class="icon" onclick="toggleNotifi()">
          <i class="fa-solid fa-bell"></i><span><?php echo mysqli_num_rows($notifData) ?></span>
        </div>
        <div class="notifi-box" id="box">
          <h2>Notifications <span><?php echo mysqli_num_rows($notifData) ?></span></h2>
          <?php 
          while ($row = mysqli_fetch_array($notifData)){
            $title = $row['title'];
            $message = $row['message'];
            $notificationID = $row['notificationID'];
            echo  "
            <div class='notifi-item' style='display:none;'>
            <i class='fa-solid fa-circle-info' style='font-size:2em;padding-left: 10px;'></i>
              <div class='text'>
                <h4>$title</h4>
                <p>$message</p>
                
              </div>
              <div style='margin-right: 0;margin-left: auto; display:block;'>
              <form method='post'>
              <input type='hidden' name='notificationID' value='$notificationID'>
              <button id='remove' type='submit' value='remove' name='remove' style='border: none;padding: 0px;background-color: white;'>
                <i class='fa-regular fa-circle-xmark' style='cursor: pointer;'></i>
              </button>
              </form>
              </div>
            </div>";
          }
          ?>
        </div>
          <img src="../../View/assets/man.png" width="50px" height="50px" alt="user image">
        <div>
              <h4><?php echo $userData['name'];?></h4>
              <small><?php echo $userData['user_role'];?></small>
          </div>
      </div>
  </div>

  <div class="side_bar">
      <div class="logo">
          <img src="../../View/assets/saleslogo-final.png" width= "70%" height="70%">
      </div>
      <ul>
          <li class="active"><a href="landingUi.php"><i class="fa-solid fa-house"></i>Home</a></li>
          <li><a href="ordersUi.php"><i class="fa-solid fa-file-circle-check"></i>Orders</a></li>
          <li><a href="customersUi.php"><i class="fa-solid fa-user-group"></i>Customers</a></li>
          <li><a href="stocksUi.php"><i class="fa-solid fa-warehouse"></i>Stocks</a></li>
          <li><a href="salesUi.php"><i class="fa-solid fa-sack-dollar"></i>Sales</a></li>
          <li><a href="complaints.php"><i class="fa-solid fa-comment"></i>Complaints</a></li>
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
  <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
    <!---end of side and nav bars-->
    <!--KPI cards-->
    <main>
      <div class="last_card1">
        <div class="KPIs">
          <div class="card1">
          <?php
            $salesPerRep = getSalesPerRep($userData['username']);
          ?>
            <h2>Sales per <br>Representative </h2>
            <h4>Monthly</h4>
            <h1>Rs. <?php echo $salesPerRep;?></h1>
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
        <div class="btn_three">
          <button id="feedback_btn">Add<br>Feedback</button>
        </div>

        <!--graphs-->
        <div class="graphs">
          <div class="gr1">
            <h2>Sales Revenue Generated per Month</h2>
            <img src="../../View/assets/graph1.png" alt="monthly sales">
          </div>
          <div class="gr2">
            <h2>Complete Vs. Incomplete Orders</h2>
            <img src="../../View/assets/graph2.jpg" width="90%" height="80%"
              alt="monthly sales">
          </div>
        </div>
      </div>
    </main>

    <!--Popup Form - Feedback-->
    <div class="popup-container" id="popup_container_feedback">
      <div class="popup-modal">
        <form method="post" action="landingUi.php">
          <label for="orderID">Order ID
              <input type="number" id="orderID" name="orderID" required="required">
          </label>
          <label for="feedback">Feedback
            <!-- <input type=“radio” name=“feedback”>1<BR>
            <input type=“radio” name=“feedback”>2<BR>
            <input type=“radio” name=“feedback”>3<BR>
            <input type=“radio” name=“feedback”>4<BR>
            <input type=“radio” name=“feedback”>5<BR> -->
            <input type="number" id="feedbackNo" name="feedback" required="required">
          </label>
          <button class="cancel" id="close_feedback" type="reset" value="Reset">Cancel</button>
          <button class="submit" id="save_feedback" type="submit" value="Submit" name="submit">Save</button>
        </form>
      </div>
    </div>

    <script>
        const feedback_btn = document.getElementById('feedback_btn');
        const close_feedback = document.getElementById('close_feedback');
        const save_feedback = document.getElementById('save_feedback');
        const popup_container_feedback = document.getElementById('popup_container_feedback');

        feedback_btn.addEventListener('click', () => {
          popup_container_feedback.classList.add('show');
        });

        close_feedback.addEventListener('click', () => {
            popup_container_feedback.classList.remove('show');
        });

        save_feedback.addEventListener('click', () => {
            popup_container_feedback.classList.remove('show');
        });
    </script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
    <!-- Script for notifications functionality -->
    <script src="../../View/notification.js"></script>
  </body>
</html>