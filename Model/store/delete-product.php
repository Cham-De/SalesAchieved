<?php
require_once(__DIR__ . '/connect-db.php');
require_once('../../config.php');

if (!isset($_GET['code'])) {
    return;
}

$code = $_GET['code'];

try {
    $sql = "delete from product where productCode='$code'";
    $conn->query($sql);
    echo '
    <script>
    alert("✅ Product deleted successfully");
    window.location.href="' . APP_CONTROLLER_PATH . '/store/stocks";
    </script>';
} catch (mysqli_sql_exception $e) {
    echo '
    <script>
    alert("Unable to delete product due to an error: ' . $conn->error . '");
    window.location.href="' . APP_CONTROLLER_PATH . '/store/stocks";
    </script>';
}
