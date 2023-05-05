<?php
    require __DIR__.'/../../Model/utils.php';
    require_once("../../Model/courier/ordersCRUD.php");
    $agentData = courier_check_login();
    $result = getOrderDetails($agentData['agentUsername']);
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
    <!--Stylesheet for order cards-->
    <link rel="stylesheet" href="../../View/styles/cards.css">
    <!--Stylesheet for buttons on order cards-->
    <link rel="stylesheet" href="../../View/styles/buttons.css">
    <link rel="stylesheet" href="../../View/styles/graphs.css">
    <link rel="stylesheet" href="../../View/styles/filter-buttons.css">
    <!--Stylesheet for popup form-->
    <link rel="stylesheet" href="../../View/styles/popupForm.css">
    <!--Stylesheet for quick actoins buttons-->
    <link rel="stylesheet" href="../../View/styles/quickActions.css">


    <style>
        .wrapper{
        position: absolute;
        display: flex;
        width: 70%;
        top: 16%;
        margin-left:22%;
    }
    .side-bar-icons{
      margin-top: 45%;
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
          <li class="active"><a href="ordersUi.php"><i class="fa-solid fa-file-circle-check"></i>Orders</a></li>
          <li><a href="paymentsUi.php"><i class="fa-solid fa-user-group"></i>Payments</a></li>
          <li><a href="requests.php"><i class="fa-solid fa-circle-exclamation"></i>Requests</a></li>
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

    <!--Top right corner buttons-->
    <div class="btn_three">
        <button id="addNote">Add Note</button>
    </div>

  <!-- <div class="wrapper">
            <div class="dropdown">
                <button onclick="myFunction(this)" class="dropbtn"><span class="button__text">2022</span> 
                    <span class="button__icon" onclick="myFunction(this)"> -->
                        <!--<ion-icon name="arrow-down-circle-outline"></ion-icon>-->
                        <!-- <i style="color: #2c0dda;" class="fa-solid fa-chevron-down fa-lg"></i>
                    </span>
                </button>
                 <div style="min-width: 140px;" id="myDropdown1" class="dropdown-content">
                    <a href="#">2021</a>
                    <a href="#">2019</a>
                    <a href="#">2018</a>
                 </div>
             </div> 
            <div class="dropdown">
                <button onclick="myFunction(this)" class="dropbtn"><span class="button__text">January</span>
                    <span class="button__icon" onclick="myFunction(this)"> -->
                        <!--<ion-icon name="arrow-down-circle-outline"></ion-icon>-->
                        <!-- <i style="color: #2c0dda;" class="fa-solid fa-chevron-down fa-lg"></i>
                    </span>
                </button>
                 <div id="myDropdown2" class="dropdown-content">
                    <a href="#">February</a>
                    <a href="#">March</a>
                    <a href="#">April</a>
                 </div>
             </div> 
    </div> -->
  <!--Orders Cards-->
  <?php 
    //  $query = "SELECT * FROM orders INNER JOIN customer ON orders.customerID = customer.customerID;";
    //  $query = "SELECT orders.*, customer.*, slips.rejectedReason, approvalStatus
    //       FROM orders 
    //       INNER JOIN customer ON orders.customerID = customer.customerID 
    //       LEFT JOIN slips ON orders.orderID = slips.orderID";
    //  $result = mysqli_query($con, $query);
    ?>
    
  <?php while ($row = mysqli_fetch_array($result)){?>
    <?php $orderID = $row[0]; ?>
  <div class="cards-middle" id="cards_middle">
    <ul class="middle-cards">
        <li>
            <div class="cards">
                <div class="cmpg">
                    <h2>Order <?php echo $orderID;?></h2>
                    <div class="orderStatus">
                    <?php 
                    if($row['orderStatus'] == 'Pending'){?>
                        <h5 class="pending"><?php echo $row['orderStatus'];?></h5>
                    <?php } 
                    elseif($row['orderStatus'] == 'Dispatched'){?>
                        <h5 class="dispatched"><?php echo $row['orderStatus'];?></h5>
                    <?php }
                    elseif($row['orderStatus'] == 'Delivered'){?>
                        <h5 class="delivered"><?php echo $row['orderStatus'];?></h5>
                    <?php }
                    elseif($row['orderStatus'] == 'Cancel'){?>
                        <h5 class="canceled"><?php echo $row['orderStatus'];?></h5>
                    <?php }
                    else{?>
                        <h5 class="completed"><?php echo $row['orderStatus'];?></h5>
                    <?php } ?>
                    </div>
                </div>
                <div class="dv">
                    <div class="customerName">
                        <?php echo $row['customerName'];?><br>
                        <?php echo $row['deliveryDate'];?>
                    </div>
                    <div class="button view">
                        <table>
                            <tr>
                                <td><i class="fa-solid fa-eye"></i></td>
                                <td><button id="performance" class="view-txt"><?php echo "<a href=\"ordersUiView.php?orderID=$orderID\">View</a>";?></button></td>
                            </tr>
                        </table>
                    </div>
                    <div class="button delivered">
                        <table>
                            <tr>
                                <td><i class="fa-solid fa-clipboard-check"></i></td>
                                <td><button id="performance" class="delivered-txt"><a href="#">Delivered</a></button></td>
                            </tr>
                        </table>
                        </div>
                    <!-- <div class="button delete">
                        <table>
                            <tr>
                                <td><i class="fa-solid fa-clipboard-check"></i></td>
                                <td><button id="addNote" class="delete-txt"><a href="#">Add Note</a></button></td>
                            </tr>
                        </table>
                    </div> -->
                    <?php
                    if($row['paymentMethod'] == 'COD'){?>
                    <div class="button uploadSlip">
                        <table>
                            <tr>
                                <td><i class="fa-solid fa-angles-up"></i></td>
                                <!-- Slip upload functionality -->
                                <?php
                                    $quer = "SELECT * FROM slips WHERE orderID = $orderID;";
                                    $res = mysqli_query($con, $quer);

                                    if (mysqli_num_rows($res) > 0) {
                                        // image already exists, set parameter to "view"
                                        $param = "view Slip";
                                    } else {
                                        // image does not exist, set parameter to "upload"
                                        $param = "upload Slip";
                                    }
                                ?>
                                <td><button id="performance" class="uploadSlip-txt"><a href="uploadSlip.php?orderID=<?php echo $orderID; ?>"><?php echo $param; ?></a></button></td>
                            </tr>
                        </table>
                    </div>
                    <?php }?>  
                </div>
                
                <?php
                    if ($row['approvalStatus'] == "disapproved" && $row['rejectedReason']) {
                        // Show the div if there's a rejectedReason value
                        echo '<div class="reason" onclick="toggleReason(this)">Payment Rejected</div>';
                        echo '<div class="reasonText" style="display: none;">'.$row['rejectedReason'].'</div>';
                    }
                ?>
            </div>
        </li>
    <?php }?>
    </ul>

    <!-- Popup Form - Add note -->
    <div class="popup-container" id="popup_container">
                    <div class="popup-modal">
                        <form method="post" action="ordersUi.php">
                            <label for="orderID">Order ID
                                <input type="number" id="orderID" name="orderID" required="required">
                            </label>
                            <label for="note">Add Note
                                <textarea name="note" id="noteID" required="required"></textarea>
                            </label>
                            
                            <button class="cancel" id="close" type="reset" value="Reset">Cancel</button>
                            <button class="submit" id="save" type="submit" value="Submit" name="submit">Save</button>
                        </form>
                    </div>
                </div>
    
<!-- Popup Form Script -->
<script>
    const addNote = document.getElementById('addNote');
    const close = document.getElementById('close');
    const save = document.getElementById('save');
    const popup_container = document.getElementById('popup_container');

    addNote.addEventListener('click', () => {
        popup_container.classList.add('show');
    });

    close.addEventListener('click', () => {
        popup_container.classList.remove('show');
    });

    save.addEventListener('click', () => {
        popup_container.classList.remove('show');
    });
</script>

<script>
    var myFunction = function(target) {
    target.parentNode.querySelector('.dropdown-content').classList.toggle("show");
    }

    window.onclick = function(event) {
        if (!event.target.matches('.button__text')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }

    // Payment rejected reason
    remove_fields.onclick = function(){
        var select_tags = productList.getElementsByTagName('select');
        if(select_tags.length > 1) {
            productList.removeChild(select_tags[(select_tags.length) - 1]);
            var input_tags = productList.getElementsByTagName('input');
            productList.removeChild(input_tags[(input_tags.length) - 1]);
        }
    }
</script>

<script>
    // Payment rejeted reason
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

<script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
</body>
</html>