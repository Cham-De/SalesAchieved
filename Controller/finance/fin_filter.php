<?php

require '../../Model/db-con.php';


  ?>

<table class="content-table">
        <thead>
          <tr>
            <th>Sales Rep</th>
            <th>Revenue generated<br>(Rs.)</th>
            <th>Commission<br>(Rs.)</th>
          </tr>
        </thead>
        <tbody>
        <?php

          if(isset($_POST['commFil_op'])){
            $month_name = $_POST['commFil_op'];
            $month_num = date("m", strtotime($month_name));

            if($month_name == "reset_filter"){
              $com = "SELECT o.orderID, o.orderStatus, u.name, o.orderDate, SUM((p.sellingPrice-p.buyingPrice) * op.quantity) as revenue, SUM((p.sellingPrice - p.buyingPrice) * op.quantity) * c.commRate / 100 AS commission_amount
              FROM orders o
              JOIN order_product op ON o.orderID = op.orderID
              JOIN product p ON op.productCode = p.productCode
              JOIN user u ON u.username = o.username
              JOIN commissions c ON DATE_FORMAT(c.commDate, '%Y-%m') = DATE_FORMAT(o.orderDate, '%Y-%m')
              WHERE o.orderStatus = 'Completed'
              GROUP BY u.name";
            }
            else{
              $com = "SELECT o.orderID, o.orderStatus, u.name, o.orderDate, SUM((p.sellingPrice-p.buyingPrice) * op.quantity) as revenue, SUM((p.sellingPrice - p.buyingPrice) * op.quantity) * c.commRate / 100 AS commission_amount
              FROM orders o
              JOIN order_product op ON o.orderID = op.orderID
              JOIN product p ON op.productCode = p.productCode
              JOIN user u ON u.username = o.username
              JOIN commissions c ON DATE_FORMAT(c.commDate, '%Y-%m') = DATE_FORMAT(o.orderDate, '%Y-%m')
              WHERE o.orderStatus = 'Completed' && MONTH(o.orderDate) = $month_num
              GROUP BY u.name";

            }
          }

          $query = mysqli_query($con, $com);
          
          if(mysqli_num_rows($query) > 0 ){
            foreach($query as $thing){
              ?>
              <tr>
                <td><?=$thing['name']; ?></td>
                <td><?=$thing['revenue']; ?></td>
                <td><?=$thing['commission_amount']; ?></td>
              </tr>
              <?php
            }
          }
          else{
            // echo "<h4>No records</h4>";
            ?>
            <tr>
                <td colspan="3"><?php echo "No Records"; ?></td>
            </tr>
            <?php
          }
          ?>
        </tbody>
</table>

<?php
if(isset($_POST['SalesFilter_op'])){
  $SRname = $_POST['SalesFilter_op'];

  ?>
      <table class="content-table" id="salesTable">
        <thead>
          <tr>
            <th>Order ID</th>
            <!-- <th>Product Category</th> -->
            <th>Sales Rep</th>
            <th>Date</th>
            <!-- <th>Selling Price<br>(Rs.)</th>
            <th>Quantity Sold</th> -->
            <th>Revenue<br>(Rs.)</th>
          </tr>
        </thead>
        <tbody>
          <?php

          $sql="SELECT o.orderID, u.name, o.orderDate, SUM(p.sellingPrice * d.quantity) as revenue
          FROM order_product d
          JOIN product p ON d.productCode = p.productCode
          JOIN orders o ON o.orderID = d.orderID
          JOIN user u ON u.username = o.username
          WHERE u.name = $SRname
          GROUP BY o.orderID, u.name, o.orderDate
          ORDER BY o.orderDate";
          
          $query = mysqli_query($con, $sql);
          if(mysqli_num_rows($query) > 0 ){
            foreach($query as $thing){
              ?>
              <tr>
                <td><?=$thing['orderID']; ?></td>
                <td><?=$thing['name']; ?></td>
                <td><?=$thing['orderDate']; ?></td>
                <td><?=$thing['revenue']; ?></td>
              </tr>
              <?php
            }
          }
          else{
            echo "<h4>No records</h4>";
          }
          ?>
        </tbody>
      </table>
  <?php
}
?>
