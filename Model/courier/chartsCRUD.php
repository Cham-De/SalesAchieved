<?php
    require __DIR__.'/../connect.php';

    $agentUsername = $_SESSION['username'];
    $query = "SELECT orderStatus, COUNT(*) AS orderStatusCount
                FROM orders
                WHERE agentUsername = '$agentUsername'
                GROUP BY orderStatus";
    $result =  mysqli_query($con, $query);
    if(mysqli_error($con)){
        echo "Failed to connect to MYSQL: " . mysqli_error($con);
        exit();
    }
    // $row = mysqli_fetch_array($result);
    // $orderStatusCount = $row["orderStatusCount"];
    // $orderStatus = $row["orderStatus"];

    $label = [];
    $data = [];

    if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            $label[] = $row['orderStatus'];
            $data[] = $row['orderStatusCount'];
        }
    }
?>