<?php
    require __DIR__.'/../../Model/utils.php';
    require __DIR__.'/../../Model/notificationCRUD.php';
    require_once("../../Model/salesR/ordersCRUD.php");
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
    <!-- Stylesheet for notification -->
    <link rel="stylesheet" href="../../View/styles/notification.css">
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
    .cards{
        margin-top: 2%;
    }
    #order_btn{
        margin-top: 1%;
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

    <!--Top right corner buttons-->
    <div class="btn_three">
        <button id="order_btn">Add Order</button>
    </div>

    <!--Table search bar-->
    <div class="search_wrapper">
        <!-- <label for="">Filter</label> -->
        <select name="fetchval" id="fetchval" onchange="if (this.value == 'status' || this.value == 'pay') { populate('fetchval', 'fetchval2'); }">
          <option value="" disabled="" selected="" >Select Filter</option>
          <option value="status">Status</option>
          <option value="pay">Payment Method</option>
          <option value="Reset">Reset</option>
        </select>

        <select name="fetchval2" id="fetchval2" class="filter2" style="display: none;">
    </select>

    <!-- search bar -->
        <div class="filter2">
            <table class="ele">
            <tr>
                <!-- <form method="post"> -->
                    <td>
                        <input type="text" placeholder="Search Orders..." class="searchB" name="orderSearch">
                    </td>
                    <td>
                    <button id="search"><i style="color:#2609cc;" class="fa-solid fa-magnifying-glass"></i></button>
                    </td>
                <!-- </form> -->
            </tr>
            </table>
        </div>
        
    </div>

    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>

<script>
    var searchButton = document.getElementById('search');
    searchButton.addEventListener("click", function() {
        // Get the search box element
        var searchBox = document.querySelector("input[name='orderSearch']");
        // Get the value from the search box
        var searchValue = searchBox.value;
        console.log("Search value:", searchValue);

        $(document).ready(function(){

            $.ajax({
                url:'./search_bar.php',
                method: 'POST',
                data: {searchValue:searchValue,
                    identifier: 'bar_filter'
                },
                success: function(data){
                    console.log(data);
                    $('.search_content').html(data);
                }
            })
        });
    });

    var fetchval = document.getElementById('fetchval');
    var fetchval2 = document.getElementById('fetchval2');
    fetchval2.style.display = 'none';

    fetchval.addEventListener('change', function() {

        if(fetchval.value === 'status' || fetchval.value === 'pay'){
            populate('fetchval', 'fetchval2');
            fetchval2.style.display = 'block';
            filterTable();
        }
        else if(fetchval.value === 'Reset'){
            fetchval2.style.display = 'none';
            fetchval2.value = '';
            fetchval.value = '';
            filterTable();
        }
        
    });

    fetchval2.addEventListener('change', function() {
            filterTable();       
    });

    function populate(s1, s2){
          var select1 = document.getElementById(s1);
          var select2 = document.getElementById(s2);

          if(select2){
            console.log("Populating options for: " + s1);
            console.log("Populating options for: " + s2);

            select2.innerHTML = "";
            var optionArray;

            if(select1.value == "status"){
              optionArray = ['Pending', 'Delivered', 'Completed', 'Cancelled'];
            }
            else if(select1.value == "pay"){
              optionArray = ['BT','COD'];
            }

            for (var i = 0; i < optionArray.length; i++) {
              var option = document.createElement("option");
              option.value = optionArray[i];
              option.text = optionArray[i];
              select2.appendChild(option);
            }
          }
        }

        function filterTable() {
             var fetchval = document.getElementById("fetchval").value;
             var fetchval2 = document.getElementById("fetchval2").value;

             console.log("select 1:", fetchval);
             console.log("select 2:", fetchval2);

            //  Construct SQL query based on the selected values
             var sql_query = "SELECT orders.*, customer.*, slips.rejectedReason, approvalStatus " +
                    "FROM orders " +
                    "INNER JOIN customer ON orders.customerID = customer.customerID " +
                    "LEFT JOIN slips ON orders.orderID = slips.orderID " +
                    "WHERE ";
           
             if (fetchval === "status") {
                sql_query += "orders.orderStatus = '" + fetchval2 + "'";
             } else if (fetchval === "pay") {
                sql_query += "orders.paymentMethod = '" + fetchval2 + "'";
             }
             else{
              //reset filter
                sql_query = "SELECT orders.*, customer.*, slips.rejectedReason, approvalStatus " +
                    "FROM orders " +
                    "INNER JOIN customer ON orders.customerID = customer.customerID " +
                    "LEFT JOIN slips ON orders.orderID = slips.orderID ";
                    
                fetchval2.selectedIndex = 0;
                fetchval.selectedIndex = 0;
             }

             console.log("query:", sql_query);

             $(document).ready(function(){
                  $.ajax({
                    url: "./search_bar.php",
                    type: "POST",
                    data: {sql_query: sql_query,
                      identifier: 'orders_filter'
                    },
                    success: function(response){
                    // Handle the response from the server here
                    console.log(response);
                    $(".search_content").html(response);
                  }
                });
              });             

         }
