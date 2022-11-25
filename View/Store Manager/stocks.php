<?php
    include 'connect.php';

if(isset($_POST['submit'])){
    $pname=$_POST['productname'];
    $pcategory=$_POST['productcategory'];
    $pcode=$_POST['productcode'];
    $bprice=$_POST['buyingprice'];
    $sprice=$_POST['sellingprice'];
    $quantity=$_POST['Quantity'];
    $sql="insert into add_product (ProductName,ProductCategory,ProductCode,BuyingPrice, SellingPrice, Quantity) 
	values('$pname','$pcategory','$pcode','$bprice','$sprice','$quantity')";
    $result=mysqli_query($con,$sql);
    if($result){
        echo "Data inserted successfully";
    }else{
        die(mysqli_error($con));
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Manager</title>
    <link rel="stylesheet" href="common.css">
    <link rel="stylesheet" href="prop.css">
    <link rel="stylesheet" href="stocks.css">
    <style>
        .AddP-popup{
            background-color: rgba(0,0,0,0.3);
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    width: 100vw;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    pointer-events: none;
}

.AddP-popup.show{
    pointer-events: auto;
    opacity: 1;
}

.AP-popup{
    background-color: #ffff;
    border-radius: 15px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    padding: 30px 50px;
    height: 95%;
    max-width: 100%;
    text-align: center;
}

.AP-popup input, select{
    width: 100%;
    display: inline-block;
    padding: 12px 20px 12px 10px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}
.AP-popup .title{
    display: flex;
}
.AP-popup .title h2{
    margin-top: px;
}
.AP-popup label, input{
    display: block;
}
.AP-popup label{
    margin-bottom: 20px;
    color: rgb(133, 134, 134);
}
.AP-popup input{
    color: black;
}
.cancel, .submit{
    display: inline-block;
    margin-left: 5px;
    border-radius: 15px;
    cursor: pointer;
}
.cancel{
    border: 2px solid #F8914A;
    color: #F8914A;
    background: #FFFFFF;
    padding: 13px 30px;
    margin-right: 30px;
    margin-left: 40px;
}

.submit{
    background: #F8914A;
    border: none;
    color: #FFFFFF;
    padding: 15px 40px;
}
.submit:hover{
    background: #fa7e2b;
}
.cancel{
    margin-left: 30px;
    margin-bottom: 1px;
}
.submit{
    margin-left: 5px;
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
                  <a><i class="fa-solid fa-magnifying-glass"></i></a>
                </td>
              </tr>
            </table>
          </div>
        <div class="user-wrapper">
            <img src="man.png" width="50px" height="50px" alt="user image">
            <div>
                <h4>John Doe</h4>
                <small>Store Manager</small>
            </div>
        </div>
    </div>
    <div class="side_bar">
        <div class="logo">
            <img src="logosales.jpeg" width= "65%" height="55%">
        </div>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li class="active"><a href="stocks.php">Stocks</a></li>
            <li><a href="orders.html">Orders</a></li>
            <li><a href="agents.html">Agents</a></li>
            <li>
                <table class="side-bar-icons">
                    <tr>
                      <td><i class="fa-regular fa-circle-user"></i></td>
                      <td><a href="profile.html">Profile</a></td>
                    </tr>
                    <tr>
                      <td><i class="fa-solid fa-arrow-right-from-bracket"></i></i></td>
                      <td><a href="#">Log out</a></td>
                    </tr>
                  </table>
            </li>
        </ul>
    </div>

    <div class="search_wrapper1">
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
      
      
      <button id="add_products" class="addProduct" style="background:rgb(235, 137, 58); color: #FFFFFF; border: none; padding: 10px 30px; cursor: pointer;
        border-radius: 15px; height: 55px; margin-left: 750px; margin-top: 25px;">Add Product</button>
  </div>
   
<!--cards-->
<?php 
            $query = "SELECT * FROM add_product";
            $result = mysqli_query($con, $query);

            if(mysqli_num_rows($result) > 0)
            {
                foreach($result as $productdetails)
                {
  ?>
  <div class="cards-middle" id="cards_middle">
  <div class="middle-cards">
    <li>
        <div class="cards">
          <div class="cmpg"><h2><?= $productdetails['ProductCode']; ?></h2></div>
          <div class="cmpg"><h4 style="color: #808080;"><?= $productdetails['ProductName']; ?></h4></div>
          <div class="cmpg"><h4 style="color: #808080;"><?= $productdetails['ProductCategory']; ?></h4></div>
            <div class="dv">
            <div class="view-button" id="view_button">
              <table>
                <tr>
                  <td><i class="fa-solid fa-eye"></i></td>
                  <td><button id="products" class="prod">View </a></button></td>
                </tr>                  
              </table>
            </div>

            <div class="update-button" id="update_button">
              <table>
                <tr>
                  <td><i class="fa-solid fa-pen-to-square"></i></td>
                  <td><button id="products" class="prod">Update</a></button></td>
                </tr>                  
              </table>
            </div>

            <div class="delete-button">
              <table>
                <tr>
                  <td><i class="fa-solid fa-trash"></i></td>
                  <td><button id="products" class="prod">Delete</a></button></td>
                </tr>                  
              </table>
            </div>
          </div>                    
        </div>
    </li>

    <?php
                }
            }
            else
            {
                echo "<h3> No Products Found </h4>";
            }
        ?>
  
    <div class="navigation-table" id="nav_table">
      <i class="fa-solid fa-circle-chevron-left fa-lg"></i>
      <i class="fa-solid fa-circle-chevron-right fa-lg"></i>
    </div>

  </div>



<!--Popup_update-->
  <div class="modal-containerU" id="modal_containerU">
    <div class="modalU">
      <form action="#" method="post">
        <label for="name" class="title"><h3 style="color: rgb(0,0,0); margin-top: 3px; margin-right:10px; margin-bottom: 20px;">Product ID: 12</h3> 
        </label>
        <label for="product-name">Product Name
          <input type="text" id="p-name">
        </label>
        <label for="product-category">Product Category
          <select id="p-category">
              <option value="cat1">Cat 1</option>
              <option value="cat2">Cat 2</option>
              <option value="cat3">Cat 3</option>
              <option value="cat4">Cat 4</option>
          </select>
        </label>
        <label for="product-code">Product Code
          <input type="text" id="p-code">
        </label>
        <label for="buyingP">Buying Price(Rs.)
          <input type="text" id="buying-price">
        </label>
        <label for="sellingP">Selling Price(Rs.)
          <input type="text" id="selling-price">
        </label>

        <button class="cancel" id="close" type="reset" value="Reset">Cancel</button>
        <button class="submit" id="update" type="submit" value="Submit">Update</button>
      </form>
      
    </div>
  </div>

  <script>
        const update_button = document.getElementById('update_button');
        const modal_containerU = document.getElementById('modal_containerU');
        const close = document.getElementById('close');
        
        update_button.addEventListener('click', () => {
            modal_containerU.classList.add('show');
        });

        close.addEventListener('click', () => {
            modal_containerU.classList.remove('show');
        });

        update.addEventListener('click', () => {
            modal_containerU.classList.remove('show');
        });
  </script>

<!--Popup_View-->
<div class="modal-containerV" id="modal_containerV">
  <div class="modalV">
    <h3 class="heading3" style="color: rgb(0,0,0); margin-top: 3px; margin-right:10px; margin-bottom: 20px;">Product ID: 12</h3> 
      <h5 class="title">Product Name</h5>
      <h5 class="answer">Product 1</h5>
      <h5 class="title">Product Category</h5>
      <h5 class="answer">Cat 1</h5>
      <h5 class="title">Product Code</h5>
      <h5 class="answer">PR001</h5>
      <h5 class="title">Buying Price (Rs.)</h5>
      <h5 class="answer">1,200.00</h5>
      <h5 class="title">Selling Price (Rs.)</h5>
      <h5 class="answer">2,400.00</h5>
      <h5 class="title">Quantity</h5>
      <h5 class="answer">56</h5>
      
      <button class="cancelV" id="closeV" type="reset" value="Reset">Cancel</button>
  </div>
</div>

<script>
      const view_button = document.getElementById('view_button');
      const modal_containerV = document.getElementById('modal_containerV');
      const closeV = document.getElementById('closeV');
      
      view_button.addEventListener('click', () => {
          modal_containerV.classList.add('show');
      });

      closeV.addEventListener('click', () => {
          modal_containerV.classList.remove('show');
      });
</script>

<div class="AddP-popup" id="AddP_popup">
    <div class="AP-popup">
      <form action="stocks-addProduct.php" method="post">
        <label for="pname">Product Name
          <input type="text" id="pname" name="productname" placeholder="Product Name...">
        </label>
        <label for="pcategory">Product Category
            <input type="text" id="pcategory" name="productcategory" placeholder="Product Category..."> 
        </label>
        <label for="pcode">Product Code
          <input type="text" id="pcode" name="productcode" placeholder="Product Code...">
        </label>
        <label for="bprice">Buying Price
          <input type="text" id="bprice" name="buyingprice" placeholder="Buying Price...">
        </label>
        <label for="sprice">Selling Price
          <input type="text" id="sprice" name="sellingprice" placeholder="Selling Price...">
        </label>
        <label for="quantity">Quantity
            <input type="text" id="quantity" name="Quantity" placeholder="Quantity...">
        </label>

        <button class="submit" id="submit" type="submit" value="submit" name="submit">Submit</button>
        <button class="cancel" id="close" type="reset" value="Reset">Cancel</button>
        </form>
      
    </div>
    </div>


  <script>
        const add_products = document.getElementById('add_products');
        const AddP_popup = document.getElementById('AddP_popup');
        const close = document.getElementById('close');
        
        add_products.addEventListener('click', () => {
            AddP_popup.classList.add('show');
        });

        close.addEventListener('click', () => {
            AddP_popup.classList.remove('show');
        });

        submit.addEventListener('click', () => {
            AddP_pop.classList.remove('show');
        });
  </script>

</body>
</html>

<script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>