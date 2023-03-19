<?php require_once("../_inc/config.php") ?>
<?php include("../_inc/side_bar.php") ?>
<?php include("../_inc/head.php") ?>
<?php include("../_inc/pagination.php") ?>
<?php require("../_lib/add-product.php") ?>
<?php require("../_lib/update-product.php") ?>
<?php require_once("../_lib/connect-db.php") ?>

<?php
$items_per_page = 6;
$count_sql = "SELECT COUNT(id) as count from stocks";
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
$search_query = null;
if (isset($_GET['search'])) {
    $search_query = $_GET['search'];
}

$offset = ($current_page - 1) * $items_per_page;
$stocks_sql = "SELECT * FROM stocks LIMIT $offset,$items_per_page";
if ($search_query != null) {
    $stocks_sql = "SELECT * FROM stocks WHERE productName LIKE '%$search_query%'";
}
$stocks_result = $conn->query($stocks_sql);

?>

<!DOCTYPE html>
<html lang="en">
<?php render_head("Stocks | Store Manager - Dashboard", '<link rel="stylesheet" href="' . $GLOBALS["store_styles_path"] . '/popup.css">') ?>

<body>
    <div class="wrapper">
        <?php render_side_bar("Stocks") ?>
        <main>
            <?php include("../_inc/navigation.php") ?>
            <div class="content">
                <div class="nav-bar">
                    <nav>
                        <form class="search-bar" method="get" action="<?php echo $_SERVER["PHP_SELF"]  ?>">
                            <input value="<?php echo $search_query ?>" required type="search" name="search" placeholder="Search products..." class="search">

                            <button type="submit" value="search">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                        <?php if ($search_query !== null) {
                            echo '<a class="action-link" style="margin-left:10px" href="' . $GLOBALS["store_path"] . '/stocks">Clear</a>';
                        } ?>
                    </nav>
                    <button class="popup-btn action" popup-target="add-product">Add Product</button>
                </div>
                <?php
                if ($search_query !== null) {
                    echo '<h3>Search results for <q>' . $search_query . '</q></h3><br/><br/>';
                }

                if ($stocks_result) {
                    while ($row = mysqli_fetch_assoc($stocks_result)) {
                        $name = $row["productName"];
                        $code = $row["productCode"];
                        $id = $row["id"];
                        $category = $row["productCategory"];
                        $buying_price = $row["buyingPrice"];
                        $selling_price = $row["sellingPrice"];
                        $qty = $row["quantity"];
                        echo '<div class="cta">
                                <div>
                                    <h4>' . $name . '</h4>
                                    <small>' . $code . '</small>
                                    <small>' . $category . '</small>
                                </div>
                                <div>
                                    <button class="popup-btn" popup-target="view-product-' . $id . '"><i class="fa-solid fa-eye"></i><span>&nbsp;View</span></button>
                                    <button class="popup-btn" popup-target="update-product-' . $id . '"><i class="fa-solid fa-pen-to-square"></i><span>&nbsp;Update</span></button>
                                    <button delete-target="' . $id . '" class="product-delete-btn"><i class="fa-solid fa-trash"></i><span>&nbsp;Delete</span></button>
                                </div>
                            </div>';
                        echo '<div class="popup" id="view-product-' . $id . '">
                        <div class="container">
                            <div class="header">
                                <h4>' . $name . '</h4>
                                <button id="close-btn"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                            <div class="wrapper data-view">
                                <div class="data-cta">
                                    <small>Id</small>
                                    <h4>' . $id . '</h4>
                                </div>
                                <div class="data-cta">
                                    <small>Code</small>
                                    <h4>' . $code . '</h4>
                                </div>
                                <div class="data-cta">
                                    <small>Category</small>
                                    <h4>' . $category . '</h4>
                                </div>
                                <div class="data-cta">
                                    <small>Buying Price</small>
                                    <h4>Rs. ' . $buying_price . '</h4>
                                </div>
                                <div class="data-cta">
                                    <small>Selling Price</small>
                                    <h4>Rs. ' . $selling_price . '</h4>
                                </div>
                                <div class="data-cta">
                                    <small>Quantity</small>
                                    <h4>' . $qty . '</h4>
                                </div>
                            </div>
                        </div>
                    </div>';
                        echo '<div class="popup" id="update-product-' . $id . '">
                        <div class="container">
                            <div class="header">
                                <h4>Update Product: ' . $name . '</h4>
                                <button id="close-btn"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                            <div class="wrapper">
                            <form action="" method="post">
                            <label for="" class="input">
                                <span>Name</span>
                                <input defaultValue="' . $name . '" value="' . $name . '" type="text" name="p_name" placeholder="" required>
                            </label>
                            <label for="" class="input">
                                <span>Category</span>
                                <input defaultValue="' . $category . '" value="' . $category . '" type="text" name="p_category" placeholder="" required>
                            </label>
                            <label for="" class="input">
                                <span>Code</span>
                                <input defaultValue="' . $code . '" value="' . $code . '" type="text" name="p_code" placeholder="" required>
                            </label>
                            <label for="" class="input">
                                <span>Buying Price(Rs.)</span>
                                <input defaultValue="' . $buying_price . '" value="' . $buying_price . '" type="number" name="p_buying_price" placeholder="" min="0" required>
                            </label>
                            <label for="" class="input">
                                <span>Selling Price(Rs.)</span>
                                <input defaultValue="' . $selling_price . '" value="' . $selling_price . '" type="number" name="p_selling_price" placeholder="" min="0" required>
                            </label>
                            <label for="" class="input">
                                <span>Quantity </span>
                                <input defaultValue="' . $qty . '" value="' . $qty . '" type="number" name="p_qty" placeholder="" min="0" required>
                            </label>
                            <input type="hidden" name="p_id" value="' . $id . '"/>
                            <button class="disabled" type="reset">Cancel</button>
                            <button class="main" type="submit" name="submit" value="update-product">Save</button>
                        </form>
                            </div>
                        </div>
                    </div>';
                    }
                }

                if ($search_query == null && $pages_count > 1) {
                    render_pagination($pages_count, $current_page, "stocks");
                }
                ?>
                <?php if (mysqli_num_rows($stocks_result) === 0) {
                    echo "<i>No products found!</i>";
                } ?>
            </div>

        </main>
        <div class="popup" id="add-product">
            <div class="container">
                <div class="header">
                    <h4>Add Product</h4>
                    <button id="close-btn"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="wrapper">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <label for="" class="input">
                            <span>Name</span>
                            <input type="text" name="p_name" placeholder="" required>
                        </label>
                        <label for="" class="input">
                            <span>Category</span>
                            <input type="text" name="p_category" placeholder="" required>
                        </label>
                        <label for="" class="input">
                            <span>Code</span>
                            <input type="text" name="p_code" placeholder="" required>
                        </label>
                        <label for="" class="input">
                            <span>Buying Price(Rs.)</span>
                            <input type="number" name="p_buying_price" placeholder="" min="0" required>
                        </label>
                        <label for="" class="input">
                            <span>Selling Price(Rs.)</span>
                            <input type="number" name="p_selling_price" placeholder="" min="0" required>
                        </label>
                        <label for="" class="input">
                            <span>Quantity </span>
                            <input type="number" name="p_qty" placeholder="" min="0" required>
                        </label>
                        <button class="disabled" type="reset">Cancel</button>
                        <button class="main" type="submit" name="submit" value="add-product">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const product_delete_buttons = document.querySelectorAll("button.product-delete-btn")
        product_delete_buttons.forEach(btn => {
            const id = btn.getAttribute("delete-target")
            if (id) {
                btn.addEventListener("click", () => {
                    const ok = confirm("Are you sure?")
                    if (ok) {
                        window.location.href = `/Controller/store-new/_lib/delete-product.php?id=${id}`
                    }
                })
            }
        })
    </script>
    <script src="/View/popup.js"></script>
    <?php include("../_inc/scripts.php") ?>
</body>

</html>