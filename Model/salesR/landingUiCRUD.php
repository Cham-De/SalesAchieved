<?php
    require __DIR__.'/../connect.php';
    require __DIR__.'/../../Model/utils.php';
    $role = "Sales Representative";
    $userData = check_login($role);

    //Feedback
    if(isset($_POST['submit'])){
        $orderID = $_POST["orderID"];
        $feedback = $_POST["feedback"];
        $comment;
        if($feedback > 3){
            $comment = "Positive";
        }
        elseif($feedback < 3){
            $comment = "Negative";
        }
        else{
            $comment = "Neutral";
        }
        if(!empty($orderID) && !empty($feedback)){
            mysqli_query($con, "INSERT INTO feedback(orderID, feedback, comment) VALUES('$orderID', '$feedback', '$comment')");
            header("Location:../../Controller/salesR/landingUi.php");
		}
		else
		{
			echo "<script>
            window.alert('Please enter valid information');
            window.location.href='landingUi.php';
            </script>";
		}
        unset($_POST);
    }

    if (isset($_POST['month_fil_op'])){
        $month_name = $_POST['month_fil_op'];
      
        if($month_name == "reset_filter"){
            $salesPerRep = getSalesPerRep($userData['username']);
            $customerDevelopmentRate = getCustomerDevelopmentRate();
            $positiveFeedbackRate = getPositiveFeedback();
            $successfulOrderRate = getSuccessfulOrderRate($userData['username']);
            $commissionAmount = getCommission($userData['username']);
        }
        else {
            $month_num = date("m", strtotime($month_name));
            $salesPerRep = getSalesPerRep($userData['username'], $month_num);
            $customerDevelopmentRate = getCustomerDevelopmentRate($month_num);
            $positiveFeedbackRate = getPositiveFeedback($month_num);
            $successfulOrderRate = getSuccessfulOrderRate($userData['username'], $month_num);
            $commissionAmount = getCommission($userData['username'], $month_num);
        }
        echo '
        
            <div class="card1">
                <h2>Sales per <br>Representative </h2>
                <h4>Monthly</h4>
                <h1>Rs. '. $salesPerRep.'</h1>
            </div>

            <div class="card2">
                <h2>New Customer <br>Development </h2>
                <h4>Monthly</h4>
                <h1>'.$customerDevelopmentRate.'%</h1>
            </div>
            <div class="card3">
            
                <h2>Postive Feedback Rate</h2>
                <h4>Monthly</h4>
                <h1>'.$positiveFeedbackRate.'%</h1>
            </div>
            <div class="card4">
                <h2>Sales <br>Commissions </h2>
                <h4>Monthly</h4>
                <h1>Rs. '.$commissionAmount.'</h1>
            </div>
            <div class="card5">
                <h2>Successful Order <br>Percentage </h2>
                <h4>Monthly</h4>
                <h1>'.$successfulOrderRate.'%</h1>
            </div>
        ';
        
    }

    //Sales per Sales Rep CRUD
    function getSalesPerRep($username, $month = "MONTH(now())"){
        $con = $GLOBALS['con'];
        $query = "SELECT SUM(product.sellingPrice * order_product.quantity) AS totalRevenue
                    FROM orders
                    INNER JOIN order_product ON orders.orderID = order_product.orderID
                    INNER JOIN product ON product.productCode = order_product.productCode
                    WHERE MONTH(orderDate) = $month && YEAR(orderDate) = YEAR(now())";
        $result = mysqli_query($con, $query);
        if(mysqli_error($con)){
            echo "Failed to connect to MYSQL: " . mysqli_error($con);
            exit();
        }
        $row = mysqli_fetch_array($result);
        $totalRevenue = $row["totalRevenue"];

        $query = "SELECT COUNT(*) AS numberOfSales
                    FROM orders
                    WHERE username = \"$username\" && MONTH(orderDate) = $month && YEAR(orderDate) = YEAR(now())
                    GROUP BY username";
        $result = mysqli_query($con, $query);
        if(mysqli_error($con)){
            echo "Failed to connect to MYSQL: " . mysqli_error($con);
            exit();
        }
        if (mysqli_num_rows($result) == 0) return 0;
        $row = mysqli_fetch_array($result);
        $numberOfSales = $row["numberOfSales"];
        if ($numberOfSales == 0) return 0;
        $salesPerSalesRep = $totalRevenue / $numberOfSales;
        $salesPerSalesRep = ROUND($salesPerSalesRep, 2);
        return $salesPerSalesRep;
    }

    //Positive feedback rate CRUD
    function getPositiveFeedback($month = "MONTH(now())"){
        $con = $GLOBALS['con'];
        $query = "SELECT COUNT(*) AS totalFeedback
                    FROM feedback
                    INNER JOIN orders ON orders.orderID = feedback.orderID
                    WHERE MONTH(orderDate) = $month && YEAR(orderDate) = YEAR(now())";
        $result = mysqli_query($con, $query);
        if(mysqli_error($con)){
            echo "Failed to connect to MYSQL: " . mysqli_error($con);
            exit();
        }
        if (mysqli_num_rows($result) == 0) return 0;
        $row = mysqli_fetch_array($result);
        $totalFeedback = $row["totalFeedback"];
        if ($totalFeedback == 0) return 0;

        $query = "SELECT COUNT(*) AS totalPositiveFeedback
                    FROM feedback
                    INNER JOIN orders ON orders.orderID = feedback.orderID
                    WHERE MONTH(orderDate) = $month && YEAR(orderDate) = YEAR(now()) && comment = \"Positive\"";
        $result = mysqli_query($con, $query);
        if(mysqli_error($con)){
            echo "Failed to connect to MYSQL: " . mysqli_error($con);
            exit();
        }
        $row = mysqli_fetch_array($result);
        $totalPositiveFeedback = $row["totalPositiveFeedback"];

        $positiveFeedbackRate = ($totalPositiveFeedback / $totalFeedback) * 100;
        $positiveFeedbackRate = round($positiveFeedbackRate, 2);
        return $positiveFeedbackRate;
    }

    //New customer development rate
    function getCustomerDevelopmentRate($month = "MONTH(now())"){
        $con = $GLOBALS['con'];
        $query = "SELECT COUNT(*) AS totalNoOfCustomers
                    FROM customer";
        $result = mysqli_query($con, $query);
        if(mysqli_error($con)){
            echo "Failed to connect to MYSQL: " . mysqli_error($con);
            exit();
        }
        if (mysqli_num_rows($result) == 0) return 0;
        $row = mysqli_fetch_array($result);
        $totalNoOfCustomers = $row["totalNoOfCustomers"];
        if ($totalNoOfCustomers == 0) return 0;

        $query = "SELECT COUNT(*) AS newNoOfCustomers
                    FROM customer 
                    WHERE MONTH(joinedDate) = $month && YEAR(joinedDate) = YEAR(now())";
        $result = mysqli_query($con, $query);
        if(mysqli_error($con)){
            echo "Failed to connect to MYSQL: " . mysqli_error($con);
            exit();
        }
        $row = mysqli_fetch_array($result);
        $newNoOfCustomers = $row["newNoOfCustomers"];

        $customerDevelopmentRate = ($newNoOfCustomers / $totalNoOfCustomers)*100;
        $customerDevelopmentRate = round($customerDevelopmentRate, 2);
        return $customerDevelopmentRate;
    }

    //Successful Order Percentage
    function getSuccessfulOrderRate($username, $month = "MONTH(now())"){
        $con = $GLOBALS['con'];
        $query = "SELECT COUNT(*) AS totalNumberOfOrders
                    FROM orders
                    WHERE username = \"$username\" && MONTH(orderDate) = $month && YEAR(orderDate) = YEAR(now())";
        $result = mysqli_query($con, $query);
        if(mysqli_error($con)){
            echo "Failed to connect to MYSQL: " . mysqli_error($con);
            exit();
        }
        if (mysqli_num_rows($result) == 0) return 0;
        $row = mysqli_fetch_array($result);
        $totalNumberOfOrders = $row["totalNumberOfOrders"];
        if ($totalNumberOfOrders == 0) return 0;

        $query = "SELECT COUNT(*) AS successfulOrders
                    FROM orders
                    WHERE username = \"$username\" && MONTH(orderDate) = $month && YEAR(orderDate) = YEAR(now()) && orderStatus = \"Completed\"";
        $result = mysqli_query($con, $query);
        if(mysqli_error($con)){
            echo "Failed to connect to MYSQL: " . mysqli_error($con);
            exit();
        }
        $row = mysqli_fetch_array($result);
        $successfulOrders = $row["successfulOrders"];

        $successfulOrderRate = ($successfulOrders / $totalNumberOfOrders) * 100;
        $successfulOrderRate = round($successfulOrderRate, 2);
        return $successfulOrderRate;
    }

    //Get commission rate
    function getCommission($username, $month = "MONTH(now())"){
        $con = $GLOBALS['con'];
        $query = "SELECT * FROM commissions
                    WHERE MONTH(commDate) = $month";
        $result = mysqli_query($con, $query);
        if(mysqli_error($con)){
            echo "Failed to connect to MYSQL: " . mysqli_error($con);
            exit();
        }
        $row = mysqli_fetch_array($result);
        $commRate = $row["commRate"];


        $query = "SELECT orders.orderID as orderID, completionDate, SUM(product.sellingPrice * order_product.quantity) as revenue 
                    FROM orders
                    INNER JOIN order_product ON orders.orderID = order_product.orderID
                    INNER JOIN product ON order_product.productCode = product.productCode
                    WHERE username = \"$username\" && orderStatus = \"Completed\" && MONTH(completionDate) = $month && YEAR(completionDate) = YEAR(now())
                    GROUP BY orders.orderID";
        $result = mysqli_query($con, $query);
        if(mysqli_error($con)){
            echo "Failed to connect to MYSQL: " . mysqli_error($con);
            exit();
        }
        if (mysqli_num_rows($result) == 0) return 0;
        $row = mysqli_fetch_array($result);
        $revenue = $row["revenue"];
        if ($revenue == 0) return 0; 

        $commissionPerMonth = ($revenue * $commRate)/100;
        $commissionPerMonth = round($commissionPerMonth, 2);
        return $commissionPerMonth;
    }
?>