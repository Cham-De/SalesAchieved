<?php
    require __DIR__.'/../../Model/utils.php';
    require_once("../../Model/salesR/complaintsCRUD.php");
    require __DIR__.'/../../Model/notificationCRUD.php';
    $userData = check_login("Sales Representative");
    //$username = $userData["username"];
    $role = "Sales Representative";
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
    <!--Stylesheet for the tabel-->
    <link rel="stylesheet" href="../../View/styles/table.css">
    <!-- Stylesheet for the table navigation buttons-->
    <link rel="stylesheet" href="../../View/styles/navButtons.css">
    <!--Stylesheet for quick actoins buttons-->
    <link rel="stylesheet" href="../../View/styles/quickActions.css">
    <!--Stylesheet for popup form-->
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
          <li><a href="landingUi.php"><i class="fa-solid fa-house"></i>Home</a></li>
          <li><a href="ordersUi.php"><i class="fa-solid fa-file-circle-check"></i>Orders</a></li>
          <li><a href="customersUi.php"><i class="fa-solid fa-user-group"></i>Customers</a></li>
          <li><a href="stocksUi.php"><i class="fa-solid fa-warehouse"></i>Stocks</a></li>
          <li><a href="salesUi.php"><i class="fa-solid fa-sack-dollar"></i>Sales</a></li>
          <li class="active"><a href="complaints.php"><i class="fa-solid fa-comment"></i>Complaints</a></li>
      </ul>
      <table class="side-bar-icons">
          <tr>
            <td><i class="fa-regular fa-circle-user"></i></td>
            <td><a href="./profile.php">Profile</a></td>
          </tr>
          <tr>
            <td><i class="fa-solid fa-arrow-right-from-bracket"></i></i></td>
            <td><a href="../home/login-final.php">Log out</a></td>
          </tr>
        </table>
  </div>
  <!--Top right corner buttons-->
  <div class="btn_three">
        <button id="complaint_btn">Add<br>Complaint</button>
    </div>

    <!--Table-->
    <table class="content-table">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Complaint Date</th>
            <th>Product Code</th>
            <th>Customer ID</th>
            <th>Complain</th>
          </tr>
        </thead>
        <?php
            while($rows = mysqli_fetch_assoc($result))
                {
        ?>
            <tbody>
                    <tr>
                        <td><?php echo $rows['orderID'];?></td>
                        <td><?php echo $rows['complaintDate'];?></td>
                        <td><?php echo $rows['productCode'];?></td>
                        <td><?php echo $rows['customerID'];?></td>
                        <td><?php echo $rows['complaint'];?></td>
                    </tr>
            </tbody>
        <?php
                }
        ?>
      </table>
    
    <div class="navigation-table" id="nav_table">
        <i class="fa-solid fa-circle-chevron-left fa-lg"></i>
        <i class="fa-solid fa-circle-chevron-right fa-lg"></i>
    </div>

    <!--Popup Form-->
    <div class="popup-container" id="popup_container">
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
            <button class="cancel" id="close" type="reset" value="Reset">Cancel</button>
            <button class="submit" id="save" type="submit" value="Submit" name="submit">Save</button>
          </form>
        </div>
      </div>

    <script>
        const complaint_btn = document.getElementById('complaint_btn');
        const close = document.getElementById('close');
        const popup_container = document.getElementById('popup_container');

        complaint_btn.addEventListener('click', () => {
            popup_container.classList.add('show');
        });

        close.addEventListener('click', () => {
            popup_container.classList.remove('show');
        });

    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
    <!-- Script for notifications functionality -->
    <script src="../../View/notification.js"></script>
  </body>
</html>