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
$spreadsheetId = '1Bw8gRbFmrKynwgjXpUlAVFzJywAhXL2LYfLVMZLQqVk';

// Define the range of data you want to retrieve
$range = 'Sheet1!A2:C3';

// Make the API request to retrieve the data
$response = $service->spreadsheets_values->get($spreadsheetId, $range);

// Print out the retrieved data
$values = $response->getValues();
if (empty($values)) {
    print "No data found.\n";
} else {
    foreach ($values as $row) {
        // print implode("\t", $row) . "\n";

        $column1 = $row[0];
        $column2 = $row[1];
        $column3 = $row[2];

        echo "Column 1: $column1, Column 2: $column2, Column 3: $column3 <br>";
        $sql = "INSERT INTO sheets_data (custID, email) VALUES ('$column2', '$column3')";

        $query = mysqli_query($con, $sql);
    }
}
