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
    <link rel="stylesheet" href="../styles/navBar.css">
    <!--Stylesheet for popup form-->
    <link rel="stylesheet" href="../styles/popupForm.css">
    <!--Stylesheet for order cards-->
    <link rel="stylesheet" href="../styles/cards.css">
    <!--Stylesheet for table search bar-->
    <link rel="stylesheet" href="../styles/tableSearch.css">
    <!--Stylesheet for buttons on order cards-->
    <link rel="stylesheet" href="../styles/buttons.css">
    <!--Stylesheet for navigation arrows-->
    <link rel="stylesheet" href="../styles/navButtons.css">
    <!--Stylesheet for quick actions-->
    <link rel="stylesheet" href="../styles/quickActions.css">
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
            <img src="../assets/man.png" width="50px" height="50px" alt="user image">
            <div>
                <h4>John Doe</h4>
                <small>Sales Representative</small>
            </div>
        </div>
    </div>
  
    <div class="side_bar">
        <div class="logo">
            <img src="../assets/logosales.png" width="80%" height="80%">
        </div>
        <ul>
            <li><a href="landingUi.php"><i class="fa-solid fa-house"></i>Home</a></li>
            <li><a href="ordersUi.php"><i class="fa-solid fa-file-circle-check"></i>Orders</a></li>
            <li class="active"><a href="customersUi.php"><i class="fa-solid fa-user-group"></i>Customers</a></li>
            <li><a href="stocksUi.php"><i class="fa-solid fa-warehouse"></i>Stocks</a></li>
            <li><a href="salesUi.php"><i class="fa-solid fa-sack-dollar"></i>Sales</a></li>
            <li><a href="complaints.php"><i class="fa-solid fa-comment"></i>Complaints</a></li>
        </ul>
        <ul class="profile">
            <li>
                <a href="../profile.php"><i class="fa-regular fa-circle-user"></i>Profile</a>
            </li>
            <li>
                <a href="#"><i class="fa-solid fa-arrow-right-from-bracket"></i>Log out</a>
            </li>
        </ul>
    </div>
    </div>
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
    <!---end of side and nav bars-->

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

    <!--Top right corner buttons-->
    <div class="btn_three">
        <button id="customer_btn">Add Customer</button>
    </div>

    <!--Orders Cards-->
    <div class="cards-middle" id="cards_middle">
        <ul class="middle-cards">
            <li>
                <div class="cards">
                    <div class="cmpg">
                        <h2>Senu Dilshara</h2>
                    </div>
                    <div class="dv">
                    <div class="customerName">
                            996258373V
                        </div>
                        <div class="button view">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-eye"></i></td>
                                    <td><button id="view" class="perf">View</button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="button update">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td><button id="update" class="update-txt">Update</button></td>
                                </tr>
                            </table>
                        </div>
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
            <li>
                <div class="cards">
                    <div class="cmpg">
                        <h2>Bethmi Navanjana</h2>
                    </div>
                    <div class="dv">
                    <div class="customerName">
                            996258373V
                        </div>
                        <div class="button view">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-eye"></i></td>
                                    <td><button id="view" class="perf">View</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="button update">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td><button id="update" class="update-txt">Update</button></td>
                                </tr>
                            </table>
                        </div>
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
            <li>
                <div class="cards">
                    <div class="cmpg">
                        <h2>Binu De Silva</h2>
                    </div>
                    <div class="dv">
                    <div class="customerName">
                            996258373V
                        </div>
                        <div class="button view">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-eye"></i></td>
                                    <td><button id="view" class="perf">View</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="button update">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td><button id="update" class="update-txt">Update</button></td>
                                </tr>
                            </table>
                        </div>
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
            <li>
                <div class="cards">
                    <div class="cmpg">
                        <h2>Kaveesha Perera</h2>
                    </div>
                    <div class="dv">
                    <div class="customerName">
                            996258373V
                        </div>
                        <div class="button view">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-eye"></i></td>
                                    <td><button id="view" class="perf">View</button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="button update">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td><button id="update" class="update-txt">Update</button></td>
                                </tr>
                            </table>
                        </div>
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
            <li>
                <div class="cards">
                    <div class="cmpg">
                        <h2>Maleesha Fernando</h2>
                    </div>
                    <div class="dv">
                    <div class="customerName">
                            996258373V
                        </div>
                        <div class="button view">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-eye"></i></td>
                                    <td><button id="view" class="perf">View</button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="button update">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td><button id="update" class="update-txt">Update</button></td>
                                </tr>
                            </table>
                        </div>
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
        </ul>
        
        <!--Popup Form - Delete-->
        <div class="popup-container" id="popup_container_delete">
            <div class="popup-modal">
            <form method="post">
                <p>Do you want to delete customer?</p>
                <button class="cancel" id="close_delete" type="reset" value="Reset">Cancel</button>
                <button class="submit" id="save_delete" type="submit" value="Submit" name="submit">Delete</button>
            </form>
            </div>
        </div>

        <!--Popup Form - Add Customer-->
    <div class="popup-container" id="popup_container_customer">
        <div class="popup-modal">
          <form method="post">
            <label for="customerName">Customer Name
                <input type="string" id="customerName" name="customerName" required="required">
            </label>
            <label for="NIC">NIC No
                <input type="string" id="NIC" name="NIC" required="required">
            </label>
            <label for="address">Address
                <input type="string" id="address" name="address" required="required">
            </label>
            <label for="phone">Phone Number
                <input type="string" id="phone" name="phone" required="required">
            </label>
            <label for="socialMediaPlatform">Social Media Platform
                <select id="socialMediaPlatform">
                    <option value="facebook">Facebook</option>
                    <option value="instagram">Instagram</option>
                    <option value="whatsapp">WhatsApp</option>
                </select>
            </label>
            <button class="cancel" id="close_customer" type="reset" value="Reset">Cancel</button>
            <button class="submit" id="save_customer" type="submit" value="Submit" name="submit">Save</button>
          </form>
        </div>
      </div>
        
        <!--Popup Form-->
        <div class="popup-container" id="popup_container"> 
            <div class="popup-modal">
                <h2>ID: 997480373V</h2>
              <form>
                <fieldset id="form_field">
                  <label for="name">Customer Name
                      <input type="text" value="Senu Dilshara">
                  </label>
                  
      
                  <label for="address">Address
                      <input type="text" value="23/A, Flower Road, Maharagama">
                  </label>
                  
      
                  <label for="phone">Phone Number
                      <input type="text" value="0713648954">
                  </label>
                  
      
                  <label for="socialMediaPlatform">Social Media Platform
                    <select id="socialMediaPlatform">
                        <option value="facebook">Facebook</option>
                        <option value="instagram">Instagram</option>
                        <option value="whatsapp">WhatsApp</option>
                    </select>
                  </label>
                </fieldset>
                  
                <label class="sp-label">
                    <button class="cancel" id="close">Cancel</button>
                    <button class="submit" id="save">Update</button>
                </label>  
              </form>
            </div>
        </div>
        <script>
            const delete_btn = document.getElementById('delete');
            const view = document.getElementById('view');
            const update = document.getElementById('update');
            const popup_container = document.getElementById('popup_container');
            const customer_btn = document.getElementById('customer_btn');
            
            const close_customer = document.getElementById('close_customer');
            const save_customer = document.getElementById('save_customer');
            const close = document.getElementById('close');
            const save = document.getElementById('save');
            const close_delete = document.getElementById('close_delete');
            const save_delete = document.getElementById('save_delete');
            
            const popup_container_customer = document.getElementById('popup_container_customer');
            const form_field = document.getElementById('form_field');
            const popup_container_delete = document.getElementById('popup_container_delete');
            
            delete_btn.addEventListener('click', () => {
                popup_container_delete.classList.add('show');
            });

            customer_btn.addEventListener('click', () => {
                popup_container_customer.classList.add('show');
            });
            
            view.addEventListener('click', () => {
                popup_container.classList.add('show');
                form_field.setAttribute('disabled', true);
            });

            update.addEventListener('click', () => {
                popup_container.classList.add('show');
            });
    
            close.addEventListener('click', () => {
                popup_container.classList.remove('show');
            });

            close_delete.addEventListener('click', () => {
                popup_container_delete.classList.remove('show');
            });

            close_customer.addEventListener('click', () => {
                popup_container_customer.classList.remove('show');
            });
    
            save_delete.addEventListener('click', () => {
                popup_container_delete.classList.remove('show');
            });
            
            save.addEventListener('click', () => {
                popup_container.classList.remove('show');
            });
    
            save.addEventListener('click', () => {
                popup_container_pwd.classList.remove('show');
            });

            save_customer.addEventListener('click', () => {
                popup_container_customer.classList.remove('show');
            });
        </script>

        <div class="navigation-table" id="nav_table">
            <i class="fa-solid fa-circle-chevron-left fa-lg"></i>
            <i class="fa-solid fa-circle-chevron-right fa-lg"></i>
        </div>
</body>

</html>