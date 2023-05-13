<?php
    require __DIR__.'/../connect.php';

    $agentUsername = $_SESSION['username'];
    $query = "SELECT * FROM orders
                INNER JOIN slips ON slips.orderID = orders.orderID
                INNER JOIN order_product ON orders.orderID = order_product.orderID
                WHERE agentUsername = '$agentUsername'";
    $result = mysqli_query($con, $query);
    if(mysqli_error($con)){
        echo "Failed to connect to MYSQL: " . mysqli_error($con);
        exit();
    }

    function getRevenue($agentUsername){
        $query = "SELECT orders.orderID as orderID, SUM(product.sellingPrice * order_product.quantity) as revenue
                    FROM orders
                    INNER JOIN order_product ON orders.orderID = order_product.orderID
                    INNER JOIN product ON order_product.productCode = product.productCode
                    WHERE agentUsername = \"$agentUsername\"
                    GROUP BY orders.orderID";
        $result = mysqli_query($GLOBALS['con'], $query);
        if (mysqli_error($GLOBALS['con'])) {
            echo "Failed to connect to MySQL: " . mysqli_error($con);
            exit();
        }
        $row = mysqli_fetch_array($result);
        $revenue = $row['revenue'];
        return $revenue;
    }
?>