<?php require_once("../../../config.php") ?>
<?php include("../_inc/side_bar.php") ?>
<?php include("../_inc/head.php") ?>
<?php include("../_inc/pagination.php") ?>
<?php require("../../../Model/store/add-product.php") ?>
<?php require("../../../Model/store/update-product.php") ?>
<?php require_once("../../../Model/store/connect-db.php") ?>

<?php
$items_per_page = 6;
$count_sql = "SELECT COUNT(productCode) as count from product";
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
$stocks_sql = "SELECT * FROM product LIMIT $offset,$items_per_page";
if ($search_query != null) {
    $stocks_sql = "SELECT * FROM product WHERE productName LIKE '%$search_query%'";
}
$stocks_result = $conn->query($stocks_sql);

?>

<!DOCTYPE html>
<html lang="en">
<?php render_head("Stocks | Store Manager - Dashboard", '<link rel="stylesheet" href="' . APP_STYLES_PATH . '/store/popup.css">') ?>

<head>
    <style>
        .popup-stocksV {
            background-color: rgba(0, 0, 0, 0.6);
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px;
            display: none;
        }

        .popup-stocksV.active {
            display: flex;
        }

        .popup-stocksV .container-stocksV {
            background-color: white;
            width: 100%;
            max-width: 450px;
            height: 85%;
            margin: 0 auto;
            border-radius: 20px;
            box-shadow: 0px 4px 4px rgb(0 0 0 / 20%);
            overflow: auto;
            padding: 30px;
            display: flex;
            flex-direction: column;
        }

        .popup-stocksV .container-stocksV .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .popup-stocksV .container-stocksV .header h4 {
            font-size: 20px
        }

        .popup-stocksV .container-stocksV .header .title {
            font-size: 30px;
            font-weight: bold;
        }

        .popup-stocksV .container-stocksV #close-btn {
            color: red;
            font-size: 20px;
            border: none;
            background-color: white;
        }

        .popup-stocksV form {
            display: grid;
            grid-template-columns: repeat(1, minmax(0, 1fr));
            gap: 40px;
            width: 100%;
        }

        @media screen and (min-width: 768px) {
            .popup-stocksV form {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        .popup-stocksV .container-stocksV .wrapper {
            max-height: calc(100% - 60px);
            height: max-content;
            margin-top: 40px;
            overflow: auto;
        }
    </style>
</head>
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
                            echo '<a class="action-link" style="margin-left:10px" href="' . APP_CONTROLLER_PATH . '/store/stocks">Clear</a>';
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
                        $category = $row["productCategory"];
                        $description = $row["description"];
                        $buying_price = $row["buyingPrice"];
                        $selling_price = $row["sellingPrice"];
                        $qty = $row["count"];
                        $buffer_quantity = $row["bufferQuantity"];
                        $damaged_goods = $row["damagedGoods"];
                        $min_qty_threshold = $row["minQuantityThreshold"];
                        echo '<div class="cta">
                                <div>
                                    <h4>' . $name . '</h4>
                                    <small>' . $code . '</small>
                                    <small>' . $category . '</small>
                                    ' . ($qty <= $min_qty_threshold ? '<span class="badge-danger">Min Quanity Treshold Reached</span>' : '') . '
                                </div>
                                <div>
                                    <button class="popup-btn" popup-target="view-product-' . $code . '"><i class="fa-solid fa-eye"></i><span>&nbsp;View</span></button>
                                    <button class="popup-btn" popup-target="update-product-' . $code . '"><i class="fa-solid fa-pen-to-square"></i><span>&nbsp;Update</span></button>
                                    <button delete-target="' . $code . '" class="product-delete-btn"><i class="fa-solid fa-trash"></i><span>&nbsp;Delete</span></button>
                                </div>
                            </div>';
                        echo '<div class="popup-stocksV" id="view-product-' . $code . '">
                        <div class="container-stocksV">
                            <div class="header">
                                <h4>' . $name . '</h4>
                                <button id="close-btn"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                            <div class="wrapper data-view">
                                <div class="data-cta">
                                    <small>Code</small>
                                    <h4>' . $code . '</h4>
                                </div>
                                <div class="data-cta">
                                    <small>Category</small>
                                    <h4>' . $category . '</h4>
                                </div>
                                <div class="data-cta">
                                <small>Description</small>
                                <h4>' . $description . '</h4>
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
                                    ' . ($qty <= $min_qty_threshold ? '<span class="badge-danger">Min Quanity Treshold Reached</span>' : '') . '
                                </div>
                                <div class="data-cta">
                                    <small>Buffer Quantity</small>
                                    <h4>' . $buffer_quantity . '</h4>
                                </div>
                                <div class="data-cta">
                                    <small>Damaged Goods</small>
                                    <h4>' . $damaged_goods . '</h4>
                                </div>
                            </div>
                        </div>
                    </div>';
                        echo '<div class="popup" id="update-product-' . $code . '">
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
                                <span>Description</span>
                                <input defaultValue="' . $description . '" value="' . $description . '" type="text" name="description" placeholder="" required>
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
                            <label for="" class="input">
                                <span>Buffer Quantity </span>
                                <input defaultValue="' . $buffer_quantity . '" value="' . $buffer_quantity . '" type="number" name="buffer_quantity" placeholder="" min="0" required>
                            </label>
                            <label for="" class="input">
                            <span>Damaged Quantity </span>
                            <input defaultValue="' . $damaged_goods . '" value="' . $damaged_goods . '" type="number" name="damaged_goods" placeholder="" min="0" required>
                        </label>
                            <label for="" class="input">
                                <span>Min Quantity Treshold</span>
                                <input defaultValue="' . $min_qty_threshold . '" value="' . $min_qty_threshold . '" type="number" name="p_min_qty_threshold" placeholder="" min="0" required>
                            </label>
                            <div></div>
                            <input type="hidden" name="p_code" value="' . $code . '"/>
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
                            <span>Description</span>
                            <input type="text" name="description" placeholder="" required>
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
                        <label for="" class="input">
                            <span>Buffer Quantity </span>
                            <input type="number" name="buffer_quantity" placeholder="" min="0" required>
                        </label>
                        <label for="" class="input">
                            <span>Damaged Goods </span>
                            <input type="number" name="damaged_goods" placeholder="" min="0" required>
                        </label>
                        <label for="" class="input">
                            <span>Min Quantity Treshold</span>
                            <input type="number" name="p_min_qty_threshold" placeholder="" min="0" required>
                        </label>
                        <div></div>
                        
                            <button class="main" type="submit" name="submit" value="add-product">Save</button>
                            <button class="disabled" type="reset">Cancel</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const product_delete_buttons = document.querySelectorAll("button.product-delete-btn")
        product_delete_buttons.forEach(btn => {
            const code = btn.getAttribute("delete-target")
            if (code) {
                btn.addEventListener("click", () => {
                    const ok = confirm("Are you sure?")
                    if (ok) {
                        window.location.href = `<?php echo APP_ROOT_PATH ?>/Model/store/delete-product.php?code=${code}`
                    }
                })
            }
        })
    </script>
    <script src="<?php echo APP_VIEW_PATH ?>/popup.js"></script>
    <?php include("../_inc/scripts.php") ?>
</body>

</html>