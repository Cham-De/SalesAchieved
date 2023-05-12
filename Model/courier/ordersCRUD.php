<?php

    function getOrderDetails($agentUsername){
        //Search bar functionality
        if(isset($_POST['search'])){
            $orderSearch = $_POST['orderSearch'];
            $query = "SELECT * FROM orders 
                        INNER JOIN customer ON orders.customerID = customer.customerID
                        LEFT JOIN slips ON orders.orderID = slips.orderID
                        WHERE (agentUsername = \"$agentUsername\") && (orderStatus != 'Completed') && (orders.orderID LIKE \"%$orderSearch%\" OR customerName LIKE \"%$orderSearch%\"
                        ORDER BY orders.orderID DESC)";
            $result = mysqli_query($GLOBALS['con'], $query);
            if (mysqli_error($GLOBALS['con'])) {
                echo "Failed to connect to MySQL: " . mysqli_error($GLOBALS['con']);
                exit();
            }
        }

        else{
            $query = "SELECT * FROM orders 
                        INNER JOIN customer ON orders.customerID = customer.customerID
                        LEFT JOIN slips ON orders.orderID = slips.orderID
                        WHERE agentUsername = \"$agentUsername\" && orderStatus != 'Completed'
                        ORDER BY orders.orderID DESC";
            $result = mysqli_query($GLOBALS['con'], $query);
            if (mysqli_error($GLOBALS['con'])) {
                echo "Failed to connect to MySQL: " . mysqli_error($GLOBALS['con']);
                exit();
            }
        }
        return $result;
    }

    //Add Note CRUD
    if(isset($_POST['submit'])){
        $orderID = $_POST["orderID"];
        $note = $_POST["note"];

        if(!empty($orderID) && !empty($note))
		{
            mysqli_query($con, "INSERT INTO note(orderID, note) values('$orderID', '$note')");
            header("Location:../../Controller/courier/ordersUi.php");
		}
		else
		{
			echo "<script>
            window.alert('Please enter valid information');
            window.location.href='ordersUi.php';
            </script>";
		}
        unset($_POST);
    }

    //Delivered Button CRUD
    if(isset($_POST["delivered"])){
        $orderID = $_POST['orderID'];
        mysqli_query($con, "UPDATE orders SET orderStatus = \"Delivered\" WHERE orderID = \"$orderID\"");
    }
?>