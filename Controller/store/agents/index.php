<?php require_once("../../../config.php") ?>
<?php include("../_inc/side_bar.php") ?>
<?php include("../_inc/head.php") ?>
<?php include("../_inc/pagination.php") ?>
<?php include("../../../Model/store/add-agent.php") ?>
<?php include("../../../Model/store/connect-db.php") ?>

<?php 
    require __DIR__.'/../../../Model/utils.php';
    $role = "Store Manager";
    $userData = check_login($role);
    require __DIR__.'/../../../Model/notificationCRUD.php';
    $notifData = get_notification_data($role, $userData["username"]);
?>

<?php
$items_per_page = 6;
$count_sql = "SELECT COUNT(agentUsername) as count from agent";
$count_result = $conn->query($count_sql);
$count = 0;
if (!$conn->error) {
    $count = mysqli_fetch_assoc($count_result)['count'];
}
$pages_count =  floor($count / $items_per_page) + (($count % $items_per_page) === 0 ? 0 : 1);
$current_page = 1;
if (isset($_GET['page'])) {
    $recieved_page = $_GET['page'];
    if ($recieved_page > 0 && $recieved_page <= $pages_count) {
        $current_page = $recieved_page;
    }
}

$offset = ($current_page - 1) * $items_per_page;
$agents_sql = "SELECT * FROM agent LIMIT $offset,$items_per_page";
$agents_result = $conn->query($agents_sql);

?>


<!DOCTYPE html>
<html lang="en">
<?php render_head("Agents | Store Manager - Dashboard", '<link rel="stylesheet" href="' . APP_STYLES_PATH . '/store/popup.css">') ?>

<head>
    <style>
        .popup-agents {
            background-color: rgba(0, 0, 0, 0.6);
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px;
            display: none;
        }

        .popup-agents.active {
            display: flex;
        }

        .popup-agents .container-agents {
            background-color: white;
            width: 100%;
            max-width: 1000px;
            height: 60%;
            margin: 0 auto;
            border-radius: 20px;
            box-shadow: 0px 4px 4px rgb(0 0 0 / 20%);
            overflow: auto;
            padding: 30px;
            display: flex;
            flex-direction: column;
        }

        .popup-agents .container-agents .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .popup-agents .container-agents .header h4 {
            font-size: 20px
        }

        .popup-agents .container-agents .header .title {
            font-size: 30px;
            font-weight: bold;
        }

        .popup-agents .container-agents #close-btn {
            color: red;
            font-size: 20px;
            border: none;
            background-color: white;
        }

        .popup-agents form {
            display: grid;
            grid-template-columns: repeat(1, minmax(0, 1fr));
            gap: 40px;
            width: 100%;
        }
        @media screen and (min-width: 768px) {
            .popup-agents form {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        .popup-agents .container-agents .wrapper {
            max-height: calc(100% - 60px);
            height: max-content;
            margin-top: 40px;
            overflow: auto;
        }

    </style>
</head>
<body>
    <div class="wrapper">
        <?php render_side_bar("Agents") ?>
        <main>
            <?php include("../_inc/navigation.php") ?>
            <div class="content">
                <div class="nav-bar">
                    <span></span><button class="popup-btn action" popup-target="add-agent">Add Agent</button>
                </div>
                <table class="data">
                    <thead>
                        <tr>
                            <th style="--width:20%">Username</th>
                            <th style="--width:20%">Company</th>
                            <th style="--width:20%">email</th>
                            <th style="--width:20%">Phone No</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($agents_result) {
                            while ($agent = mysqli_fetch_assoc($agents_result)) {
                                echo '<tr>';
                                echo '<td style="--width:20%">' . $agent['agentUsername'] . '</td>';
                                echo '<td style="--width:20%">' . $agent['companyName'] . '</td>';
                                echo '<td style="--width:20%">' . $agent['email'] . '</td>';
                                echo '<td style="--width:20%">' . $agent['phone'] . '</td>';
                                echo '</tr style="--width:20%">';
                            }
                        } ?>
                    </tbody>
                </table>
                <?php if ($pages_count > 1) {
                    render_pagination($pages_count, $current_page, "agents");
                }  ?>
            </div>
        </main>
        <div class="popup-agents" id="add-agent">
            <div class="container-agents">
                <div class="header">
                    <h4>Add Agent</h4>
                    <button id="close-btn"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="wrapper">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <label for="" class="input">
                            <span>Company name</span>
                            <input type="text" name="a_company_name" placeholder="" required>
                        </label>
                        <label for="" class="input">
                            <span>Email</span>
                            <input type="text" name="email" placeholder="" required>
                        </label>
                        <label for="" class="input">
                            <span>Phone Number</span>
                            <input type="tel" pattern="{0-9}[10]" name="a_phone_no" placeholder="" required>
                        </label>
                        <div></div>
                        <button class="disabled" type="reset">Cancel</button>
                        <button class="main" type="submit" value="add-agent" name="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Script for notifications functionality -->
    <script src="../../../View/notification.js"></script>
    <script src="<?php echo APP_VIEW_PATH ?>/popup.js"></script>
    <?php include("../_inc/scripts.php") ?>
</body>

</html>