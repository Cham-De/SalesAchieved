<?php
    require __DIR__.'/../../Model/utils.php';
    require __DIR__.'/../../Model/notificationCRUD.php';
    require_once("../../Model/salesR/assignOrderCRUD.php");
    $userData = check_login("Sales Representative");
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
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!--stylesheet for icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Stylesheet for nav bar-->
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <!--Stylesheet for quick actions-->
    <link rel="stylesheet" href="../../View/styles/quickActions.css">
    <!-- Stylesheet for notification -->
    <link rel="stylesheet" href="../../View/styles/notification.css">
    <!--Stylesheet for table-->
    <link rel="stylesheet" href="../../View/styles/table.css">
    <!--Stylesheet for assignOrder.php-->
    <link rel="stylesheet" href="../../View/styles/salesR/assignOrder.css">

    <style>
    div.side_bar ul li{
        padding-top: 8%;
        padding-bottom: 4%;
    }

    .side-bar-icons{
      margin-top: 20%;
    }
    
    .search_wrapper{
        display: flex;
        /*border: 1px solid black;*/
        margin-top: 0.5%;
        margin-left: 22%;
        width: 75%;
        /*justify-content: space-between;*/
    }
    #fetchval, #fetchval2{
        width: 15%;
    }
    #fetchval2{
        margin-left: 2%;
    }
    
   .filter2{
        width: 22%;
        margin-left: 2%;
        margin-top: 1%;
    /* margin-left: 4%; */
        background: none;
        /* width: 300px; */
        height: 40px;
        border: 1px solid #2609cc;
        padding: 0px 10px;
        border-radius: 15px;
    }
    .ele{
        width: 100%;
        height: 100%;
        vertical-align: middle;
    }
    .searchB{
        border: none;
        width: 100%;
        height: 100%;
        padding: 5px;
        background: none;
    }
    #search{
        background: none;
        border: none;
    }
    .searchB:focus{
        outline: none;
    }
    </style>
</head>

<body>
    <!--common top nav and side bar content-->
    <div class="nav_bar">
        
  
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
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
    <!---end of side and nav bars-->

    <!-- Table -->
    <table class="content-table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>Assign Order</th>
            </tr>
        </thead>
            <?php
                while($row = mysqli_fetch_array($result)){
            ?>
        <tbody>
            <tr>
                <td><?php echo $row['orderID'];?></td>
                <td><?php echo $row['orderDate'];?></td>
                <td><form method="post">
                    <input type="hidden" name="orderID" value="<?php echo $row['orderID']; ?>">
                    <button class="accept" id="accept" type="submit" value="Accepted" name="assign">Accept</button>
                    </form></td>
            </tr>
        </tbody>
        <?php } ?>
  </table>

<script>
function toggleReason(element) {
  var rejectedReason = element.nextElementSibling;
  if (rejectedReason.style.display === "none") {
    rejectedReason.style.display = "block";
  } else {
    rejectedReason.style.display = "none";
  }
}
</script>

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
        <!-- Script for notifications functionality -->
        <script src="../../View/notification.js"></script>
</body>

</html>