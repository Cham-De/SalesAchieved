<?php
    require_once("../../Model/store/addProductCRUD.php");
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
    <!--Stylesheet for quick actions buttons-->
    <link rel="stylesheet" href="../../View/styles/quickActions.css">
    <!--Stylesheet for customer cards-->
    <link rel="stylesheet" href="../../View/styles/cards.css">
    <!--Stylesheet for Buttons-->
    <link rel="stylesheet" href="../../View/styles/buttons.css">
    <!--Stylesheet for table navigation buttons-->
    <link rel="stylesheet" href="../../View/styles/navButtons.css">
    <!--Stylesheet for popup form-->
    <link rel="stylesheet" href="../../View/styles/popupForm.css">
    

    <style>
      div.side_bar ul li{
        padding-top: 8%;
        padding-bottom: 8%;
    }

    .side-bar-icons{
      margin-top: 15%;
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
              <small>Store Manager</small>
          </div>
      </div>
  </div>

  <div class="side_bar">
      <div class="logo">
          <img src="../../View/assets/saleslogo-final.png" width="65%" height="55%">
      </div>
      <ul>
          <li><a href="landingUi.php"><i class="fa-solid fa-house"></i>Home</a></li>
          <li class="active"><a href="stocksUi.php"><i class="fa-solid fa-warehouse"></i>Stocks</a></li>
          <li><a href="ordersUi.php"><i class="fa-solid fa-file-circle-check"></i>Orders</a></li>
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

    <!--Top right corner buttons-->
    <div class="btn_three">
        <button id="product_btn">Add Product</button>
    </div>


       <!--Customer Cards-->
       <?php
        $sql="Select * from stocks";
        $result=mysqli_query($con,$sql);
        if($result){
            while($row=mysqli_fetch_assoc($result)){
                $id=$row['id'];
                $productName=$row['productName'];
                $productCategory=$row['productCategory'];
                $productCode=$row['productCode'];
                $buyingPrice=$row['buyingPrice'];
                $sellingPrice=$row['sellingPrice'];
                $quantity=$row['quantity']; 
                echo '
               <div class="cards-middle" id="cards_middle">
                <ul class="middle-cards">
                    <li>
                        <div class="cards">
                            <div class="cmpg">
                                <h2>'.$productCode.'</h2>
                            </div>
                        <div class="dv">
                            <div class="customerName">
                                '.$productName.'<br>
                                '.$productCategory.'
                        </div>
                        <div class="button view">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-eye"></i></td>';
                                    ?>
                                    <!-- <td><button onclick="viewPopup(`$productName`)" class="view-txt" >View</button></td> -->
                                    <td><button class="view-txt" onclick='viewPopup(
                                        <?php  echo "`$productName`, `$productCategory`, `$productCode`, `$buyingPrice`, `$sellingPrice`, `$quantity`" ?>
                                    )'>View</button></td>
                       
                       <?php echo '
                                </tr>
                            </table>
                        </div>
                        <div class="button update">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-pen-to-square"></i></td>';
                                    ?>
                                    <!-- <td><button onclick="viewPopup(`$productName`)" class="view-txt" >View</button></td> -->
                                    <td><button class="view-txt" onclick='updateButton(
                                        <?php  echo "`$productName`, `$productCategory`, `$productCode`, `$buyingPrice`, `$sellingPrice`, `$quantity`" ?>
                                    )'>Update</button></td>
                       
                       <?php echo '
                                </tr>
                            </table>
                        </div>
                        <div class="button delete">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-trash"></i></td>';
                                    ?>
                                    <td><button id="delete" class="delete-txt"><a href="../../Model/store/addProductCRUD.php?deleteid='.$id.'">Delete</a></button></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </li>
            </ul>
            </div>
            <?php }
        }
    ?>
    
    <!--Popup Form - Add Product-->
    <!-- viewButton('.$productName.', '.$productCategory.', '.$productCode.', '.$buyingPrice.', '.$sellingPrice.', '.$quantity.') -->
    <div class="popup-container" id="popup_container_addProduct">
        <div class="popup-modal">
          <form method="post" action="stocksUi.php">
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
                <!--<fieldset id="form_field">-->
                <label for="productName">Product Name</label>
                <input type="string" id="u_productName" name="productName" required="required" value='' disabled>
                
                <label for="productCategory">Product Category</label>
                    <input type="string" id="u_productCategory" name="productCategory" required="required" value='' disabled>
                
                <label for="productCode">Product Code
                    <input type="string" id="u_productCode" name="productCode" required="required" value='' disabled>
                </label>
                <label for="buyingPrice">Buying Price(Rs.)
                    <input type="number" id="u_buyingPrice" name="buyingPrice" required="required" value='' disabled>
                </label>
                <label for="sellingPrice">Selling Price(Rs.)
                    <input type="number" id="u_sellingPrice" name="sellingPrice" required="required" value='' disabled>
                </label>
                <label for="quantity">Quantity
                    <input type="number" id="u_quantity" name="quantity" required="required" value='' disabled>
                </label>
                <!--</fieldset>-->
                  
                <label class="sp-label">
                    <button class="cancel" id="close">Cancel</button>
                </label>  
              </form>
            </div>
        </div>

        <!--Popup Form - Update Product Details-->
        <div class="popup-container" id="popup_container_update"> 
            <div class="popup-modal">
              <form>
                <!--<fieldset id="form_field">-->
                <label for="productName">Product Name</label>
                <input type="string" id="u_productName" name="productName" required="required" value=''>
                
                <label for="productCategory">Product Category</label>
                    <input type="string" id="u_productCategory" name="productCategory" required="required" value=''>
                
                <label for="productCode">Product Code
                    <input type="string" id="u_productCode" name="productCode" required="required" value=''>
                </label>
                <label for="buyingPrice">Buying Price(Rs.)
                    <input type="number" id="u_buyingPrice" name="buyingPrice" required="required" value=''>
                </label>
                <label for="sellingPrice">Selling Price(Rs.)
                    <input type="number" id="u_sellingPrice" name="sellingPrice" required="required" value=''>
                </label>
                <label for="quantity">Quantity
                    <input type="number" id="u_quantity" name="quantity" required="required" value=''>
                </label>
                <!--</fieldset>-->
                  
                <label class="sp-label">
                    <button class="cancel" id="close">Cancel</button>
                    <button class="submit" id="save">Update</button>
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
        
        const productName = document.getElementById('productName');
        const productCategory = document.getElementById('productCategory');
        const productCode = document.getElementById('productCode');
        const buyingPrice = document.getElementById('buyingPrice');
        const sellingPrice = document.getElementById('sellingPrice');
        const quantity = document.getElementById('quantity');

        const popup_container_addProduct = document.getElementById('popup_container_addProduct');
        const popup_container_view = document.getElementById('popup_container_view');
        const form_field = document.getElementById('form_field');
        const popup_container_delete = document.getElementById('popup_container_delete');

        function viewPopup(productName,productCategory,productCode,buyingPrice,sellingPrice,quantity) {
                popup_container_view.classList.add('show');
                document.getElementById('u_productName').value = productName;
                document.getElementById('u_productCategory').value = productCategory;
                document.getElementById('u_productCode').value = productCode;
                document.getElementById('u_buyingPrice').value = buyingPrice;
                document.getElementById('u_sellingPrice').value = sellingPrice;
                document.getElementById('u_quantity').value = quantity;
            }

        function updateButton(productName, productCategory, productCode, buyingPrice, sellingPrice, quantity) {
                popup_container_view.classList.add('show');
                document.getElementById('u_productName').value = productName;
                document.getElementById('u_productCategory').value = productCategory;
                document.getElementById('u_productCode').value = productCode;
                document.getElementById('u_buyingPrice').value = buyingPrice;
                document.getElementById('u_sellingPrice').value = sellingPrice;
                document.getElementById('u_quantity').value = quantity;
            }
            function click(){
                alert("click");
            }

            function viewButton(productName, productCategory, productCode, buyingPrice, sellingPrice, quantity) {
                alert("click");
                popup_container_view.classList.add('show');
            //     document.getElementById('productName').value = productName;
            //     document.getElementById('productCategory').value = productCategory;
            //     document.getElementById('productCode').value = productCode;
            //     document.getElementById('buyingPrice').value = buyingPrice;
            //     document.getElementById('sellingPrice').value = sellingPrice;
            // document.getElementById('quantity').value = quantity;
            }
            // view_btn.addEventListener('click', () => {
            // popup_container_view.classList.add('show');
            // // popup_container_view.classList.add('show');
            //     document.getElementById('productName').value = "product";
            //     document.getElementById('productCategory').value = productCategory;
            //     document.getElementById('productCode').value = productCode;
            //     document.getElementById('buyingPrice').value = buyingPrice;
            //     document.getElementById('sellingPrice').value = sellingPrice;
            //     document.getElementById('quantity').value = quantity;
            
            // });

            
        product_btn.addEventListener('click', () => {
            popup_container_addProduct.classList.add('show');
        });

        close.addEventListener('click', () => {
            popup_container_addProduct.classList.remove('show');
        });

        // view_btn.addEventListener('click', () => {
        //         popup_container_view.classList.add('show');
        //         form_field.setAttribute('disabled', true);
        // });

        // update_btn.addEventListener('click', () => {
        //         popup_container_view.classList.add('show');
        // });

        // view_btn.addEventListener('click', () => {
        //     popup_container_view.classList.add('show');
        // });

        delete_btn.addEventListener('click', () => {
            popup_container_delete.classList.add('show');
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