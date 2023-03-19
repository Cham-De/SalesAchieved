<?php

$query = $_GET["q"];
if (strlen($query) === 0) {
    header('Location: /Controller/store');
}
?>

<?php require_once("../_inc/config.php") ?>
<?php include("../_inc/side_bar.php") ?>
<?php include("../_inc/head.php") ?>


<!DOCTYPE html>
<html lang="en">
<?php render_head("Search | Store Manager - Dashboard") ?>

<body>
    <div class="wrapper">
        <?php render_side_bar("") ?>
        <main>
            <?php include("../_inc/navigation.php") ?>
            <div class="content">
                Search results for : <q><?php echo $query ?></q>
            </div>
        </main>
    </div>


    <?php include("../_inc/scripts.php") ?>
</body>

</html>