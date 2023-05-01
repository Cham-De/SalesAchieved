<?php
    require __DIR__.'/../../Model/utils.php';
    require_once("../../Model/salesR/customersUiCRUD.php");
    $userData = check_login("Sales Representative");
    $username = $userData["username"];
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
    <!--Stylesheet for popup form-->
    <link rel="stylesheet" href="../../View/styles/popupForm.css">
    <!--Stylesheet for order cards-->
    <link rel="stylesheet" href="../../View/styles/cards.css">
    <!--Stylesheet for table search bar-->
    <link rel="stylesheet" href="../../View/styles/tableSearch.css">
    <!--Stylesheet for buttons on order cards-->
    <link rel="stylesheet" href="../../View/styles/buttons.css">
    <!--Stylesheet for navigation arrows-->
    <link rel="stylesheet" href="../../View/styles/navButtons.css">
    <!--Stylesheet for quick actoins buttons-->
    <link rel="stylesheet" href="../../View/styles/quickActions.css">

    <style>
      div.side_bar ul li{
        padding-top: 8%;
        padding-bottom: 4%;
    }

    .side-bar-icons{
      margin-top: 20%;
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
            <a href="calendar.php"><i class="fa-solid fa-calendar-days"></i></a>
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
            <li><a href="ordersUi.php"><i class="fa-solid fa-file-circle-check"></i>Orders</a></li>
            <li class="active"><a href="customersUi.php"><i class="fa-solid fa-user-group"></i>Customers</a></li>
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
        <button id="customer_btn">Add<br>Customer</button>
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
    <?php while ($row = mysqli_fetch_array($result)){ 
        $customerID = $row['customerID'];
        // if ($customerID == 10) continue;?>

    <div class="cards-middle" id="cards_middle">
        <ul class="middle-cards">
            <li>
                <div class="cards">
                    <div class="cmpg">
                        <h2><?php echo $row['customerName'];?></h2>
                    </div>
                    <div class="dv">
                        <div class="customerName">
                            Customer ID: <?php echo $row['customerID'];?><br />
                            Email Address: <?php echo $row['email'];?>
                        </div>
                        <div class="button view">
                            <table>
                                <tr>
                                    <?php $name = $row['customerName']; $address = $row['address']; $phone = $row['phone']; $email = $row['email']; $social = $row['socialMediaPlatform']?>
                                    <td><i class="fa-solid fa-eye"></i></td>
                                    <td><button id="view" class="perf" onclick='viewButton(
                                        <?php  echo "`$name`, `$address`, `$phone`, `$email`, `$social`" ?>
                                    )'>View</button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="button update">
                            <table>
                                <tr>
                                    <?php $name = $row['customerName']; $address = $row['address']; $phone = $row['phone']; $email = $row['email']; $social = $row['socialMediaPlatform']?>
                                    <td><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td><button id="update" class="update-txt" onclick='updateButton(
                                        <?php  echo "`$name`, `$address`, `$phone`, `$email`, `$social`, `$customerID`" ?>
                                    )'>Update</button></td>
                                </tr>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <?php } ?>

        <!--Popup Form-->
        <div class="popup-container" id="popup_container_customer">
            <div class="popup-modal">
            <form method="post" action="customersUi.php">
                <label for="customerName">Customer Name
                    <input type="string" id="customerName" name="customerName" required="required">
                </label>
                <label for="address">Customer Address
                    <input type="string" id="address" name="address" required="required">
                </label>
                <label for="phone">Phone Number
                    <input type="string" id="phone" name="phone" required="required">
                </label>
                <label for="email">Email Address
                    <input type="string" id="email" name="email" required="required">
                </label>
                <!-- <label for="socialMediaPlatform">Social Media Platform
                    <input type="string" id="socialMediaPlatform" name="socialMediaPlatform" required="required">
                </label> -->
                <label for="socialMediaPlatform" id="socialMediaPlatform">Social Media Platform
                    <select name="socialMediaPlatform" id="socialMediaPlatform">
                        <option value="Facebook">Facebook</option>
                        <option value="Instagram">Instagram</option>
                        <option value="Whatsapp">WhatsApp</option>
                    </select>
                  </label>
                <div class="sp-label">
                    <button class="cancel" id="close_form" type="button" value="Reset">Cancel</button>
                    <button class="submit" id="save_form" type="submit" value="Submit" name="submit">Save</button>
                </div>
            </form>
            </div>
        </div>
        
        <!--Popup Form-->
        <div class="popup-container" id="popup_container"> 
            <div class="popup-modal">
              <form method="POST" action="../../Model/salesR/customersUiCRUD.php">
                <fieldset id="form_field">
                    <input type="hidden" name="customerID" id="updateCustomerID" >
                  <label for="customerName">Customer Name
                      <input type="text" name="customerName" id="updateName" required="required">
                  </label>

                  <label for="phone">Phone Number
                      <input type="text" name="phone" id="updatePhone" required="required">
                  </label>

                  <label for="email">Email Address
                      <input type="text" name="email" id="updateEmail" required="required">
                  </label>
                  
      
                  <label for="address">Address
                      <input type="text" name="address" id="updateAddress" required="required">
                  </label>
                  
      
                  <label for="socialMediaPlatform">Social Media Platform
                    <select name="socialMediaPlatform" id="updatesocialMediaPlatform" required="required">
                        <option value="Facebook">Facebook</option>
                        <option value="Instagram">Instagram</option>
                        <option value="Whatsapp">WhatsApp</option>
                    </select>
                  </label>
                </fieldset>
                  
                <div class="sp-label">
                    <button class="cancel" type="button" id="close">Cancel</button>
                    <button class="submit hide" id="save" name="update">Update</button>
                </div>  
              </form>
            </div>
        </div>

        <!--Popup Form - Delete-->
        <!-- <div class="popup-container" id="popup_container_delete">
            <div class="popup-modal">
            <form method="POST" action="../../Model/salesR/customersUiCRUD.php">
                <p>Do you want to delete order?</p>
                <input type="hidden" id="deleteid" name="deleteid"></input>
                <button class="cancel" id="close_delete" type="reset" value="Reset">Cancel</button>
                <button class="submit" id="save_delete" type="submit" value="Submit" name="submit_delete">Delete</button>
            </form>
            </div>
        </div> -->

        <script>
            //const view = document.getElementById('view');
            // const update = document.getElementById('update');
            // const delete_btn = document.getElementById('delete');
            const customer_btn = document.getElementById('customer_btn');
            // const deleteID = document.getElementById('deleteid');
            const updateCusID = document.getElementById('updateCustomerID');
            const updateName = document.getElementById('updateName');
            const updatePhone = document.getElementById('updatePhone');
            const updateEmail = document.getElementById('updateEmail');
            const updateAddress = document.getElementById('updateAddress');
            const updateSocial = document.getElementById('updatesocialMediaPlatform');
            
            const popup_container = document.getElementById('popup_container');
            const popup_container_customer = document.getElementById('popup_container_customer');
            // const popup_container_delete = document.getElementById('popup_container_delete');
            
            const close = document.getElementById('close');
            const save = document.getElementById('save');
            const close_form = document.getElementById('close_form');
            // const close_delete = document.getElementById('close_delete');
            // const save_delete = document.getElementById('save_delete');

            const form_field = document.getElementById('form_field');
            
            // view.addEventListener('click', () => {
            //     popup_container.classList.add('show');
            //     form_field.setAttribute('disabled', true);
            // });

            // update.addEventListener('click', () => {
            //     popup_container.classList.add('show');
            // });

            function updateButton(name, address, phone, email, social, customerID) {
                popup_container.classList.add('show');
                save.classList.remove('hide')
                form_field.removeAttribute('disabled');
                updateCusID.value = customerID;
                updateName.value = name;
                updatePhone.value = phone;
                updateEmail.value = email;
                updateAddress.value = address;
                updateSocial.value = social;
            }

            function viewButton(name, address, phone, email, social) {
                popup_container.classList.add('show');
                form_field.setAttribute('disabled', true);
                updateName.value = name;
                updatePhone.value = phone;
                updateEmail.value = email;
                updateAddress.value = address;
                updateSocial.value = social;
            }

            // function deleteButton(customerID) {
            //     popup_container_delete.classList.add('show');
            //     deleteID.value = customerID;
            //     // form_field.setAttribute('disabled', true);
            //     // updateName.value = name;
            //     // updatePhone.value = phone;
            //     // updateAddress.value = address;
            //     // updateSocial.value = social;
            // }

            customer_btn.addEventListener('click', () => {
                popup_container_customer.classList.add('show');
            });

            // delete_btn.addEventListener('click', () => {
            //     popup_container_delete.classList.add('show');
            // });
    
            close.addEventListener('click', () => {
                popup_container.classList.remove('show');
            });

            close_form.addEventListener('click', () => {
                popup_container_customer.classList.remove('show');
            });

            // close_delete.addEventListener('click', () => {
            //     popup_container_delete.classList.remove('show');
            // });
    
            save.addEventListener('click', () => {
                popup_container.classList.remove('show');
            });
    
            save.addEventListener('click', () => {
                popup_container_pwd.classList.remove('show');
            });

            // save_delete.addEventListener('click', () => {
            //     popup_container_delete.classList.remove('show');
            // });
        </script>

        <div class="navigation-table" id="nav_table">
            <i class="fa-solid fa-circle-chevron-left fa-lg"></i>
            <i class="fa-solid fa-circle-chevron-right fa-lg"></i>
        </div>
</body>
</html>