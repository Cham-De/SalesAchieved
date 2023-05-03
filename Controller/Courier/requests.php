<?php
    require __DIR__.'/../../Model/utils.php';
    require_once("../../Model/courier/requestsCRUD.php");
    $agentData = courier_check_login();
    $result = getRequest($agentData['agentUsername']);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Courier-Dashboard</title>
    <link rel="stylesheet"
      href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!--stylesheet for icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Stylesheet for nav bar-->
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <!--Stylesheet for table-->
    <link rel="stylesheet" href="../../View/styles/table.css">
    <!--Stylesheet for requests.php-->
    <link rel="stylesheet" href="../../View/styles/courier/requestsUi.css">

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
              <h4><?php echo $agentData['companyName'];?></h4>
              <small>Courier</small>
          </div>
      </div>
  </div>

  <div class="side_bar">
      <div class="logo">
          <img src="../../View/assets/saleslogo-final.png" width="70%" height="70%">
      </div>
      <ul>
          <li><a href="landingUi.php"><i class="fa-solid fa-house"></i>Home</a></li>
          <li><a href="ordersUi.php"><i class="fa-solid fa-file-circle-check"></i>Orders</a></li>
          <li><a href="paymentsUi.php"><i class="fa-solid fa-user-group"></i>Payments</a></li>
          <li class="active"><a href="requests.php"><i class="fa-solid fa-circle-exclamation"></i>Requests</a></li>
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

<!--Table-->
<table class="content-table">
    <thead>
        <tr>
            <th>Delivery Date</th>
            <th>Address</th>
            <th>Delivery Charges<br/>(Rs.)</th>
            <th>Approval Status</th>
        </tr>
    </thead>
    <?php
        while($row = mysqli_fetch_array($result)){
    ?>
    <tbody>
        <tr>
            <td><?php echo $row['deliveryDate'];?></td>
            <td><?php echo $row['address'];?></td>
            <td><?php echo $row['charges'];?></td>
            <td><form method="post">
                <input type="hidden" name="requestID" value="<?php echo $row['requestID']; ?>">
                <input type="hidden" name="orderID" value="<?php echo $row['orderID']; ?>">
                <button class="accept" id="accept" type="submit" value="Accepted" name="submit">Accept</button>
                <button class="reject" id="reject" type="cancel" value="Rejected" name="cancel">Reject</button>
            </form></td>
        </tr>
    </tbody>
    <?php } ?>
  </table>
    
  
</body>
</html>