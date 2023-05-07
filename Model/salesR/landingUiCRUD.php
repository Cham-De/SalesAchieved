<?php
    require __DIR__.'/../connect.php';
    $query = "SELECT * FROM user";
    $userData = mysqli_query($con, $query);
    if (mysqli_error($con)) {
        echo "Failed to connect to MySQL: " . mysqli_error($con);
        exit();
    }

    function getSalesPerRep($username){
        $con = $GLOBALS['con'];
        $query = "SELECT SUM(product.sellingPrice * order_product.quantity) AS totalRevenue
                    FROM orders
                    INNER JOIN order_product ON orders.orderID = order_product.orderID
                    INNER JOIN product ON product.productCode = order_product.productCode
                    WHERE MONTH(orderDate) = MONTH(now()) && YEAR(orderDate) = YEAR(now())";
        $result = mysqli_query($con, $query);
        if(mysqli_error($con)){
            echo "Failed to connect to MYSQL: " . mysqli_error($con);
            exit();
        }
        $row = mysqli_fetch_array($result);
        $totalRevenue = $row["totalRevenue"];

        $query = "SELECT COUNT(*) AS numberOfSales
                    FROM orders
                    WHERE username = \"$username\" && MONTH(orderDate) = MONTH(now()) && YEAR(orderDate) = YEAR(now())
                    GROUP BY username";
        $result = mysqli_query($con, $query);
        if(mysqli_error($con)){
            echo "Failed to connect to MYSQL: " . mysqli_error($con);
            exit();
        }
        $row = mysqli_fetch_array($result);
        $numberOfSales = $row["numberOfSales"];
        return $totalRevenue / $numberOfSales;
    }
?>