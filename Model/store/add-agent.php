<?php

require_once(__DIR__ . '/connect-db.php');

if (!(isset($_POST['submit']) && $_POST['submit'] == "add-agent")) {
    return;
}

$company_name = $_POST["a_company_name"];
$phone_no = $_POST["a_phone_no"];
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];

unset($_POST);

$sql = "INSERT INTO agent(companyName, email, phone, agentUsername, password) values('$company_name', '$email', '$phone_no', '$username', '$password')";


try {
    $conn->query($sql);
    echo '
    <script>
    alert("✅ Agent added successfully");
    window.location.href="' . APP_CONTROLLER_PATH . '/store/agents";
    </script>';
} catch (mysqli_sql_exception $e) {
    echo '<script>alert("Unable to add agent due to an error: ' . $conn->error . '")</script>';
}
