<?php
require_once(__DIR__ . './connect-db.php');
require_once('../_inc/config.php');

if (!isset($_GET['id'])) {
    return;
}

$id = $_GET['id'];

try {
    $sql = "delete from stocks where id=$id";
    $conn->query($sql);
    echo '
    <script>
    alert("✅ Product deleted successfully");
    window.location.href="' . $GLOBALS["store_path"] . '/stocks";
    </script>';
} catch (mysqli_sql_exception $e) {
    echo '
    <script>
    alert("Unable to delete product due to an error: ' . $conn->error . '");
    window.location.href="' . $GLOBALS["store_path"] . '/stocks";
    </script>';
}
