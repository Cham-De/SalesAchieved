<?php

require_once(__DIR__ . '/connect-db.php');

if (isset($_POST['submit']) && $_POST['submit'] == "update-order") {
    $id = $_POST["o_id"];
    $today = "'" . date("Y-m-d") . "'";

    $products_sql = 'SELECT * FROM `order_product` WHERE orderId="' . $id . '"';
    $products_results = $conn->query($products_sql);
    $products = array();
    $agent = isset($_POST['agent']) ? _POST['agent'] : NULL;

    while ($product = mysqli_fetch_assoc($products_results)) {
            array_push($products, $product);
    }
    unset($_POST);

    $sql = "UPDATE orders SET orderStatus='Dispatched', dispatchDate=$today WHERE orderID=$id";

    try {
        $conn->query($sql);
        // update stock levels
        foreach ($products as $p) {
            $p_sql = 'UPDATE product SET count=count - ' . $p['quantity'] . ' WHERE productCode="' . $p["productCode"] . '"';
            $conn->query($p_sql);
        }
        echo '
        <script>
        alert("✅ Order updated successfully");
        window.location.href="' . APP_CONTROLLER_PATH . '/store/orders";
        </script>';
    } catch (mysqli_sql_exception $e) {
        echo '<script>alert("Unable to update order due to an error: ' . $conn->error . '")</script>';
    }
}
else if (isset($_POST['agent'])) {
    $id = $_POST["o_id"];
    $agent = $_POST['agent'];
    $sql = "INSERT INTO request (orderID, agentUsername) values ('$id', '$agent')";

    try {
        $conn->query($sql);
        echo '
        <script>
        alert("✅ Order updated successfully");
        window.location.href="' . APP_CONTROLLER_PATH . '/store/orders";
        </script>';
    } catch (mysqli_sql_exception $e) {
        echo '<script>alert("Unable to update order due to an error: ' . $conn->error . '")</script>';
    }
}


