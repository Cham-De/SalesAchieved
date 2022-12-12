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
    <link rel="stylesheet" href="../styles/navBar.css">
    <!--Stylesheet for quick actions buttons-->
    <link rel="stylesheet" href="../styles/quickActions.css">
    <!--Stylesheet for customer cards-->
    <link rel="stylesheet" href="../styles/cards.css">
    <!--Stylesheet for Buttons-->
    <link rel="stylesheet" href="../styles/buttons.css">
    <!--Stylesheet for table navigation buttons-->
    <link rel="stylesheet" href="../styles/navButtons.css">
    <!--Stylesheet for popup form-->
    <link rel="stylesheet" href="../styles/popupForm.css">
    
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
              <small>Store Manager</small>
          </div>
      </div>
  </div>

  <div class="side_bar">
      <div class="logo">
          <img src="../assets/logosales.jpeg" width="65%" height="55%">
      </div>
      <ul>
          <li><a href="landingUi.php"><i class="fa-solid fa-house"></i>Home</a></li>
          <li class="active"><a href="stocksUi.php"><i class="fa-solid fa-warehouse"></i>Stocks</a></li>
          <li><a href="ordersUi.php"><i class="fa-solid fa-file-circle-check"></i>Orders</a></li>
          <li><a href="agentsUi.php"><i class="fa-solid fa-user-group"></i>Agents</a></li>
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
        <button id="product_btn">Add Product</button>
    </div>

    <!--Customer Cards-->
    <div class="cards-middle" id="cards_middle">
        <ul class="middle-cards">
            <li>
                <div class="cards">
                    <div class="cmpg">
                        <h2>PR001</h2>
                    </div>
                    <div class="dv">
                        <div class="customerName">
                            Product 1<br>
                            Category 1
                        </div>
                        <div class="button view">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-eye"></i></td>
                                    <td><button id="view_btn" class="view-txt">View</button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="button update">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td><button id="update_btn" class="update-txt">Update</button></td>
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
                        <h2>PR002</h2>
                    </div>
                    <div class="dv">
                        <div class="customerName">
                            Product 2<br>
                            Category 2
                        </div>
                        <div class="button view">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-eye"></i></td>
                                    <td><button id="view_btn" class="view-txt">View</button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="button update">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td><button id="update_btn" class="update-txt">Update</button></td>
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
                        <h2>PR003</h2>
                    </div>
                    <div class="dv">
                        <div class="customerName">
                            Product 3<br>
                            Category 3
                        </div>
                        <div class="button view">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-eye"></i></td>
                                    <td><button id="view_btn" class="view-txt">View</button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="button update">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td><button id="update_btn" class="update-txt">Update</button></td>
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
                        <h2>PR004</h2>
                    </div>
                    <div class="dv">
                        <div class="customerName">
                            Product 4<br>
                            Category 4
                        </div>
                        <div class="button view">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-eye"></i></td>
                                    <td><button id="view_btn" class="view-txt">View</button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="button update">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td><button id="update_btn" class="update-txt">Update</button></td>
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
                        <h2>PR005</h2>
                    </div>
                    <div class="dv">
                        <div class="customerName">
                            Product 5<br>
                            Category 5
                        </div>
                        <div class="button view">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-eye"></i></td>
                                    <td><button id="view_btn" class="view-txt">View</button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="button update">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td><button id="update_btn" class="update-txt">Update</button></td>
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

        <!--Popup Form - Add Product-->
    <div class="popup-container" id="popup_container_addProduct">
        <div class="popup-modal">
          <form method="post" action="landingUi.php">
            <label for="productName">Product Name
                <input type="string" id="productName" name="productName" required="required">
            </label>
            <label for="productCategory">Product Category
                <input type="string" id="productCategory" name="productCategory" required="required">
            </label>
            <label for="productCode">Product Code
                <input type="string" id="productCode" name="productCode" required="required">
            </label>
            <label for="buyingPrice">Buying Price(Rs.)
                <input type="number" id="buyingPrice" name="buyingPrice" required="required">
            </label>
            <label for="sellingPrice">Selling Price(Rs.)
                <input type="number" id="sellingPrice" name="sellingPrice" required="required">
            </label>
            <label for="quantity">Quantity
                <input type="number" id="quantity" name="quantity" required="required">
            </label>
            <button class="cancel" id="close" type="reset" value="Reset">Cancel</button>
            <button class="submit" id="save" type="submit" value="Submit" name="submit">Save</button>
          </form>
        </div>
      </div>

    <!-- Navigation Arrows -->
    <div class="navigation-table" id="nav_table">
        <i class="fa-solid fa-circle-chevron-left fa-lg"></i>
        <i class="fa-solid fa-circle-chevron-right fa-lg"></i>
    </div>

      <!--Popup Form - View Product Details-->
      <div class="popup-container" id="popup_container_view"> 
            <div class="popup-modal">
              <form>
                <fieldset id="form_field">
                <label for="productName">Product Name
                <input type="string" id="productName" name="productName" required="required" value="Product 1">
                </label>
                <label for="productCategory">Product Category
                    <input type="string" id="productCategory" name="productCategory" required="required" value="Cat 1">
                </label>
                <label for="productCode">Product Code
                    <input type="string" id="productCode" name="productCode" required="required" value="PR002">
                </label>
                <label for="buyingPrice">Buying Price(Rs.)
                    <input type="number" id="buyingPrice" name="buyingPrice" required="required" value="1000.00">
                </label>
                <label for="sellingPrice">Selling Price(Rs.)
                    <input type="number" id="sellingPrice" name="sellingPrice" required="required" value="1500.00">
                </label>
                <label for="quantity">Quantity
                    <input type="number" id="quantity" name="quantity" required="required" value="56">
                </label>
                </fieldset>
                  
                <label class="sp-label">
                    <button class="cancelOne" id="close">Cancel</button>
                </label>  
              </form>
            </div>
        </div>

        <!--Popup Form - Delete-->
        <div class="popup-container" id="popup_container_delete">
            <div class="popup-modal">
            <form method="post">
                <p>Do you want to delete product?</p>
                <button class="cancel" id="close_delete" type="reset" value="Reset">Cancel</button>
                <button class="submit" id="save_delete" type="submit" value="Submit" name="submit">Delete</button>
            </form>
            </div>
        </div>

      <script>
        const product_btn = document.getElementById('product_btn');
        const view_btn = document.getElementById('view_btn');
        const update_btn = document.getElementById('update_btn');
        const delete_btn = document.getElementById('delete');

        const close = document.getElementById('close');
        const save = document.getElementById('save');
        const close_delete = document.getElementById('close_delete');
        const save_delete = document.getElementById('save_delete');

        const popup_container_addProduct = document.getElementById('popup_container_addProduct');
        const popup_container_view = document.getElementById('popup_container_view');
        const form_field = document.getElementById('form_field');
        const popup_container_delete = document.getElementById('popup_container_delete');

        view_btn.addEventListener('click', () => {
                popup_container_view.classList.add('show');
                form_field.setAttribute('disabled', true);
        });

        update_btn.addEventListener('click', () => {
                popup_container_view.classList.add('show');
        });

        product_btn.addEventListener('click', () => {
            popup_container_addProduct.classList.add('show');
        });

        view_btn.addEventListener('click', () => {
            popup_container_view.classList.add('show');
        });

        delete_btn.addEventListener('click', () => {
            popup_container_delete.classList.add('show');
        });

        close.addEventListener('click', () => {
            popup_container_addProduct.classList.remove('show');
        });

        close.addEventListener('click', () => {
            popup_container_view.classList.remove('show');
        });

        close_delete.addEventListener('click', () => {
            popup_container_delete.classList.remove('show');
        });

        // close.addEventListener('click', () => {
        //     popup_container_update.classList.remove('show');
        // });

        save.addEventListener('click', () => {
            popup_container_addProduct.classList.remove('show');
        });

        save_delete.addEventListener('click', () => {
            popup_container_delete.classList.remove('show');
        });

    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
  </body>
</html>