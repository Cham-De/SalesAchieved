<?php
    function getOrderDetails($username){
        $query = "SELECT orders.orderID as orderID, orderDate, SUM(product.sellingPrice * order_product.quantity) as revenue
                    FROM orders
                        INNER JOIN order_product ON orders.orderID = order_product.orderID
                        INNER JOIN product ON order_product.productCode = product.productCode
                    WHERE username = \"$username\"
                    GROUP BY orders.orderID";
        $result = mysqli_query($GLOBALS['con'], $query);
        if (mysqli_error($GLOBALS['con'])) {
            echo "Failed to connect to MySQL: " . mysqli_error($GLOBALS['con']);
            exit();
        }
        return $result;
    }
    
?>