<?php
    function getOrderDetails($agentUsername){
        $query = "SELECT * FROM orders 
                    INNER JOIN customer ON orders.customerID = customer.customerID
                    LEFT JOIN slips ON orders.orderID = slips.orderID
                    WHERE agentUsername = \"$agentUsername\"";
        $result = mysqli_query($GLOBALS['con'], $query);
        if (mysqli_error($GLOBALS['con'])) {
            echo "Failed to connect to MySQL: " . mysqli_error($GLOBALS['con']);
            exit();
        }
        return $result;
    }

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
?>