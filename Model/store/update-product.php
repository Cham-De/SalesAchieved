<?php

require_once(__DIR__ . '/connect-db.php');

if (!(isset($_POST['submit']) && $_POST['submit'] == "update-product")) {
    return;
}

$code = $_POST["p_code"];
$name = $_POST["p_name"];
$category = $_POST["p_category"];
$description = $_POST["description"];
$buying_price = $_POST["p_buying_price"];
$selling_price = $_POST["p_selling_price"];
$qty = $_POST["p_qty"];
$buffer_quantity = $_POST["buffer_quantity"];
$damaged_goods = $_POST["damaged_goods"];
$min_qty_threshold = $_POST["p_min_qty_threshold"];



unset($_POST);

$sql = "UPDATE product SET productName='$name', productCategory='$category', description='$description',buyingPrice='$buying_price', sellingPrice='$selling_price', count='$qty', bufferQuantity='$buffer_quantity', damagedGoods='$damaged_goods', minQuantityThreshold='$min_qty_threshold' WHERE productCode='$code'";


try {
    // check quantity & min_quantity_treshold
    if ($min_qty_threshold > $qty) {
        throw new Exception("'Min Quantity Treshold' must be less or equal than to the 'Quantity'");
    }

    $conn->query($sql);
    echo '
    <script>
    alert("✅ Product updated successfully");
    window.location.href="' . APP_CONTROLLER_PATH . '/store/stocks";
    </script>';
} catch (Exception $e) {
    echo '<script>alert("Unable to update product due to an error: ' . $e->getMessage() . '")</script>';
}
