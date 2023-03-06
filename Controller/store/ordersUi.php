<?php
    require_once("../../Model/salesR/ordersCRUD.php");
?>

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
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <!--Stylesheet for customer cards-->
    <link rel="stylesheet" href="../../View/styles/cards.css">
    <!--Stylesheet for Buttons-->
    <link rel="stylesheet" href="../../View/styles/buttons.css">
    <!--Stylesheet for table navigation buttons-->
    <link rel="stylesheet" href="../../View/styles/navButtons.css">
    <link rel="stylesheet" href="../../View/styles/popup-btn-table.css">
    <link rel="stylesheet" href="../../View/styles/filter-buttons.css">
    <style>
        .search-wrap-container{
        display: flex;
        justify-content: space-between;
      }
      .search_container{
        margin-left: 24%;
      }
      div.side_bar ul li{
        padding-top: 8%;
        padding-bottom: 8%;
    }
    .side-bar-icons{
      margin-top: 15%;
    }
    .wrapper{
        display: flex;
        width: auto;
        margin-right: 8%;
      }
      .nav_bar{
        margin-bottom: 2%;
      }
      .cards{
        margin-left: 22%;
        margin-top: 4%;
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
              <small>Store Manager</small>
          </div>
      </div>
  </div>
  <div class="side_bar">
      <div class="logo">
          <img src="../../View/assets/saleslogo-final.png" width= "70%" height="70%">
      </div>
      <ul>
          <li><a href="landingUi.php"><i class="fa-solid fa-house"></i>Home</a></li>
          <li><a href="stocksUi.php"><i class="fa-solid fa-warehouse"></i>Stocks</a></li>
          <li class="active"><a href="ordersUi.php"><i class="fa-solid fa-file-circle-check"></i>Orders</a></li>
          <li><a href="agentsUi.php"><i class="fa-solid fa-user-group"></i>Agents</a></li>
          <li><a href="returnedGoodsUi.php"><i class="fa-solid fa-user-group"></i>Returned Goods</a></li>
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
    <div class="cards-middle" id="cards_middle">
        <ul class="middle-cards">
        <?php
            while($rows_orders = mysqli_fetch_assoc($result_for_get_all_orders)){
        ?>
            <li>
                <div class="cards">
                    <div class="cmpg">
                        <h2>Order <?php echo $rows_orders['orderID'];?></h2>
                    </div>
                    <div class="dv">
                        <div class="customerName">
                            <?php
                                while($rows_customers = mysqli_fetch_assoc($result_for_get_customer_details)){
                            ?>
                                <?php if($rows_customers['customerID'] == $rows_orders['customerID']){
                                     $name_customer = $rows_customers['name'];
                                     break;
                                }?>
                            <?php }?>
                            <?php echo $name_customer ?><br>
                            <?php echo $rows_orders['orderDate'];?>
                        </div>
                        <div class="button view">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-eye"></i></td>
                                    <td><button id="performance" class="view-txt"><a href="ordersUiView.php?order_id=<?php echo $rows_orders['orderID'];?>&cus_id=<?php echo $rows_orders['customerID'];?>">View</a></button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="button update">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td><button id="performance" class="update-txt"><a href="ordersUiUpdate.php?order_id=<?php echo $rows_orders['orderID'];?>&cus_id=<?php echo $rows_orders['customerID'];?>">Update</a></button></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </li>
        <?php }?>
        </ul>
    
        <!-- Navigation Arrows -->
        <div class="navigation-table" id="nav_table">
            <i class="fa-solid fa-circle-chevron-left fa-lg"></i>
            <i class="fa-solid fa-circle-chevron-right fa-lg"></i>
        </div>
  </body>
</html>