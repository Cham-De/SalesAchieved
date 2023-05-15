<?php require_once("../../../config.php") ?>
<?php include("../_inc/side_bar.php") ?>
<?php include("../_inc/head.php") ?>

<?php 
    require __DIR__.'/../../../Model/utils.php';
    $role = "Store Manager";
    $userData = check_login($role);
    require __DIR__.'/../../../Model/notificationCRUD.php';
    require __DIR__.'/../../../Model/store/returnedGoods.php';
    $notifData = get_notification_data($role, $userData["username"]);
?>

<!DOCTYPE html>
<html lang="en">
<?php render_head("Returned Goods | Store Manager - Dashboard") ?>

<body>
    <div class="wrapper">
        <?php render_side_bar("Returned Goods") ?>
        <main>
            <?php include("../_inc/navigation.php") ?>
            <table class="data">
                <thead>
                    <tr>
                        <th>Complaint ID</th>
                        <th>Order ID</th>
                        <th>complaintDate</th>
                        <th>ProductCode</th>
                        <th>Complaint</th>
                    </tr>
                </thead>
                <?php
                    while($row = mysqli_fetch_array($returnedGoods)){
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $row['complaintID'];?></td>
                        <td><?php echo $row['orderID'];?></td>
                        <td><?php echo $row['complaintDate'];?></td>
                        <td><?php echo $row['productCode'];?></td>
                        <td><?php echo $row['complaint'];?></td>
                    </tr>
                </tbody>
                <?php
                    }
                ?>
            </table>
        </main>
    </div>
    

    <!-- Script for notifications functionality -->
    <script src="../../../View/notification.js"></script>

    <?php include("../_inc/scripts.php") ?>
</body>

</html>