<?php require_once("../../../config.php") ?>
<?php include("../_inc/side_bar.php") ?>
<?php include("../_inc/head.php") ?>
<?php include("../_inc/pagination.php") ?>
<?php include("../../../Model/store/update-order.php") ?>
<?php include("../../../Model/store/connect-db.php") ?>

<?php

// pagination
$items_per_page = 6;
$count_sql = "SELECT COUNT(*) as count from orders";
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
// load data
$orders_sql = "SELECT o.*,c.customerName as customerName FROM orders as o INNER JOIN customer as c ON o.customerID=c.customerID LIMIT $offset,$items_per_page";
if ($has_filter) {
    $partials = array();
    if (strlen($year) > 0) {
        array_push($partials, "YEAR(o.orderDate)='$year'");
    }
    if (strlen($month) > 0) {
        array_push($partials, "MONTH(o.orderDate)='$month'");
    }
    $orders_sql = "SELECT o.*,c.customerName as customerName FROM orders as o INNER JOIN customer as c ON o.customerID=c.customerID WHERE " . join(" AND ", $partials);
} elseif (strlen($search_query) > 0) {
    $orders_sql = "SELECT o.*,c.customerName as customerName FROM orders as o INNER JOIN customer as c ON o.customerID=c.customerID WHERE (orderStatus LIKE '%$search_query%' OR orderID LIKE '%$search_query%' OR orderDate LIKE '%$search_query%' OR deliveryRegion LIKE '%$search_query%' )";
}
$orders_result = $conn->query($orders_sql);



// load filters
$dates_sql = "SELECT orderDate AS date FROM orders";
$dates_result = $conn->query($dates_sql);

