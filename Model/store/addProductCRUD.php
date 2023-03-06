<?php
    require 'connect.php';
    $id = null;
    /*Create*/
    if(isset($_POST['submit'])){
        $id=$_POST["id"];
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

    /*Delete*/
    if (isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];

        $sql="delete from stocks where id=$id";
        $result=mysqli_query($con,$sql);
        if($result){
            header("Location:../../Controller/store/stocksUi.php");
        }else{
            die(mysqli_error($con));
        }
    }

    /*Update*/
    if(isset($_GET['updateid'])){
        $id=$_GET['updateid'];
    }
    $sql="SELECT * from stocks where id=$id";
    if(isset($_POST['submit'])){
        $id=$_POST["id"];
        $productName = $_POST["productName"];
        $productCategory = $_POST["productCategory"];
        $productCode = $_POST["productCode"];
        $buyingPrice = $_POST["buyingPrice"];
        $sellingPrice = $_POST["sellingPrice"];
        $quantity = $_POST["quantity"];

        $sql="update stocks set id='$id', productName='$productName', productCategory='$productCategory', productCode='$productCode', buyingPrice='$buyingPrice', sellingPrice='$sellingPrice', quantity='$quantity' where id=$id";
        $result=mysqli_query($con,$sql);
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
?>
