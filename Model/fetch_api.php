<?php

require 'db-con.php';
// require_once __DIR__ . '../../vendor/autoload.php'; // Replace with your own path to the Google API client library
require_once __DIR__ . '../../vendor/autoload.php';


use Google\Client;
use Google\Service\Sheets;

// Set up the Google API client
$client = new Google_Client();
$client->setApplicationName('My PHP Application');
$client->setAuthConfig('./credentials.json');
$client->addScope(Sheets::SPREADSHEETS_READONLY);

// Authenticate with the Google Sheets API
$service = new Sheets($client);

// Get the ID of the Google Sheet you want to access
$spreadsheetId = '1LKHOclSKZwqzim1rMNnhk9q-5oNOJV1-Vcuo6uUZy8w';

// Define the range of data you want to retrieve
// $range = 'Sheet1!A2:L2';

$sheetName = 'Form Responses 1'; // Replace with the name of your sheet

$range = $sheetName . '!A2:L';
// $lastRow = $service->spreadsheets_values->get($spreadsheetId, $range)->getLastRow();

// $range = $sheetName . '!A2:D' . $lastRow;

// Make the API request to retrieve the data
$response = $service->spreadsheets_values->get($spreadsheetId, $range);

// Print out the retrieved data
$values = $response->getValues();
if (empty($values)) {
    print "No data found.\n";
} else {
    $lastRow = count($values) - 1; // Calculate the last row
    $row = $values[$lastRow];
    // print implode("\t", $row) . "\n";

    $existingCustomer = $row[2];
    $canRememberEmail = $row[3];
    $checkEmail = $row[4];
    $name = $row[5];
    $phone = $row[6];
    $address = $row[7];
    $email = $row[8];

    if ($existingCustomer == "No" || $canRememberEmail == "No"){
        $sql = "INSERT INTO customer (customerName, phone, address, email) VALUES ('$name', '$phone', '$address', '$email')";
        mysqli_query($con, $sql);
        $customerID = $con->insert_id;
    }
    else {
        $sql = "SELECT customerID FROM customer WHERE email = '$checkEmail'";
        $res = mysqli_query($con, $sql);
        $customerID = $res["customerID"];
    }

    $productStr = $row[9];
    $productEntries = explode("\n", $productStr);
    $productList = [];
    foreach ($productEntries as $entry){
        $productDetails = explode(" - ", $entry);
        $productList[] = $productDetails;
    }

    $paymentMethod = $row[10] == "Bank Transfer" ? "BT" : "COD";
    if (str_starts_with($row[11], "Within Colombo")){
        $deliveryRegion = "Within Colombo";
    }
    else if (str_starts_with($row[11], "Colombo Suburbs")){
        $deliveryRegion = "Colombo Suburbs";
    }
    else {
        $deliveryRegion = "Out of Colombo";
    }
    
    $sql = "INSERT INTO orders (customerID, paymentMethod, deliveryRegion) VALUES ('$customerID', '$paymentMethod', '$deliveryRegion')";
    mysqli_query($con, $sql);
    $orderID = $con->insert_id;
    
    foreach ($productList as $product){
        $productCode = $product[0];
        $productQuantity = $product[1];
        $sql = "INSERT INTO order_product (orderID, productCode, quantity) VALUES ('$orderID', '$productCode', '$productQuantity')";
        mysqli_query($con, $sql);
    }
}
