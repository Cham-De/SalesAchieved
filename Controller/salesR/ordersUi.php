<?php
    require __DIR__.'/../../Model/utils.php';
    require_once("../../Model/salesR/ordersCRUD.php");
    $username = check_login("Sales Representative");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Rep</title>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!--stylesheet for icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Stylesheet for nav bar-->
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <!--Stylesheet for quick actions-->
    <link rel="stylesheet" href="../../View/styles/quickActions.css">
    <!--Stylesheet for orders cards-->
    <link rel="stylesheet" href="../../View/styles/cards.css">
    <!--Stylesheet for buttons on orders cards-->
    <link rel="stylesheet" href="../../View/styles/buttons.css">
    <!--Stylesheet for navigation arrows-->
    <link rel="stylesheet" href="../../View/styles/navButtons.css">
    <!--Stylesheet for popup forms-->
    <link rel="stylesheet" href="../../View/styles/popupForm.css">
    <!--Stylesheet for table search bar-->
    <link rel="stylesheet" href="../../View/styles/tableSearch.css">

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
                <small>Sales Representative</small>
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

    <!--Top right corner buttons-->
    <div class="btn_three">
        <button id="order_btn">Add Order</button>
    </div>

    <!--Table search bar-->
    <div class="search_container">
        <table class="element_container">
          <tr>
            <td>
              <input type="text" placeholder="Search Table..." class="search">
            </td>
            <td>
              <a><i class="fa-solid fa-magnifying-glass"></i></a>
            </td>
          </tr>
        </table>
    </div>
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>

    <!--Orders Cards-->
    <div class="cards-middle" id="cards_middle">
        <ul class="middle-cards">
        <?php while ($row = mysqli_fetch_array($result)){
            $orderID = $row['orderID']; ?>
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
                        else{?>
                            <h5 class="completed"><?php echo $row['orderStatus'];?></h5>
                        <?php } ?>
                        </div>
                    </div>
                    <div class="dv">
                        <div class="customerName">
                            <?php echo $row['name'];?><br>
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
                        <div class="button update">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td><button id="performance" class="update-txt"><?php echo "<a href=\"ordersUiUpdate.php?orderID=$orderID\">Update</a>";?></button></td>
                                </tr>
                            </table>
                        </div>
                        <?php
                            if($row['paymentMethod'] == 'BT'){?>
                                <div class="button uploadSlip">
                                    <table>
                                        <tr>
                                            <td><i class="fa-solid fa-angles-up"></i></td>
                                            <td><button id="performance" class="uploadSlip-txt"><a href="uploadSlip.php">Upload Slip</a></button></td>
                                        </tr>
                                    </table>
                                </div>
                        <?php } ?>
                        <div class="button delete">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-trash"></i></td>
                                    <td><button id="delete" class="delete-txt">Delete</button></td>
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

        <!--Popup Form - Delete-->
        <div class="popup-container" id="popup_container_delete">
            <div class="popup-modal">
            <form method="post">
                <p>Do you want to delete order?</p>
                <button class="cancel" id="close_delete" type="reset" value="Reset">Cancel</button>
                <button class="submit" id="save_delete" type="submit" value="Submit" name="submit_delete">Delete</button>
            </form>
            </div>
        </div>

        <!--Popup Form - Orders-->
    <div class="popup-container" id="popup_container_order">
      <div class="popup-modal">
        <form method="post" action="ordersUi.php">
             <label for="customerID">Customer ID
                <input type="number" id="customerID" name="customerID" required="required">
            </label>
            <label for="orderDetails" id="productList">Order Details
                <select id="orderDetails" name="orderDetails">
                <option value="PR001">PR001</option>
                <option value="PR002">PR002</option>
                <option value="PR003">PR003</option>
                <option value="PR004">PR004</option>
                <option value="PR005">PR005</option>
                <option value="PR006">PR006</option>
                </select>
                <input id="quantityDetails" name="quantityDetails" type="number" value=1 min=1></input>
            </label>
            <div class="controls">
              <a href="#" id="add_more_fields">Add More</a>
              <a href="#" id="remove_fields">Remove Field</a>
            </div>
            <!-- <label for="orderStatus" id="orderStatus">Order Status
                <select id="orderStatus" name="orderStatus">
                <option value="Pending">Pending</option>
                <option value="Dispatched">Dispatched</option>
                <option value="Delivered">Delivered</option>
                <option value="Completed">Completed</option>
                </select>
            </label> -->
            <label for="paymentMethod" id="payingMethods">Payment Method
                <select id="paymentMethod" name="paymentMethod">
                  <option value="COD">Cash on Delivery</option>
                  <option value="BT">Bank Transaction</option>
                </select>
            </label> 
            <label for="deliveryDate">Delivery Date
                <input type="date" id="deliveryDate" name="deliveryDate" required="required">
            </label>
            <label for="deliveryRegion" id="regions">Delivery Region
                <select id="deliveryRegion" name="deliveryRegion">
                  <option value="Within Colombo">Within Colombo</option>
                  <option value="Colombo Suburbs">Colombo Suburbs</option>
                  <option value="Out of Colombo">Out of Colombo</option>
                </select>
            </label>
            <button class="cancel" id="close_order" type="reset" value="Reset">Cancel</button>
            <button class="submit" id="save_order" type="submit" value="Submit" name="submit">Save</button>
          </form>
      </div>
    </div>

        <script>
            const delete_btn = document.getElementById('delete');
            const order_btn = document.getElementById('order_btn');

            const close_delete = document.getElementById('close_delete');
            const save_delete = document.getElementById('save_delete');
            const close_order = document.getElementById('close_order');
            const save_order = document.getElementById('save_order');

            const popup_container_delete = document.getElementById('popup_container_delete');
            const popup_container_order = document.getElementById('popup_container_order');

            delete_btn.addEventListener('click', () => {
                popup_container_delete.classList.add('show');
            });

            order_btn.addEventListener('click', () => {
                popup_container_order.classList.add('show');
            });

            close_delete.addEventListener('click', () => {
                popup_container_delete.classList.remove('show');
            });

            close_order.addEventListener('click', () => {
                popup_container_order.classList.remove('show');
            });

            save_delete.addEventListener('click', () => {
                popup_container_delete.classList.remove('show');
            });

            save_order.addEventListener('click', () => {
                popup_container_order.classList.remove('show');
            });
        </script>

        <!--JavaScript for Dynamic form fields-->
        <script>
            var add_more_fields = document.getElementById('add_more_fields');
            var remove_fields = document.getElementById('remove_fields');
            var productList = document.getElementById('productList');
            var orderDetails = document.getElementById('orderDetails');
            var quantityDetails = document.getElementById('quantityDetails');
            var count = 1;

            add_more_fields.onclick = function(){
                var newField = orderDetails.cloneNode(true);
                newField.setAttribute('id', 'orderDetails' + count);
                newField.setAttribute('name', 'orderDetails' + count);
                productList.appendChild(newField);
                var newField = quantityDetails.cloneNode(true);
                newField.setAttribute('id', 'quantityDetails' + count);
                newField.setAttribute('name', 'quantityDetails' + count);
                productList.appendChild(newField);
                count += 1;
                // newField.setAttribute('placeholder','Another Field');
            }

            remove_fields.onclick = function(){
                var select_tags = productList.getElementsByTagName('select');
                if(select_tags.length > 1) {
                productList.removeChild(select_tags[(select_tags.length) - 1]);
                var input_tags = productList.getElementsByTagName('input');
                productList.removeChild(input_tags[(input_tags.length) - 1]);
                }
            }
        </script>

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
</body>

</html>