<?php
    require __DIR__.'/../connect.php';
    $query = "SELECT * FROM user";
    $userData = mysqli_query($con, $query);
    if (mysqli_error($con)) {
        echo "Failed to connect to MySQL: " . mysqli_error($con);
        exit();
    }

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

    //Sales per Sales Rep CRUD
    function getSalesPerRep($username){
        $con = $GLOBALS['con'];
        $query = "SELECT SUM(product.sellingPrice * order_product.quantity) AS totalRevenue
                    FROM orders
                    INNER JOIN order_product ON orders.orderID = order_product.orderID
                    INNER JOIN product ON product.productCode = order_product.productCode
                    WHERE MONTH(orderDate) = MONTH(now()) && YEAR(orderDate) = YEAR(now())";
        $result = mysqli_query($con, $query);
        if(mysqli_error($con)){
            echo "Failed to connect to MYSQL: " . mysqli_error($con);
            exit();
        }
        $row = mysqli_fetch_array($result);
        $totalRevenue = $row["totalRevenue"];

        $query = "SELECT COUNT(*) AS numberOfSales
                    FROM orders
                    WHERE username = \"$username\" && MONTH(orderDate) = MONTH(now()) && YEAR(orderDate) = YEAR(now())
                    GROUP BY username";
        $result = mysqli_query($con, $query);
        if(mysqli_error($con)){
            echo "Failed to connect to MYSQL: " . mysqli_error($con);
            exit();
        }
        $row = mysqli_fetch_array($result);
        $numberOfSales = $row["numberOfSales"];
        return $totalRevenue / $numberOfSales;
    }

    //Positive feedback rate CRUD
    function getPositiveFeedback(){
        $con = $GLOBALS['con'];
        $query = "SELECT COUNT(*) AS totalFeedback
                    FROM feedback
                    INNER JOIN orders ON orders.orderID = feedback.orderID
                    WHERE MONTH(orderDate) = MONTH(now()) && YEAR(orderDate) = YEAR(now())";
        $result = mysqli_query($con, $query);
        if(mysqli_error($con)){
            echo "Failed to connect to MYSQL: " . mysqli_error($con);
            exit();
        }
        $row = mysqli_fetch_array($result);
        $totalFeedback = $row["totalFeedback"];

        $query = "SELECT COUNT(*) AS totalPositiveFeedback
                    FROM feedback
                    INNER JOIN orders ON orders.orderID = feedback.orderID
                    WHERE MONTH(orderDate) = MONTH(now()) && YEAR(orderDate) = YEAR(now()) && comment = \"Positive\"";
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
?>