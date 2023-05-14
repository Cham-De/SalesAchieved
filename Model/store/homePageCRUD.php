<?php
    require __DIR__.'/../../Model/utils.php';
    $role = "Store Manager";
    $userData = check_login($role);


    //Get number of customer orders
    function getCustomerOrders(){
        $conn = $GLOBALS['conn'];
        $query = "SELECT COUNT(*) AS totalNoOfOrders
                    FROM orders
                    WHERE MONTH(orderDate) = MONTH(now())";
        $result = mysqli_query($conn, $query);
        if(mysqli_error($conn)){
            echo "Failed to connect to MYSQL: " . mysqli_error($con);
            exit();
        }
        $row = mysqli_fetch_array($result);
        $totalNoOfOrders = $row["totalNoOfOrders"];
        return $totalNoOfOrders;
    }

    //Get number of pending orders
    function getPendingOrders(){
        $conn = $GLOBALS['conn'];
        $query = "SELECT COUNT(*) AS totalNoOfPendingOrders
                    FROM orders
                    WHERE MONTH(orderDate) = MONTH(now()) && orderStatus = 'Pending'";
        $result = mysqli_query($conn, $query);
        if(mysqli_error($conn)){
            echo "Failed to connect to MYSQL: " . mysqli_error($con);
            exit();
        }
        $row = mysqli_fetch_array($result);
        $totalNoOfPendingOrders = $row["totalNoOfPendingOrders"];
        return $totalNoOfPendingOrders;
    }

    //Get number of orders not assigned
    function getOrdersNotAssigned(){
        $conn = $GLOBALS['conn'];
        $query = "SELECT COUNT(*) AS noOfOrdersNotAssigned
                    FROM orders
                    WHERE agentUsername is NULL && MONTH(orderDate) = MONTH(now())";
        $result = mysqli_query($conn, $query);
        if(mysqli_error($conn)){
            echo "Failed to connect to MYSQL: " . mysqli_error($con);
            exit();
        }
        $row = mysqli_fetch_array($result);
        $noOfOrdersNotAssigned = $row["noOfOrdersNotAssigned"];
        return $noOfOrdersNotAssigned;
    }

    function getOnTimeDeliveryRate(){
        $conn = $GLOBALS['conn'];
        $query = "SELECT COUNT(*) AS noOfDeliveriesOnTime
                    FROM orders
                    WHERE deliveryDate >= actualDeliveryDate && (orderStatus = 'Delivered' OR orderStatus = 'Completed') && MONTH(orderDate) = MONTH(now())";
        $result = mysqli_query($conn, $query);
        if(mysqli_error($conn)){
            echo "Failed to connect to MYSQL: " . mysqli_error($con);
            exit();
        }
        if (mysqli_num_rows($result) == 0) return 0;
        $row = mysqli_fetch_array($result);
        $noOfDeliveriesOnTime = $row["noOfDeliveriesOnTime"];
        if ($noOfDeliveriesOnTime == 0) return 0;

        $query = "SELECT COUNT(*) AS totalNoOfDeliveries
                    FROM orders
                    WHERE (orderStatus = 'Delivered' OR orderStatus = 'Completed') && MONTH(orderDate) = MONTH(now())";
        $result = mysqli_query($conn, $query);
        if(mysqli_error($conn)){
            echo "Failed to connect to MYSQL: " . mysqli_error($con);
            exit();
        }
        if (mysqli_num_rows($result) == 0) return 0;
        $row = mysqli_fetch_array($result);
        $totalNoOfDeliveries = $row["totalNoOfDeliveries"];
        if ($totalNoOfDeliveries == 0) return 0;
        
        $onTimeDeliveryRate = ($noOfDeliveriesOnTime/$totalNoOfDeliveries)*100;
        $onTimeDeliveryRate = round($onTimeDeliveryRate, 2);
        return $onTimeDeliveryRate;
    }