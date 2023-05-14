<?php require_once("../../../config.php") ?>
<?php include("../_inc/side_bar.php") ?>
<?php include("../_inc/head.php") ?>

<?php 
    require __DIR__.'/../../../Model/utils.php';
    $role = "Store Manager";
    $userData = check_login($role);
    require __DIR__.'/../../../Model/notificationCRUD.php';
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
            <div class="content">
                Returned Goods
            </div>
        </main>
    </div>

    <!-- Script for notifications functionality -->
    <script src="../../../View/notification.js"></script>

    <?php include("../_inc/scripts.php") ?>
</body>

</html>