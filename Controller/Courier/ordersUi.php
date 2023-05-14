<?php
    require __DIR__.'/../../Model/utils.php';
    require_once("../../Model/courier/ordersCRUD.php");
    require __DIR__.'/../../Model/notificationCRUD.php';
    $agentData = courier_check_login();
    $result = getOrderDetails($agentData['agentUsername']);
    $agentUsername = $agentData['agentUsername'];
    $notifData = get_notification_data_agent($agentData["agentUsername"]);
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
      <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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
    <!--Stylesheet for table search bar-->
    <link rel="stylesheet" href="../../View/styles/tableSearch.css">
    <!-- Stylesheet for notification -->
    <link rel="stylesheet" href="../../View/styles/notification.css">


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
    #fetchval, #fetchval2{
        width: 25%;
    }
    #fetchval2{
        margin-left: 2%;
    }
    .filter2{
        width: 32%;
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
        /* border: 1px solid red; */
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
    .searchB:focus{
        outline: none;
    }
    #search{
        background: none;
        border: none;
        cursor: pointer;
    }
    .search_wrapper{
        /* border: 1px solid red; */
        display: flex;
        /*border: 1px solid black;*/
        margin-top: 1.5%;
        margin-left: 22%;
        width: 55%;
        /*justify-content: space-between;*/
    }
    .cards{
        margin-top: 2%;
    }
    </style>
  </head>
  <body>
    <!--common top nav and side bar content-->
    <div class="nav_bar">

      <div class="user-wrapper">

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
                    <form method='post'>
                      <input type='hidden' name='notificationID' value='$notificationID'>
                      <button id='remove' class='remove' type='remove' value='remove' name='remove' style='border: none; background-color: transparent;'>
                        <i class='fa-regular fa-circle-xmark' style='padding-left: 200px; cursor: pointer;'></i>
                      </button>
                    </form>
                    <p>$message</p>
                  </div>
                </div>";
              }
            ?>
        </div>

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
    <div class="btn_two">
        <a href = "history.php"><button id="history">View History</button></a>
    </div>

    <!-- search component start -->
    <div class="search_wrapper">
        <!-- <label for="">Filter</label> -->
        <select name="fetchval" id="fetchval" onchange="if (this.value == 'status' || this.value == 'pay') { populate('fetchval', 'fetchval2'); }">
          <option value="" disabled="" selected="" >Select Filter</option>
          <option value="status">Status</option>
          <option value="pay">Payment Method</option>
          <option value="Reset">Reset</option>
        </select>

        <select name="fetchval2" id="fetchval2" style="display: none;">
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

<!-- filters -->
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
                url:'./courier_search.php',
                method: 'POST',
                data: {searchValue:searchValue,
                    identifier: 'cou_search_filter'
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
             var sql_query = "SELECT * " +
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
                sql_query = "SELECT * " +
                    "FROM orders " +
                    "INNER JOIN customer ON orders.customerID = customer.customerID " +
                    "LEFT JOIN slips ON orders.orderID = slips.orderID " + "ORDER BY orders.orderID DESC";
                    
                fetchval2.selectedIndex = 0;
                fetchval.selectedIndex = 0;
             }

             console.log("query:", sql_query);

             $(document).ready(function(){
                  $.ajax({
                    url: "./courier_search.php",
                    type: "POST",
                    data: {sql_query: sql_query,
                      identifier: 'cou_dropdown_filter'
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
    //  $query = "SELECT orders.*, customer.*, slips.rejectedReason, approvalStatus
    //       FROM orders 
    //       INNER JOIN customer ON orders.customerID = customer.customerID 
    //       LEFT JOIN slips ON orders.orderID = slips.orderID";
    //  $result = mysqli_query($con, $query);
    ?>
    
    <div class="search_content">
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
                    <?php
                        if($row['orderStatus'] == 'Dispatched'){
                    ?>
                        <div class="button delivered">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-clipboard-check"></i></td>
                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="orderID" value="<?php echo $row[0]; ?>">
                                            <button id="delivered" class="delivered-txt" type="delivered" value="Delivered" name="delivered">Delivered</button>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    <?php
                        }
                    ?>
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
                </div>


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
    const popup_container = document.getElementById('popup_container');

    addNote.addEventListener('click', () => {
        popup_container.classList.add('show');
    });

    close.addEventListener('click', () => {
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

<script src="../../View/notification.js"></script>
</body>
</html>