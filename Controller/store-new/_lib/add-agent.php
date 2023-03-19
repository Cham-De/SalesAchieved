<?php

require_once(__DIR__ . './connect-db.php');

if (!(isset($_POST['submit']) && $_POST['submit'] == "add-agent")) {
    return;
}

$company_name = $_POST["a_company_name"];
$phone_no = $_POST["a_phone_no"];
$address = $_POST["a_address"];

unset($_POST);

$sql = "INSERT INTO agent(companyName, phone, address) values('$company_name', '$phone_no', '$address')";


try {
    $conn->query($sql);
    echo '
    <script>
    alert("✅ Agent added successfully");
    window.location.href="' . $GLOBALS["store_path"] . '/agents";
    </script>';
} catch (mysqli_sql_exception $e) {
    echo '<script>alert("Unable to add agent due to an error: ' . $conn->error . '")</script>';
}
