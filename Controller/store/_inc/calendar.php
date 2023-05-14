<?php require_once("../../../config.php") ?>
<?php include("../_inc/side_bar.php") ?>
<?php include("../_inc/head.php") ?>
<?php include("../_inc/pagination.php") ?>
<?php include("../../../Model/store/update-order.php") ?>
<?php include("../../../Model/store/connect-db.php") ?>

<?php 
    require __DIR__.'/../../../Model/utils.php';
    $role = "Store Manager";
    $userData = check_login($role);
    require __DIR__.'/../../../Model/notificationCRUD.php';
    $notifData = get_notification_data($role, $userData["username"]);

    // get search query
    $search_query = "";
    if (isset($_GET['search'])) {
        $search_query = $_GET['search'];
    }

    // get filters
    $year = "";
    $month = "";
    if (isset($_GET['year'])) {
        $year = $_GET['year'];
    }
    if (isset($_GET['month'])) {
        $month = $_GET['month'];
    }
    $has_filter = strlen($year) > 0 || strlen($month) > 0;
?>


<!DOCTYPE html>
<html lang="en">
<?php render_head("Orders | Store Manager - Dashboard", '<link rel="stylesheet" href="' . APP_STYLES_PATH . '/store/popup.css">') ?>
<head>
    <style>
        .select-wrapper {
            margin-left: 0px;
            margin-right: 100px;
            margin-top: 20px;
        }

        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            border: 1px solid #FFA500;
            border-radius: 4px;
            box-sizing: border-box;
            text-align: left;
        }
        option{
            padding: 12px 20px;
        }
        .drop-down button[type="submit"][name="assign-agent-btn"] {
            background-color: #FFA500;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        .submit-btn{
            margin-top: 80px;
            margin-left: -490px;
        }
     
    </style>
</head>
<body>
    <div class="wrapper">
        <?php render_side_bar("Orders") ?>
        <main>
            <?php include("../_inc/navigation.php") ?>
            <div class="content">
                <div class="nav-bar">
                    <nav>
                        <?php if (!$has_filter) {
                            echo '<form class="search-bar" method="get" action="' . $_SERVER["PHP_SELF"] . '">
                            <input value="' . $search_query . '" required type="search" name="search" placeholder="Search orders..." class="search">

                            <button type="submit" value="search">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>';
                            if (strlen($search_query) > 0) {
                                echo '<a class="action-link" style="margin-left:10px" href="' .  APP_CONTROLLER_PATH . '/store/orders">Clear</a>';
                            }
                        } ?>

                    </nav>
                </div>
                
                    <div class="container">
                        <div class="calendar">
                            <div class="month">
                                <i class="fas fa-angle-left prev"></i>
                                <div class="date">
                                    <h1></h1>
                                    <p></p>
                                </div>
                                <i class="fas fa-angle-right next"></i>
                            </div>
                            <div class="weekdays">
                                <div>Sun</div>
                                <div>Mon</div>
                                <div>Tue</div>
                                <div>Wed</div>
                                <div>Thu</div>
                                <div>Fri</div>
                                <div>Sat</div>
                            </div>
                            <div class="days"><b>
                                
                            </b></div>
                        </div>
                        <div class="right">
                            <div class="today-date">
                                <!-- <div class="event-day">Wed</div>
                                <div class="event-date">16 November 2022</div> -->
                            </div>
                        </div>
                    </div>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js" crossorigin="anonymous"></script>
        <script src="calendar.js"></script>
            </div>
        </main>
    </div>

    <!-- Script for notifications functionality -->
    <script src="../../../View/notification.js"></script>
    <script src="<?php echo APP_VIEW_PATH ?>/popup.js"></script>
    <?php include("../_inc/scripts.php") ?>
</body>

</html>


