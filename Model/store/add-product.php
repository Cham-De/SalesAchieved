<?php

require_once(__DIR__ . '/connect-db.php');

if (!(isset($_POST['submit']) && $_POST['submit'] == "add-product")) {
    return;
}

$name = $_POST["p_name"];
$category = $_POST["p_category"];
$code = $_POST["p_code"];
$description = $_POST["description"];
$buying_price = $_POST["p_buying_price"];
$selling_price = $_POST["p_selling_price"];
$qty = $_POST["p_qty"];
$buffer_quantity = $_POST["buffer_quantity"];
$damaged_goods = $_POST["damaged_goods"];
$min_qty_treshold = $_POST["p_min_qty_treshold"];


unset($_POST);

$sql = "INSERT INTO product(productName, productCategory, productCode, productDescription, buyingPrice, sellingPrice, quantity, bufferQuantity, damagedGoods, minQuantityTreshold) values('$name', '$category', '$code', '$description', '$buying_price', '$selling_price', '$qty', '$buffer_quantity','$damaged_goods', '$min_qty_treshold')";


try {
    // check quantity & min_quantity_treshold
    if ($min_qty_treshold > $qty) {
        throw new Exception("'Min Quantity Treshold' must be less or equal than to the 'Quantity'");
    }

    $conn->query($sql);
    echo '
    <script>
    alert("✅ Product added successfully");
    window.location.href="' . APP_CONTROLLER_PATH . '/store/stocks"; 
    </script>';
} catch (Exception $e) {
    echo '<script>alert("Unable to add product due to an error: ' . $e->getMessage() . '")</script>';
}
