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
    <!--Stylesheet for quick actions-->
    <link rel="stylesheet" href="../styles/quickActions.css">
    <!--Stylesheet for orders cards-->
    <link rel="stylesheet" href="../styles/cards.css">
    <!--Stylesheet for buttons on orders cards-->
    <link rel="stylesheet" href="../styles/buttons.css">
    <!--Stylesheet for navigation arrows-->
    <link rel="stylesheet" href="../styles/navButtons.css">
    <!--Stylesheet for popup forms-->
    <link rel="stylesheet" href="../styles/popupForm.css">
    <!--Stylesheet for table search bar-->
    <link rel="stylesheet" href="../styles/tableSearch.css">
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
            <li class="active"><a href="ordersUi.php"><i class="fa-solid fa-file-circle-check"></i>Orders</a></li>
            <li><a href="customersUi.php"><i class="fa-solid fa-user-group"></i>Customers</a></li>
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
            <li>
                <div class="cards">
                    <div class="cmpg">
                        <h2>Order 23</h2>
                        <div class="orderStatus">
                            <h5>Pending</h5>
                        </div>
                    </div>
                    <div class="dv">
                        <div class="customerName">
                            Senu Dilshara<br>
                            15/11/2022
                        </div>
                        <div class="button view">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-eye"></i></td>
                                    <td><button id="performance" class="view-txt"><a href="ordersUiView.php">View</a></button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="button update">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td><button id="performance" class="update-txt"><a href="ordersUiUpdate.php">Update</a></button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="button uploadSlip">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-angles-up"></i></td>
                                    <td><button id="performance" class="uploadSlip-txt"><a href="uploadSlip.php">Upload Slip</a></button></td>
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
                        <h2>Order 24</h2>
                        <div class="orderStatus">
                            <h5>Pending</h5>
                        </div>
                    </div>
                    <div class="dv">
                        <div class="customerName">
                            Bethmi Navanjana<br>
                            15/11/2022
                        </div>
                        <div class="button view">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-eye"></i></td>
                                    <td><button class="view-txt"><a href="ordersUiView.php">View</a></button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="button update">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td><button id="performance" class="update-txt"><a href="ordersUiUpdate.php">Update</a></button></td>
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
                        <h2>Order 25</h2>
                        <div class="orderStatus">
                            <h5>Pending</h5>
                        </div>
                    </div>
                    <div class="dv">
                        <div class="customerName">
                            Binu De Silva<br>
                            15/11/2022
                        </div>
                        <div class="button view">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-eye"></i></td>
                                    <td><button class="view-txt"><a href="ordersUiView.php">View</a></button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="button update">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td><button id="performance" class="update-txt"><a href="ordersUiUpdate.php">Update</a></button></td>
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
                        <h2>Order 26</h2>
                        <div class="orderStatus">
                            <h5>Pending</h5>
                        </div>
                    </div>
                    <div class="dv">
                        <div class="customerName">
                            Senu Dilshara<br>
                            15/11/2022
                        </div>
                        <div class="button view">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-eye"></i></td>
                                    <td><button id="performance" class="view-txt"><a
                                                href="ordersUiView.php">View</a></button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="button update">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td><button id="performance" class="update-txt"><a href="ordersUiUpdate.php">Update</a></button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="button uploadSlip">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-file"></i></td>
                                    <td><button id="performance" class="uploadSlip-txt"><a href="viewSlip.php">View Slip</a></button></td>
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
                        <h2>Order 27</h2>
                        <div class="orderStatus">
                            <h5>Pending</h5>
                        </div>
                    </div>
                    <div class="dv">
                        <div class="customerName">
                            Senu Dilshara<br>
                            15/11/2022
                        </div>
                        <div class="button view">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-eye"></i></td>
                                    <td><button id="performance" class="view-txt"><a
                                                href="ordersUiView.php">View</a></button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="button update">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td><button id="performance" class="update-txt"><a href="ordersUiUpdate.php">Update</a></button></td>
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
                <button class="submit" id="save_delete" type="submit" value="Submit" name="submit">Delete</button>
            </form>
            </div>
        </div>

        <!--Popup Form - Orders-->
    <div class="popup-container" id="popup_container_order">
      <div class="popup-modal">
        <form method="post">
          <div id="dynamicField">
            <label for="customerID">Customer ID
                <input type="number" id="customerID" name="customerID" required="required">
            </label>
            <label for="orderDetails" id="productList">Order Details
              <select id="orderDetails" name="orderDetails">
                <option value="proOne">PR001</option>
                <option value="proTwo">PR002</option>
                <option value="proThree">PR003</option>
                <option value="proFour">PR004</option>
                <option value="proFive">PR005</option>
                <option value="proSix">PR006</option>
              </select>
            </label>
          </div>
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
            <label for="deliveryRegion" id="regions">Payment Method
                <select id="deliveryRegion" name="deliveryRegion">
                  <option value="WC">Within Colombo</option>
                  <option value="CS">Colombo Suburbs</option>
                  <option value="OC">Out of Colombo</option>
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
            var dynamicField = document.getElementById('dynamicField');
            var add_more_fields = document.getElementById('add_more_fields');
            var remove_fields = document.getElementById('remove_fields');
            var productList = document.getElementById('productList');
            var orderDetails = document.getElementById('orderDetails');
            var count = 1;

            add_more_fields.onclick = function(){
                var newField = orderDetails.cloneNode(true);
                newField.setAttribute('id', 'orderDetails' + count);
                count += 1;
                // newField.setAttribute('placeholder','Another Field');
                productList.appendChild(newField);
            }

            remove_fields.onclick = function(){
                var select_tags = productList.getElementsByTagName('select');
                if(select_tags.length > 1) {
                productList.removeChild(select_tags[(select_tags.length) - 1]);
                }
            }
        </script>

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
</body>

</html>