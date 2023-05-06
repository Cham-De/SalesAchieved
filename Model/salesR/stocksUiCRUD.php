<?php
    require 'connect.php';
    
    //Search bar Functionality
    if(isset($_POST['search'])){
        $productSearch = $_POST['productSearch'];
        $query = "SELECT productCategory, product.productCode, productName, IFNULL(count - SUM(quantity), count) as availableQuantity, sellingPrice 
                    FROM orders
                    INNER JOIN order_product ON orders.orderID = order_product.orderID 
                    RIGHT JOIN product ON product.productCode = order_product.productCode 
                    WHERE (orderStatus = 'Pending' or orderStatus is NULL) AND (productName LIKE \"%$productSearch%\" OR productCategory LIKE \"%$productSearch%\" OR product.productCode LIKE \"%$productSearch%\")
                    GROUP BY product.productCode;";
        $result = mysqli_query($con, $query);
        if (mysqli_error($con)) {
            echo "Failed to connect to MySQL: " . mysqli_error($con);
            exit();
        }
    }

    else{
        $query = "SELECT productCategory, product.productCode, productName, IFNULL(count - SUM(quantity), count) as availableQuantity, sellingPrice 
                    FROM orders
                        INNER JOIN order_product ON orders.orderID = order_product.orderID 
                        RIGHT JOIN product ON product.productCode = order_product.productCode 
                    WHERE orderStatus = 'Pending' or orderStatus is NULL
                    GROUP BY product.productCode;";
        $result = mysqli_query($con, $query);
        if (mysqli_error($con)) {
            echo "Failed to connect to MySQL: " . mysqli_error($con);
            exit();
        }
    }
    
    
?>