<?php
    require __DIR__.'/../../Model/utils.php';
    
    $userData = check_login("Owner");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Payments</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <link rel="stylesheet" href="../../View/styles/popup-btn-table.css">
    <link rel="stylesheet" href="../../View/styles/filter-buttons.css">
     <!--Stylesheet for orders cards-->
    <link rel="stylesheet" href="../../View/styles/cards.css">
    <!--Stylesheet for buttons on orders cards-->
    <link rel="stylesheet" href="../../View/styles/buttons.css">
     <!--Stylesheet for orders cards-->
    <link rel="stylesheet" href="../../View/styles/cards.css">
    <!--Stylesheet for buttons on orders cards-->
    <link rel="stylesheet" href="../../View/styles/buttons.css">
    <link rel="stylesheet" href="../../View/styles/cards-test.css">
    <link rel="stylesheet" href="../../View/styles/card-btns.css">
    <!--<link rel="stylesheet" href="../cards-final.css">-->

    <style>
      div.side_bar ul li{
        text-align: left;
        padding-left: 30%;
        padding-top: 8%;
        padding-bottom: 9%;
    }

    .wrapper{
        position: absolute;
        display: flex;
        width: 70%;
        top: 16%;
        margin-left:25%;
        margin-bottom: 5%;
    }

    .search-wrap-container{
        display: flex;
        justify-content: space-between;
      }

      .search_container{
        margin-left: 70%;
        margin-top: 1%;
      }

      .navigation-table{
        margin-top: 8%;
        margin-left: 55%;
        position: absolute;
      }

      .card-status{
        margin-top: 0.5%;
        margin-left: 3%;
      }

      .cmpg{
        display: flex;
      }

      
    </style>
</head>
<body>
<div class="nav_bar">
        <div class="search-container">
            <table class="element-container">
              <tr>
                <td>
                  <input type="text" placeholder="Search..." class="search">
                </td>
                <td>
                  <a><i style="color:rgb(235, 137, 58)" class="fa-solid fa-magnifying-glass"></i></a>
                </td>
              </tr>
            </table>
        </div>
        <div class="user-wrapper">
            <img src="../../View/assets/man.png" width="50px" height="50px" alt="user image">
            <div>
                <h4>John Doe</h4>
                <small style="color:rgb(235, 137, 58)">Owner</small>
            </div>
        </div>
    </div>

    <div class="side_bar">
        <div class="logo">
            <img src="../../View/assets/saleslogo-final.png" width= "70%" height="70%">
        </div>
        <ul class="icon-list">
            <li><a href="owner-landing.php"><i style="margin-right: 2%;" class="fa-solid fa-house"></i>Home</a></li>
            <li><a href="owner-orders.php"><i style="margin-right: 2%;" class="fa-solid fa-cart-arrow-down"></i>Orders</a></li>
            <li class="active"><a href="owner-payments.php"><i style="margin-right: 2%;" class="fa-solid fa-money-check-dollar"></i>Payments</a></li>
            <li><a href="owner-stat.php"><i style="margin-right: 2%;" class="fa-solid fa-chart-line"></i>Statistics</a></li>
            <li><a href="returned-goods.php"><i style="margin-right: 2%;" class="fa-solid fa-box-open"></i>Returned Goods</a></li>
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
        
      
    <div class="search-wrap-container">
        <div class="search_container">
          <table class="element_container">
            <tr>
              <td>
                <input type="text" placeholder="Search Sales Rep..." class="search">
              </td>
              <td>
                <a><i class="fa-solid fa-magnifying-glass"></i></a>
              </td>
            </tr>
          </table>
        </div>

        <div class="wrapper">
        <div class="dropdown">
                <button onclick="myFunction(this)" class="dropbtn"><span class="button__text">2022</span> 
                    <span class="button__icon" onclick="myFunction(this)">
                        <!--<ion-icon name="arrow-down-circle-outline"></ion-icon>-->
                        <i style="color: #F8914A;" class="fa-solid fa-chevron-down fa-lg"></i>
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
                    <span class="button__icon" onclick="myFunction(this)">
                        <!--<ion-icon name="arrow-down-circle-outline"></ion-icon>-->
                        <i style="color: #F8914A;" class="fa-solid fa-chevron-down fa-lg"></i>
                    </span>
                </button>
                 <div id="myDropdown2" class="dropdown-content">
                    <a href="#">February</a>
                    <a href="#">March</a>
                    <a href="#">April</a>
                 </div>
             </div> 
     </div>
      </div>
<!--Orders Cards-->
<?php 
    //  $query = "SELECT * FROM orders INNER JOIN customer ON orders.customerID = customer.customerID;";
     $query = "SELECT orders.*, customer.* 
          FROM orders 
          INNER JOIN customer ON orders.customerID = customer.customerID 
          LEFT JOIN slips ON orders.orderID = slips.orderID";
     $result = mysqli_query($con, $query);
    ?>
    <?php while ($row = mysqli_fetch_array($result)){
        $orderID = $row['orderID']; ?>
    
    <div class="cards-middle" id="cards_middle">
        <ul class="middle-cards">
            <li>
                <div class="cards">
                    <div class="cmpg">
                        <h2>Order <?php echo $row['orderID'];?></h2>
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
                            <?php echo $row['orderDate'];?>
                        </div>
                        <div class="button view">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-eye"></i></td>
                                    <td><button id="performance" class="view-txt"><?php echo "<a href=\"ordersUiView.php?orderID=$orderID\">View</a>";?></button></td>
                                </tr>
                            </table>
                        </div>
                       
                        <?php
                            if($row['paymentMethod'] == 'BT'){?>
                                <div class="button uploadSlip">
                                    <table>
                                        <tr>
                                            <td><i class="fa-solid fa-angles-up"></i></td>

                                            <?php
                                                $quer = "SELECT * FROM slips WHERE orderID = $orderID";
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
                        <?php } ?>
                        <!-- <div class="button delete">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-trash"></i></td>
                                    <td><button id="delete" class="delete-txt">Delete</button></td>
                                </tr>
                            </table>
                        </div> -->
                    </div>
                
                </div>
            </li>
        </ul>
    </div>
        <?php }?>
        </ul>
        <!-- Navigation Arrows -->
        <div class="navigation-table" id="nav_table">
            <i class="fa-solid fa-circle-chevron-left fa-lg"></i>
            <i class="fa-solid fa-circle-chevron-right fa-lg"></i>
        </div>


  
        <div class="navigation-table">
            <i class="fa-solid fa-circle-chevron-left fa-lg"></i>
            <i class="fa-solid fa-circle-chevron-right fa-lg"></i>
        </div>

        
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
    </script>

    <script>
    const view_btn = document.getElementById('view_btn');
    const view_slip = document.getElementById('view_slip');

    view_btn.addEventListener('click', () => {
      location.href = "./view-order.php";
    });

    view_slip.addEventListener('click', () => {
      location.href = "./view-slip.php";
    });

</script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
</body>
</html>