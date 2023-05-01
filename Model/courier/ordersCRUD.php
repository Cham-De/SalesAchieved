<?php
    function getOrderDetails($agentUsername){
        $query = "SELECT * FROM orders 
                    INNER JOIN customer ON orders.customerID = customer.customerID
                    LEFT JOIN slips ON orders.orderID = slips.orderID
                    WHERE agentUsername = \"$agentUsername\"";
        $result = mysqli_query($GLOBALS['con'], $query);
        if (mysqli_error($GLOBALS['con'])) {
            echo "Failed to connect to MySQL: " . mysqli_error($GLOBALS['con']);
            exit();
        }
        return $result;
    }
?>