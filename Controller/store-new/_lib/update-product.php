<?php

require_once(__DIR__ . './connect-db.php');

if (!(isset($_POST['submit']) && $_POST['submit'] == "update-product")) {
    return;
}

$id = $_POST["id"];
$name = $_POST["name"];
$category = $_POST["category"];
$code = $_POST["code"];
$buying_price = $_POST["buying_price"];
$selling_price = $_POST["selling_price"];
$qty = $_POST["qty"];

unset($_POST);

$sql = "UPDATE stocks SET productName='$name', productCategory='$category', productCode='$code', buyingPrice='$buying_price', sellingPrice='$selling_price', quantity='$qty' WHERE id=$id";


try {
    $conn->query($sql);
    echo '
    <script>
    alert("✅ Product updated successfully");
    window.location.href="' . $GLOBALS["store_path"] . '/stocks";
    </script>';
} catch (mysqli_sql_exception $e) {
    echo '<script>alert("Unable to update product due to an error: ' . $conn->error . '")</script>';
}
