<?php
    require 'connect.php';
    if(isset($_POST['submit'])){
        $productName = $_POST["productName"];
        $productCategory = $_POST["productCategory"];
        $productCode = $_POST["productCode"];
        $buyingPrice = $_POST["buyingPrice"];
        $sellingPrice = $_POST["sellingPrice"];
        $quantity = $_POST["quantity"];
        if(!empty($productName) && !empty($productCategory) && !empty($productCode) && !empty($buyingPrice) && !empty($sellingPrice) && !empty($quantity))
		{
			$temp = mysqli_query($con, "INSERT INTO stocks(productName, productCategory, productCode, buyingPrice, sellingPrice, quantity) values('$productName', '$productCategory', '$productCode', '$buyingPrice', '$sellingPrice', '$quantity')");
            header("Location:../../Controller/store/stocksUi.php");
		}
		else
		{
			echo "<script>window.alert('Please enter valid information');</script>";
		}
        unset($_POST);
    }

    $query = "SELECT * FROM stocks;";
    $result = mysqli_query($con, $query);
    if (mysqli_error($con)) {
        echo "Failed to connect to MySQL: " . mysqli_error($con);
        exit();
      }
?>