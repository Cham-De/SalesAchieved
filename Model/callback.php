<?php
require_once __DIR__ . '../../Facebook/autoload.php';

use Facebook\Facebook;

$fb = new Facebook([
  'app_id' => '{170446615651981}',
  'app_secret' => '{5baf1fb72890d09619956fb9366f2581}',
  'default_graph_version' => 'v12.0',
  // add any additional configuration options here
]);

// obtain a Page Access Token with the necessary permissions
$pageAccessToken = '{your-page-access-token}';

// query the insights data for the Facebook page
$response = $fb->get('/{page-id}/insights?metric={metric}&access_token=' . $pageAccessToken);

// retrieve the insights data from the response
$insightsData = $response->getDecodedBody();

// update your system's dashboard with the new data
// ...
?>