<?php
    function getOrderDetails($username, $curDate){
        $query = "SELECT orders.orderID as orderID, completionDate, SUM(product.sellingPrice * order_product.quantity) as revenue
                    FROM orders
                        INNER JOIN order_product ON orders.orderID = order_product.orderID
                        INNER JOIN product ON order_product.productCode = product.productCode
                    WHERE username = \"$username\" && orderStatus = \"Completed\" && MONTH(completionDate) = MONTH('$curDate') && YEAR(completionDate) = YEAR('$curDate')
                    GROUP BY orders.orderID";
        $result = mysqli_query($GLOBALS['con'], $query);
        if (mysqli_error($GLOBALS['con'])) {
            echo "Failed to connect to MySQL: " . mysqli_error($GLOBALS['con']);
            exit();
        }
        return $result;
    }

    function getCommissionRate() {
        $query = "SELECT * FROM commissions";
        $result = mysqli_query($GLOBALS['con'], $query);
        if (mysqli_error($GLOBALS['con'])) {
            echo "Failed to connect to MySQL: " . mysqli_error($GLOBALS['con']);
            exit();
        }

        $commRates = [];
        while ($row = mysqli_fetch_array($result)){
            $commRates[substr($row["commDate"], 0, 7)] = $row["commRate"];
        }

        return $commRates;
    }
    
?>