</script>

    <!--Orders Cards-->
    <?php 
    //  $query = "SELECT * FROM orders INNER JOIN customer ON orders.customerID = customer.customerID;";
     
    ?>
    <div class="search_content">
    <?php while ($row = mysqli_fetch_array($result)){
        $orderID = $row[0]; ?>
    
    <div class="cards-middle" id="cards_middle">
        <ul class="middle-cards">
            <li>
                <div class="cards">
                    <div class="cmpg">
                        
                        <h2>Order <?php echo $row[0];?></h2>
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
                        <?php if($row['orderStatus'] != "Completed" && $row['orderStatus'] != "Cancel"){ ?>
                        <div class="button update">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td><button id="performance" class="update-txt"><a href="ordersUiUpdate.php?orderID=<?php echo $orderID; ?>">Update</a></button></td>
                                </tr>
                            </table>
                        </div>
                        <?php
                        }
                            if($row['paymentMethod'] == 'BT' && $row['orderStatus'] != 'Cancel'){?>
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
                    <?php
                        if ($row['approvalStatus'] == "disapproved" && $row['rejectedReason']) {
                            // Show the div if there's a rejectedReason value
                            echo '<div class="reason" onclick="toggleReason(this)">Payment Rejected</div>';
                            echo '<div class="reasonText" style="display: none;">'.$row['rejectedReason'].'</div>';
                          }
                    ?>
                </div>
            </li>
        </ul>
    </div>
        <?php }?>
                        </div>


        <!-- Navigation Arrows -->
        <!-- <div class="navigation-table" id="nav_table">
            <i class="fa-solid fa-circle-chevron-left fa-lg"></i>
            <i class="fa-solid fa-circle-chevron-right fa-lg"></i>
        </div> -->

        <!--Popup Form - Delete-->
        <!-- <div class="popup-container" id="popup_container_delete">
            <div class="popup-modal">
            <form method="post">
                <p>Do you want to delete order?</p>
                <button class="cancel" id="close_delete" type="reset" value="Reset">Cancel</button>
                <button class="submit" id="save_delete" type="submit" value="Submit" name="submit_delete">Delete</button>
            </form>
            </div>
        </div> -->

        <!--Popup Form - Orders-->
    <div class="popup-container" id="popup_container_order">
      <div class="popup-modal">
        <form method="post" action="ordersUi.php">
             <label for="customerID" id="customerID">Customer ID
                <select id="customerID" name="customerID">
                    <?php
                        while($customers = mysqli_fetch_assoc($customer)){
                            $customerID = $customers["customerID"];
                            $customerName = $customers["customerName"];
                            echo "<option value='$customerID'>$customerID - $customerName</option>";
                        }
                    ?>
                </select>
            </label>
            <label for="orderDetails" id="productList">Order Details
                <select id="orderDetails" name="orderDetails">
                    <?php
                    while ($product = mysqli_fetch_assoc($products)){
                        $productName = $product["productName"];
                        $productCode = $product["productCode"];
                        echo "<option value='$productCode'>$productName</option>";
                    }
                    ?>
                </select>
                <input id="quantityDetails" name="quantityDetails" type="number" value=1 min=1></input>
            </label>
            <div class="controls">
              <a href="#" id="add_more_fields">Add More</a>
              <a href="#" id="remove_fields">Remove Field</a>
            </div>
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
            <input type="hidden" name="username"  value=<?php echo '"'.$userData['username'].'"' ?>>
            <button class="cancel" id="close_order" type="reset" value="Reset">Cancel</button>
            <button class="submit" id="save_order" type="submit" value="Submit" name="submit">Save</button>
          </form>
      </div>
    </div>

        <script>
            // const delete_btn = document.getElementById('delete');
            const order_btn = document.getElementById('order_btn');

            // const close_delete = document.getElementById('close_delete');
            // const save_delete = document.getElementById('save_delete');
            const close_order = document.getElementById('close_order');

            const popup_container_delete = document.getElementById('popup_container_delete');
            const popup_container_order = document.getElementById('popup_container_order');

            // delete_btn.addEventListener('click', () => {
            //     popup_container_delete.classList.add('show');
            // });

            order_btn.addEventListener('click', () => {
                popup_container_order.classList.add('show');
            });

            // close_delete.addEventListener('click', () => {
            //     popup_container_delete.classList.remove('show');
            // });

            close_order.addEventListener('click', () => {
                popup_container_order.classList.remove('show');
            });

            // save_delete.addEventListener('click', () => {
            //     popup_container_delete.classList.remove('show');
            // });
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