$years = array();
$months = array();
while ($date = mysqli_fetch_assoc($dates_result)) {
    $partials = explode("-", $date['date']);
    if (!in_array($partials[0], $years)) {
        array_push($years, $partials[0]);
    }
    if (!in_array($partials[1], $months)) {
        array_push($months, $partials[1]);
    }
}
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
                    <nav>
                        <?php
                        if ($has_filter) {
                            echo '<a class="action-link" style="margin-right:10px" href="' .  APP_CONTROLLER_PATH . '/store/orders">Clear Filters</a>';
                        }
                        if (count($years) > 1) {
                            echo '<div class="filter"><select style="background-image:url(' . APP_ASSETS_PATH . "/carrot.svg" . ')" value="' . $year . '" id="year-filter">';
                            echo '<option ' . ($year === "" ? "selected" : "") . ' value="">Select Year</option>';
                            foreach ($years as $c_year) {
                                echo '<option ' . ($year === $c_year ? "selected" : "") . ' value="' . $c_year . '">' . $c_year . '</option>';
                            }
                            echo '</select></div>';
                        }
                        ?>
                        <?php
                        if (count($months) > 1) {
                            echo '<div class="filter"><select style="background-image:url(' . APP_ASSETS_PATH . "/carrot.svg" . ')" value="' . $month . '" id="month-filter">';
                            echo '<option ' . ($month === "" ? "selected" : "") . ' value="">Select Month</option>';
                            foreach ($months as $c_month) {
                                echo '<option ' . ($month === $c_month ? "selected" : "") . ' value="' . $c_month . '">' . $c_month . '</option>';
                            }
                            echo '</select></div>';
                        }

                        ?>

                    </nav>
                </div>
                <?php
                if (strlen($search_query) > 0) {
                    echo '<h3>Search results for <q>' . $search_query . '</q></h3><br/><br/>';
                }
                if ($orders_result) {
                    while ($row = mysqli_fetch_assoc($orders_result)) {
                        $date = $row["orderDate"];
                        $id = $row["orderID"];
                        $status = $row["orderStatus"];
                        $paymentMethod = $row["paymentMethod"];
                        $deliveryDate = $row["deliveryDate"];
                        $deliveryRegion = $row["deliveryRegion"];
                        $customerName = $row["customerName"];
                        $dispatchDate = $row["dispatchDate"];

                        echo '<div class="cta">
                                <div>
                                    <h4>Order ' . $id . '</h4>
                                    <small>' . $customerName . '</small>
                                    <small>' . $date . '</small>
                                </div>
                                <div>
                                    <button class="popup-btn" popup-target="view-order-' . $id . '"><i class="fa-solid fa-eye"></i><span>&nbsp;View</span></button>';
                        if ($status === "Pending") {
                            echo '<button class="popup-btn" popup-target="update-order-' . $id . '"><i class="fa-solid fa-pen-to-square"></i><span>&nbsp;Update</span></button>';
                        }
                        echo '</div>
                            </div>';
                        echo '<div class="popup" id="view-order-' . $id . '">
                        <div class="container">
                            <div class="header">
                                <h4>Order ' . $id . '</h4>
                                <button id="close-btn"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                            <div class="wrapper data-view">
                            <div class="data-cta">
                                <small>Id</small>
                                <h4>' . $id . '</h4>
                            </div>
                            <div class="data-cta">
                                <small>Date</small>
                                <h4>' . $date . '</h4>
                            </div>
                            <div class="data-cta">
                                <small>Status</small>
                                <h4>' . strtoupper($status) . '</h4>
                            </div>
                            <div class="data-cta">
                                <small>Payment Method</small>
                                <h4>' . (strtolower($paymentMethod) === "cod" ? "Cash on Delivery" : (strtolower($paymentMethod) === "bt" ? "Bank Transaction" : $paymentMethod)) . '</h4>
                            </div>
                            <div class="data-cta">
                                <small>Delivery Date</small>
                                <h4>' . ($deliveryDate == null ? "-" : $deliveryDate) . '</h4>
                            </div>
                            <div class="data-cta">
                                <small>Delivery Region</small>
                                <h4>' . $deliveryRegion . '</h4>
                            </div>
                            <div class="data-cta">
                                <small>Customer</small>
                                <h4>' . $customerName . '</h4>
                            </div>
                            <div class="data-cta">
                                <small>Dispatched Date</small>
                                <h4>' . ($dispatchDate == null ? "-" : $dispatchDate) . '</h4>
                            </div>';
                        echo '<div class="data-cta">
                            <small>Products</small>';
                        echo '<table class="data">
                        <thead>
                            <tr>
                                <th style="--width:40%">Name</th>
                                <th style="--width:35%">Code</th>
                                <th style="--width:25%">Qty</th>
                            </tr>
                        </thead>
                        <tbody>';
                        $products_sql = 'SELECT op.quantity as o_quantity,p.* FROM `order_product` as op INNER JOIN product as p ON op.productCode=p.productCode WHERE op.orderID="' . $id . '"';
                        $result = $conn->query($products_sql);
                        while ($product = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td style="--width:40%">' . $product["productName"] . '</td>';
                            echo '<td style="--width:35%">' . $product["productCode"] . '</td>';
                            echo '<td style="--width:25%">' . $product["o_quantity"] . '</td>';
                            echo '</tr>';
                        }
                        echo '   
                        </tbody>
                        </table>';

                        echo '
                        </div>';
                        echo '</div>
                        </div>
                    </div>';
                        if ($status === "Pending") {
                            $agent_sql = 'SELECT * FROM agent';
                            $result = $conn->query($agent_sql);
                            echo '<div class="popup" id="update-order-' . $id . '">
                                <div class="container">
                                <div class="drop-down">
                                <div class="header">
                                        <h4>Make Order Dispatched: ' . $id . '</h4>
                                        <button id="close-btn"><i class="fa-solid fa-xmark"></i></button>
                                    </div>
                                <form action="" method="post">
                                    <div class="select-wrapper">
                                        <select id="agent" name="agent">
                                            <option value="">--Assign Agent--</option>';
                                            while ($agent = mysqli_fetch_assoc($result)) {
                                                $agentUsername = $agent["agentUsername"];
                                                $companyName = $agent["companyName"];
                                                echo '<option value="'.$agentUsername.'">'.$companyName.'</option>';
                                            }

                            echo '
                                        </select>
                                    </div>
                                    <input type="hidden" name="o_id" value="' . $id . '"/>
                                    <div class="submit-btn">
                                        <button class="main" type="submit" name="assign-agent-btn" value="assign-agent">Update</button>
                                    </div>
                                </form>
                                </div>
                                    
                                    <div class="wrapper">
                                    <form action="" method="post">
                                    <button class="main" type="submit" name="submit" value="update-order">Make Dispatched</button>
                                    <input type="hidden" name="o_id" value="' . $id . '"/>                          
                                    </form>
                                    </div>
                                
                                </div>
                                </div>';
                        }
                    }
                }
                if (!$has_filter && strlen($search_query) === 0 && $pages_count > 1) {
                    render_pagination($pages_count, $current_page, "orders");
                }
                if (mysqli_num_rows($orders_result) === 0) {
                    echo "<i>No orders found!</i>";
                }
                ?>
            </div>
        </main>
    </div>

    <script>
        const yearFilter = document.querySelector("select#year-filter");
        const monthFilter = document.querySelector("select#month-filter");

        const filter = () => {
            const params = {}
            if (yearFilter && yearFilter.value) {
                params["year"] = yearFilter.value
            }
            if (monthFilter && monthFilter.value) {
                params["month"] = monthFilter.value
            }
            const searchParams = new URLSearchParams(params);
            if (Object.keys(params).length > 0) {
                window.location.href = '<?php echo  APP_CONTROLLER_PATH ?>/store/orders?' + searchParams.toString()
            }
        }
        if (yearFilter) {
            yearFilter.addEventListener("change", (e) => {
                filter();
            })
        }
        if (monthFilter) {
            monthFilter.addEventListener("change", (e) => {
                filter();
            })
        }
    </script>

    <script src="<?php echo APP_VIEW_PATH ?>/popup.js"></script>
    <?php include("../_inc/scripts.php") ?>
</body>

</html>


