<?php
    // require __DIR__.'/../../Model/utils.php';
    // require_once("../../Model/salesR/stocksUiCRUD.php");
    // require __DIR__.'/../../Model/notificationCRUD.php';
    // $userData = check_login("Sales Representative");
    // //$username = $userData["username"];
    // $role = "Sales Representative";
    // $notifData = get_notification_data($role, $userData["username"]);
    require '../../Model/salesR/connect.php';


    if(isset($_GET['page_stock'])){

        $page = $_GET['page_stock'];
        $num_per_page = 02;
        $start_from = ($page-1)*02;

        if ($_GET['identifier'] === 'stocks_pagin'){
            ?>
            <table class="content-table">
        <thead>
            <tr>
                <th>Category</th>
                <th>Product Code</th>
                <th>Product</th>
                <th>Selling Price<br>(Rs.)</th>
                <th>Available Quantity</th>
            </tr>
        </thead>
        <?php

        $queryPagin = "SELECT productCategory, product.productCode, productName, (count - SUM(case when orderStatus = \"Pending\" then quantity else 0 end)) as availableQuantity, sellingPrice
        FROM orders 
        INNER JOIN order_product ON orders.orderID = order_product.orderID 
        RIGHT JOIN product ON product.productCode = order_product.productCode 
        GROUP BY product.productCode limit $start_from, $num_per_page;";
    
        $resultPagin = mysqli_query($con, $queryPagin);
          while($rows = mysqli_fetch_assoc($resultPagin))
            {
          ?>
        <tbody>
            <tr>
                <td><?php echo $rows['productCategory'];?></td>
                <td><?php echo $rows['productCode'];?></td>
                <td><?php echo $rows['productName'];?></td>
                <td><?php echo $rows['sellingPrice'];?></td>
                <td><?php echo $rows['availableQuantity'];?></td>
            </tr>
        </tbody>
        <?php
            }
          ?>
      </table>
      <?php
        }
    }


?>