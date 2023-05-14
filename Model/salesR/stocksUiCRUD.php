<?php
    require 'connect.php';
    
    //Search bar Functionality
    if(isset($_POST['search'])){
        $productSearch = $_POST['productSearch'];
        $query = "SELECT productCategory, product.productCode, productName, (count - SUM(case when orderStatus = \"Pending\" then quantity else 0 end)) as availableQuantity, sellingPrice
                    FROM orders 
                    INNER JOIN order_product ON orders.orderID = order_product.orderID 
                    RIGHT JOIN product ON product.productCode = order_product.productCode
                    WHERE productName LIKE \"%$productSearch%\" OR productCategory LIKE \"%$productSearch%\" OR product.productCode LIKE \"%$productSearch%\"
                    GROUP BY product.productCode;";
        $result = mysqli_query($con, $query);
        if (mysqli_error($con)) {
            echo "Failed to connect to MySQL: " . mysqli_error($con);
            exit();
        }
    }

    else{
        $query = "SELECT productCategory, product.productCode, productName, (count - SUM(case when orderStatus = \"Pending\" then quantity else 0 end)) as availableQuantity, sellingPrice
                    FROM orders 
                    INNER JOIN order_product ON orders.orderID = order_product.orderID 
                    RIGHT JOIN product ON product.productCode = order_product.productCode 
                    GROUP BY product.productCode;";
        
        $result = mysqli_query($con, $query);
        if (mysqli_error($con)) {
            echo "Failed to connect to MySQL: " . mysqli_error($con);
            exit();
        }
    }
    
    
?>