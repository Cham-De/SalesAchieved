<?php
    require __DIR__.'/../../Model/utils.php';
    require_once("../../Model/salesR/ordersUpdateCRUD.php");
    require __DIR__.'/../../Model/notificationCRUD.php';
    $userData = check_login("Sales Representative");
    $username = $userData["username"];
    $role = "Sales Representative";
    $notifData = get_notification_data($role, $userData["username"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SalesAchieved</title>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!--stylesheet for icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--stylesheet for the ordersUiUpdate page-->
    <link rel="stylesheet" href="../../View/styles/salesR/ordersUiUpdate.css">
    <!--Stylesheet for nav bar-->
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <!--Stylesheet for cards-->
    <link rel="stylesheet" href="../../View/styles/orderDetailsCards.css">
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
    .orderStatus{
        margin-left: 2%;
    }
    .cards{
        margin-left: 22%;
    }
    </style>
</head>

<body>
    <form method="post">
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
            <li class="active"><a href="ordersUi.php"><i class="fa-solid fa-file-circle-check"></i>Orders</a></li>
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
    </div>
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
    <!---end of side and nav bars-->

    <!--Card Topic-->
    <?php $row = mysqli_fetch_array($result);
        $orderID = $row['orderID'];?>
    
    <h1 class="orderNo">
        Order No: <?php echo $row['orderID'];?>
    </h1>
    
    <!--Cards with details-->
    <div class="middle">
            <table class="prof-table">
                <tr>
                    <td>
                        <label for="deliveryDate">Delivery Date
                            <input type="date" id="deliveryDate" name="updateDeliveryDate" value=<?php echo '"'.$row['deliveryDate'].'"'; ?>>
                        </label>
                    </td>
                    <td>
                        <div class="orderForm">
                            <label for="orderStatus">Order Status
                                <select id="orderStatus" name="updateOrderStatus" value=<?php echo '"'.$row['orderStatus'].'"'; ?>>
                                    <?php
                                        echo "<option value='Pending' ".(($row["orderStatus"] == "Pending") ? "selected" : "").">Pending</option>";
                                        echo "<option value='Cancel' ".(($row["orderStatus"] == "Cancel") ? "selected" : "").">Cancel</option>";
                                    ?>
                                </select>
                            </label>
                        </div>
                    </td>
                </tr>
                </tr>
                </tr>
            </table>
      </div>

      <!--Buttons-->
      <div class="btn_back">
        <a href="ordersUi.php"><button id="Back_btn">Back</button></a>
      </div>
      <div class="btn_cancel">
        <button id="Cancel_btn">Cancel</button>
      </div>
      <div class="btn_update">
        <button id="Update_btn" name="update">Update</button>
      </div>
</form>

<!-- Script for notifications functionality -->
<script src="../../View/notification.js"></script>

</body>
</html>