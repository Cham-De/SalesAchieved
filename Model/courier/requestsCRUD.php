<?php
    require __DIR__.'/../connect.php';

    if(isset($_POST['submit'])){
        $id = $_POST['requestID'];
        $orderID = $_POST["orderID"];
        $agentUsername = $_SESSION["username"];
        mysqli_query($con, "UPDATE orders SET agentUsername = \"$agentUsername\" WHERE orderID = \"$orderID\"");
        mysqli_query($con, "DELETE FROM request WHERE requestID = \"$id\"");
        
        $result = mysqli_query($con, "SELECT companyName FROM agent WHERE agentUsername = \"$agentUsername\"");
        $companyName = mysqli_fetch_assoc($result)["companyName"];
        mysqli_query($con, "INSERT INTO notification (title, message, recipient) VALUES (\"Request accepted\", '$companyName accepted Order $id.', 'Store Manager');");
    }

    if(isset($_POST['cancel'])){
        $id = $_POST['requestID'];
        $agentUsername = $_SESSION["username"];
        mysqli_query($con, "DELETE FROM request WHERE requestID = \"$id\"");

        $result = mysqli_query($con, "SELECT companyName FROM agent WHERE agentUsername = \"$agentUsername\"");
        $companyName = mysqli_fetch_assoc($result)["companyName"];
        mysqli_query($con, "INSERT INTO notification (title, message, recipient) VALUES (\"Request rejected\", '$companyName rejected Order $id.', 'Store Manager');");
    }

    function getRequest($agentUsername){
        $query = "SELECT * FROM request 
                    INNER JOIN orders ON orders.orderID = request.orderID
                    INNER JOIN delivery ON orders.deliveryRegion = delivery.deliveryRegion
                    INNER JOIN customer ON orders.customerID = customer.customerID
                    INNER JOIN agent ON agent.agentUsername = request.agentUsername
                    WHERE agent.agentUsername = \"$agentUsername\"";
        $result = mysqli_query($GLOBALS['con'], $query);
        if(mysqli_error($GLOBALS['con'])){
            echo "Failed to connect to MySQL: " . mysqli_error($GLOBALS['con']);
            exit();
        }
        return $result;
    }