<?php require_once("../_inc/config.php") ?>
<?php include("../_inc/side_bar.php") ?>
<?php include("../_inc/head.php") ?>
<?php include("../_inc/pagination.php") ?>
<?php include("../_lib/add-agent.php") ?>
<?php include("../_lib/connect-db.php") ?>

<?php
$items_per_page = 6;
$count_sql = "SELECT COUNT(agentId) as count from agent";
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
<?php render_head("Agents | Store Manager - Dashboard", '<link rel="stylesheet" href="' . $GLOBALS["store_styles_path"] . '/popup.css">') ?>

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
                            <th style="--width:20%">Id</th>
                            <th style="--width:20%">Company</th>
                            <th style="--width:20%">Phone No</th>
                            <th style="--width:20%">Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($agents_result) {
                            while ($agent = mysqli_fetch_assoc($agents_result)) {
                                echo '<tr>';
                                echo '<td style="--width:20%">' . $agent['agentID'] . '</td>';
                                echo '<td style="--width:20%">' . $agent['companyName'] . '</td>';
                                echo '<td style="--width:20%">' . $agent['phone'] . '</td>';
                                echo '<td style="--width:20%">' . $agent['address'] . '</td>';
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
        <div class="popup" id="add-agent">
            <div class="container">
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
                            <span>Phone Number</span>
                            <input type="tel" pattern="{0-9}[10]" name="a_phone_no" placeholder="" required>
                        </label>
                        <label for="" class="input">
                            <span>Address</span>
                            <input type="text" name="a_address" placeholder="" min="0" required>
                        </label>
                        <div></div>
                        <button class="disabled" type="reset">Cancel</button>
                        <button class="main" type="submit" value="add-agent" name="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="/View/popup.js"></script>
    <?php include("../_inc/scripts.php") ?>
</body>

</html>

<!-- anushasakawaru
4

5(nirmartru haa sabhapathi)

Add FRONT to logo -->