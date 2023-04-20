<?php
session_start();
require '../../Model/db-con.php';

?>

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
    <!--Stylesheet for order details cards-->
    <link rel="stylesheet" href="../../View/styles/orderDetailsCards.css">
    <!--Stylesheet for buttons-->
    <link rel="stylesheet" href="../../View/styles/courier/viewSlip.css">

    <style>
    
    div.side_bar ul li{
        padding-top: 8%;
        padding-bottom: 6%;
    }
    .btn_back{
      margin-top: 2%;
      display: flex;
      /* border: 1px solid black; */
    }
    .approval{
      margin-left: 20%;
    }
    /* .approval form{
      display: flex;
    }
    .approval form input{
      margin-left: 10px;
    }
    .approval form label{
      margin-top: 4%;
    } */
    #submit{
      background: rgb(235, 137, 58);
  border: none;
  cursor: pointer;
  color: white;
  padding: 4%;
  border-radius: 10px;
      margin-left: 30px;
    }
    #Back_btn{
      padding: 10px;
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
            <li class="active"><a href="index.php"><i style="margin-right: 2%;" class="fa-solid fa-house"></i>Home</a></li>
            <li><a href="commissions.php"><i style="margin-right: 2%;" class="fa-solid fa-money-check-dollar"></i>Commissions</a></li>
            <li><a href="products.php"><i style="margin-right: 2%;" class="fa-solid fa-boxes-stacked"></i>Products</a></li>
            <li><a href="sales.php"><i style="margin-right: 2%;" class="fa-solid fa-magnifying-glass-dollar"></i>Sales</a></li>
            <li><a href="payment.php"><i style="margin-right: 2%;" class="fa-solid fa-hand-holding-dollar"></i>Payments</a></li>
            <li><a href="reports.php"><i style="margin-right: 2%;" class="fa-solid fa-file-contract"></i>Reports</a></li>
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

      <div class="middle">
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
              <?php

      $id = $_GET['orderID'];

      $sql = "SELECT p.productCode, p.productName, p.sellingPrice, o.orderQuantity, (p.sellingPrice * o.orderQuantity) as totalPrice
      FROM orders o
      JOIN product p ON o.productCode = p.productCode
      WHERE o.orderID = $id;
      ";

      $query = mysqli_query($con, $sql);

      if(mysqli_num_rows($query) > 0 ){
        foreach($query as $thing){
          ?>
              <tr>
                    <td scope="row"><?=$thing['productCode']; ?></td>
                    <td><?=$thing['productName']; ?></td>
                    <td><?=$thing['sellingPrice']; ?></td>
                    <td> <?=$thing['orderQuantity']; ?></td>
                    <td> <?=$thing['totalPrice']; ?></td>
              </tr>
          <?php
        }
      }
      else{
        echo "<h4>No records</h4>";
    }

    
    ?>
              </tbody>
        </table>
      </div>



      <?php 
          $id = $_GET['orderID'];

          $sql = "SELECT * FROM slips WHERE orderID=$id";
          $res = mysqli_query($con,  $sql);

          if (mysqli_num_rows($res) > 0) {
          	while ($images = mysqli_fetch_assoc($res)) {  ?>
             
             <div class="slip">
             	<img src="../../uploads/<?=$images['slipUrl']?>">
             </div>
          		
    <?php } }?>

     
      
      <!--Buttons-->
      <div class="btn_back">
        <!-- <button id="Back_btn" onclick="window.history.back()">Back</button> -->
        <button id="Back_btn"><a href="payment.php">Back</a></button>

        <!-- <div class="approval">
        <label><input type="checkbox" id="myCheckbox_A" onclick="updatePaymentStatus()"> Approved</label>
        <label><input type="checkbox" id="myCheckbox_NA" onclick="updatePaymentStatus()"> Not Approved</label>
        </div> -->

        <div class="approval">
        <form method="POST" action="../../Model/finance/updatePaymentStatus.php">
  <input type="radio" id="approved" name="status" value="approved" <?php 
  $sql = "SELECT * FROM slips WHERE orderID = $id";
  $res = mysqli_query($con, $sql);

  if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $paymentStatus = $row['paymentStatus'];
    $status = '';

    if ($paymentStatus === 'approved') {
      $status = 'approved';
    } else if ($paymentStatus === 'disapproved') {
      $status = 'disapproved';
    }
  
  if ($status === "approved") { echo "checked"; } }?>>
  <label for="approved">Approved</label><br>
  <input type="radio" id="disapproved" name="status" value="disapproved" <?php if ($status === "disapproved") { echo "checked"; } ?>>
  <label for="disapproved">Disapproved</label><br>

  <textarea id="reason" name="reason" style="display: none;"></textarea>
  <input id="submit" type="submit" value="Submit">
  <input type="hidden" name="image_id" value="<?php echo $id; ?>">
</form>

        </div>
        
      </div>
      
      <script>
  const disapprovedRadio = document.getElementById('disapproved');
  const reasonTextarea = document.getElementById('reason');
  
  disapprovedRadio.addEventListener('click', () => {
    reasonTextarea.style.display = 'block';
  });
</script>
      <!-- <script>
          const checkboxA = document.querySelector('#myCheckbox_A');
          const checkboxNA = document.querySelector('#myCheckbox_NA');

          const storedStateApproved = localStorage.getItem('myCheckboxStateApproved');
          const storedStateNApproved = localStorage.getItem('myCheckboxStateNotApproved');
  
          if (storedStateApproved === 'checked') {
              checkboxA.checked = true;
          }
          
          if (storedStateNApproved === 'checked') {
              checkboxNA.checked = true;
          }


          function updatePaymentStatus() {
            console.log('Updating payment status');
  let paymentStatus;
  if (checkboxA.checked) {
    paymentStatus = 'Approved';
  } else if (checkboxNA.checked) {
    paymentStatus = 'Not approved';
  } else {
    return; // Neither checkbox is checked, do nothing
  }

  const orderID = getOrderID(); // Get order ID from URL

  // Send AJAX request to update the paymentStatus in the database
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
      console.log('Payment status updated in database');
    }
  };
  xhr.open('POST', 'testUpdate.php');
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.send(`orderID=${orderID}&paymentStatus=${paymentStatus}`);
  alert(paymentStatus);
  console.log('AJAX request sent');
}

          checkboxA.addEventListener('click', () => {
            localStorage.setItem('myCheckboxStateApproved', checkboxA.checked ? 'checked' : 'unchecked');
          });

          checkboxNA.addEventListener('click', () => {
            localStorage.setItem('myCheckboxStateNotApproved', checkboxNA.checked ? 'checked' : 'unchecked');
          });

          function getOrderID() {
              const urlParams = new URLSearchParams(window.location.search);
              return urlParams.get('orderID');
          }
      </script> -->
      
  </body>
</html>