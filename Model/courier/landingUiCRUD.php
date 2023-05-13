<?php
    require __DIR__.'/../connect.php';
    require __DIR__.'/../../Model/utils.php';
    $agentData = courier_check_login();

    if (isset($_POST['month_fil_op'])){
        $month_name = $_POST['month_fil_op'];
      
        if($month_name == "reset_filter"){
            $ordersAccepted = getOrdersAccepted($agentData['agentUsername']);
            $completedOrders = getCompletedOrders($agentData['agentUsername']);
            $inCompletedOrders = getInCompletedOrders($agentData['agentUsername']);
            $onTimeDeliveryRate = getOnTimeDeliveryRate($agentData['agentUsername']);
            $requestsPending = getRequestsPending($agentData['agentUsername']);
        }
        else {
            $month_num = date("m", strtotime($month_name));
            $ordersAccepted = getOrdersAccepted($agentData['agentUsername'], $month_num);
            $completedOrders = getCompletedOrders($agentData['agentUsername'], $month_num);
            $inCompletedOrders = getInCompletedOrders($agentData['agentUsername'], $month_num);
            $onTimeDeliveryRate = getOnTimeDeliveryRate($agentData['agentUsername'], $month_num);
            $requestsPending = getRequestsPending($agentData['agentUsername'], $month_num);
        }
        echo '
        
            <div class="card1">
                <h2>Accpted<br />Orders</h2>
                <h4>Monthly</h4>
                <h1>'.$ordersAccepted.'</h1>
            </div>

            <div class="card2">
                <h2>Completed <br>Orders </h2>
                <h4>Monthly</h4>
                <h1>'.$completedOrders.'</h1>
            </div>
            <div class="card3">
                <h2>Incompleted<br>Orders</h2>
                <h4>Monthly</h4>
                <h1>'.$inCompletedOrders.'</h1>
            </div>
            <div class="card4">
                <h2>Ontime-Delivery <br>Rate </h2>
                <h4>Monthly</h4>
                <h1>'.$onTimeDeliveryRate.'%</h1>
            </div>
            <div class="card5">
                <h2>Requests <br>Pending </h2>
                <h4>Monthly</h4>
                <h1>'.$requestsPending.'</h1>
            </div>
        ';
        
    }

    //Assigned orders
    function getOrdersAccepted($agentUsername, $month = "MONTH(now())"){
        $con = $GLOBALS['con'];
        $query = "SELECT COUNT(*) AS noOfOrdersAccepted
                    FROM orders
                    WHERE agentUsername = '$agentUsername' && MONTH(orderDate) = $month";
        $result = mysqli_query($con, $query);
        if(mysqli_error($con)){
            echo "Failed to connect to MYSQL: " . mysqli_error($con);
            exit();
        }
        if (mysqli_num_rows($result) == 0) return 0;
        $row = mysqli_fetch_array($result);
        $noOfOrdersAccepted = $row["noOfOrdersAccepted"];
        if ($noOfOrdersAccepted == 0) return 0;
        return $noOfOrdersAccepted;
    }

    //Completed Orders
    function getCompletedOrders($agentUsername, $month = "MONTH(now())"){
        $con = $GLOBALS['con'];
        $query = "SELECT COUNT(*) AS noOfCompletedOrders
                    FROM orders
                    WHERE orderStatus = 'Completed' && agentUsername = '$agentUsername' && MONTH(orderDate) = $month";
        $result = mysqli_query($con, $query);
        if(mysqli_error($con)){
            echo "Failed to connect to MYSQL: " . mysqli_error($con);
            exit();
        }
        if (mysqli_num_rows($result) == 0) return 0;
        $row = mysqli_fetch_array($result);
        $noOfCompletedOrders = $row["noOfCompletedOrders"];
        if ($noOfCompletedOrders == 0) return 0;
        return $noOfCompletedOrders;
    }

    //Incompleted Orders
    function getInCompletedOrders($agentUsername, $month = "MONTH(now())"){
        $con = $GLOBALS['con'];
        $query = "SELECT COUNT(*) AS noOfIncompletedOrders
                    FROM orders
                    WHERE orderStatus = 'Dispatched' && agentUsername = '$agentUsername' && MONTH(orderDate) = $month";
        $result = mysqli_query($con, $query);
        if(mysqli_error($con)){
            echo "Failed to connect to MYSQL: " . mysqli_error($con);
            exit();
        }
        if (mysqli_num_rows($result) == 0) return 0;
        $row = mysqli_fetch_array($result);
        $noOfIncompletedOrders = $row["noOfIncompletedOrders"];
        if ($noOfIncompletedOrders == 0) return 0;
        return $noOfIncompletedOrders;
    }

    //Ontime-Delivery Date
    function getOnTimeDeliveryRate($agentUsername, $month = "MONTH(now())"){
        $con = $GLOBALS['con'];
        $query = "SELECT COUNT(*) AS noOfDeliveriesOnTime
                    FROM orders
                    WHERE deliveryDate >= actualDeliveryDate && (orderStatus = 'Delivered' OR orderStatus = 'Completed') && agentUsername = '$agentUsername' && MONTH(orderDate) = $month";
        $result = mysqli_query($con, $query);
        if(mysqli_error($con)){
            echo "Failed to connect to MYSQL: " . mysqli_error($con);
            exit();
        }
        if (mysqli_num_rows($result) == 0) return 0;
        $row = mysqli_fetch_array($result);
        $noOfDeliveriesOnTime = $row["noOfDeliveriesOnTime"];
        if ($noOfDeliveriesOnTime == 0) return 0;

        $query = "SELECT COUNT(*) AS totalNoOfDeliveries
                    FROM orders
                    WHERE (orderStatus = 'Delivered' OR orderStatus = 'Completed') && agentUsername = '$agentUsername' && MONTH(orderDate) = $month";
                    $result = mysqli_query($con, $query);
                    if(mysqli_error($con)){
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

    //Requests Pending
    function getRequestsPending($agentUsername, $month = "MONTH(now())"){
        $con = $GLOBALS['con'];
        $query = "SELECT COUNT(*) AS noOfRequestsPending
                    FROM request
                    WHERE agentUsername = '$agentUsername' && MONTH(now()) = $month";
        $result = mysqli_query($con, $query);
        if(mysqli_error($con)){
            echo "Failed to connect to MYSQL: " . mysqli_error($con);
            exit();
        }
        if (mysqli_num_rows($result) == 0) return 0;
        $row = mysqli_fetch_array($result);
        $noOfRequestsPending = $row["noOfRequestsPending"];
        if ($noOfRequestsPending == 0) return 0;
        return $noOfRequestsPending;
    }
?>