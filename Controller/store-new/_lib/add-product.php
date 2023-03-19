<?php

require_once(__DIR__ . './connect-db.php');

if (!(isset($_POST['submit']) && $_POST['submit'] == "add-product")) {
    return;
}

$name = $_POST["p_name"];
$category = $_POST["p_category"];
$code = $_POST["p_code"];
$buying_price = $_POST["p_buying_price"];
$selling_price = $_POST["p_selling_price"];
$qty = $_POST["p_qty"];

unset($_POST);

$sql = "INSERT INTO stocks(productName, productCategory, productCode, buyingPrice, sellingPrice, quantity) values('$name', '$category', '$code', '$buying_price', '$selling_price', '$qty')";


try {
    $conn->query($sql);
    echo '
    <script>
    alert("✅ Product added successfully");
    window.location.href="' . $GLOBALS["store_path"] . '/stocks";
    </script>';
} catch (mysqli_sql_exception $e) {
    echo '<script>alert("Unable to add product due to an error: ' . $conn->error . '")</script>';
}
