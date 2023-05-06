<?php require_once("../../config.php") ?>
<?php include("./_inc/side_bar.php") ?>
<?php include("./_inc/head.php") ?>
<?php require("../../Model/store/add-product.php") ?>
<?php require("../../Model/store/add-agent.php") ?>


<!DOCTYPE html>
<html lang="en">
<?php render_head(
    "Store Manager - Dashboard",
    '<link rel="stylesheet" href="' . APP_STYLES_PATH . '/store/home.css">
                <link rel="stylesheet" href="' . APP_STYLES_PATH . '/store/popup.css">'
) ?>

<head>
    <style>
        .popup-landingA {
            background-color: rgba(0, 0, 0, 0.6);
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px;
            display: none;
        }

        .popup-landingA.active {
            display: flex;
        }

        .popup-landingA .container-landingA {
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

        .popup-landingA .container-landingA .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .popup-landingA .container-landingA .header h4 {
            font-size: 20px
        }

        .popup-landingA .container-landingA .header .title {
            font-size: 30px;
            font-weight: bold;
        }

        .popup-landingA .container-landingA #close-btn {
            color: red;
            font-size: 20px;
            border: none;
            background-color: white;
        }

        .popup-landingA form {
            display: grid;
            grid-template-columns: repeat(1, minmax(0, 1fr));
            gap: 40px;
            width: 100%;
        }
        @media screen and (min-width: 768px) {
            .popup-landingA form {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        .popup-landingA .container-landingA .wrapper {
            max-height: calc(100% - 60px);
            height: max-content;
            margin-top: 40px;
            overflow: auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <?php render_side_bar("Home") ?>
        <main>
            <?php include("./_inc/navigation.php") ?>

            <div class="content">
                <div class="nav-bar">
                    <span></span>
                    <nav>
                        <button class="popup-btn action" popup-target="add-product">Add Product</button>
                        <button class="popup-btn action" popup-target="add-agent">Add Agent</button>
                    </nav>
                </div>
                <div class="cards small">
                    <div class="card">
                        <h4>Customer<br />Orders</h4>
                        <small>Monthly</small>
                        <span>24</span>
                    </div>
                    <div class="card">
                        <h4>Incomplete<br />Orders</h4>
                        <small>Monthly</small>
                        <span>11</span>
                    </div>
                    <div class="card">
                        <h4>Outstanding<br />Payments</h4>
                        <small>Monthly</small>
                        <span>Rs. 43,500</span>
                    </div>
                    <div class="card">
                        <h4>On-time Delivery<br />Rate</h4>
                        <small>Monthly</small>
                        <span>86.07%</span>
                    </div>
                    <div class="card">
                        <h4>Retention<br />Rate</h4>
                        <small>Monthly</small>
                        <span>Rs. 120,000</span>
                    </div>
                </div>
                <div class="cards large">
                    <div class="card">
                        <h4>Successful Order Vs. Returned Orders</h4>
                        <img src="<?php echo APP_ASSETS_PATH ?>/graph1.png" alt="">
                    </div>
                    <div class="card">
                        <h4>Outstanding Payments</h4>
                        <img src="<?php echo APP_ASSETS_PATH ?>/graph2.jpg" alt="">
                    </div>
                </div>
            </div>
        </main>
    </div>
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
                        <span>Buffer Quantity</span>
                        <input type="number" name="buffer_quantity" placeholder="" min="0" required>
                    </label>
                    <label for="" class="input">
                        <span>Damaged Goods</span>
                        <input type="number" name="damaged_goods" placeholder="" min="0" required>
                    </label>
                    <label for="" class="input">
                        <span>Min Quantity Treshold</span>
                        <input type="number" name="p_min_qty_treshold" placeholder="" min="0" required>
                    </label>
                    <button class="disabled" type="reset">Cancel</button>
                    <button class="main" type="submit" name="submit" value="add-product">Save</button>
                </form>
            </div>
        </div>
    </div>
    <div class="popup-landingA" id="add-agent">
        <div class="container-landingA">
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
                        <span>Email</span>
                        <input type="text" name="email" placeholder="" min="0" required>
                    </label>
                    <div></div>
                    <button class="disabled" type="reset">Cancel</button>
                    <button class="main" type="submit" value="add-agent" name="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
    <?php include("./_inc/scripts.php") ?>
    <script src="<?php echo APP_VIEW_PATH ?>/popup.js"></script>
</body>

</html>