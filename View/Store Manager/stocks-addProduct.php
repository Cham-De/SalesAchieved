<?php
include 'connect.php';
include 'stocks.php';
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
    <title>Add Product</title>
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
    <!--
        <div class="addP-form">
        <form action="stocks-addProduct.php" method="post">
            <label for="pname">Product Name</label>
            <input type="text" id="pname" name="productname" placeholder="Product Name...">

            <label for="pcategory">Product Category</label>
            <input type="text" id="pcategory" name="productcategory" placeholder="Product Category...">

            <label for="pcode">Product Code</label>
            <input type="text" id="pcode" name="productcode" placeholder="Product Code...">

            <label for="bprice">Buying Price</label>
            <input type="text" id="bprice" name="buyingprice" placeholder="Buying Price...">

            <label for="sprice">Selling Price</label>
            <input type="text" id="sprice" name="sellingprice" placeholder="Selling Price...">

            <label for="quantity">Quantity</label>
            <input type="text" id="quantity" name="Quantity" placeholder="Quantity...">

            <input type="submit" value="Submit" name="submit" class="submit-btn">
        </form>
    </div>
    -->
    

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