<?php
    
include("connect-db.php");

    if (isset($_GET["get_events"]))
    {
        $query = "SELECT deliveryDate FROM orders";
        $result = mysqli_query($conn, $query);
        if (mysqli_error($conn)) {
            echo "Failed to connect to MySQL: " . mysqli_error($con);
            exit();
        }

        $newArray = [];
        while( $row = mysqli_fetch_assoc( $result)){
            $newArray[] = $row["deliveryDate"];
        }
        echo join(" ", $newArray);
    }

    if (isset($_GET["get_date_events"]))
    {
        $dateStr = $_GET["get_date_events"];
        $query = "SELECT * FROM orders 
                    INNER JOIN customer ON customer.customerID = orders.customerID WHERE deliveryDate='$dateStr'";
        $result = mysqli_query($conn, $query);
        while( $row = mysqli_fetch_assoc( $result)){
            echo '
            <div class="events">
                <div class="event">
                    <div class="title">
                        <h1 class="event-title">Order '.$row["orderID"].'</h1>
                    </div>
                    <div class="event-time">
                        Customer: '.$row["customerName"].'
                    </div>
                </div>
            </div>';
        }
        
    }

?>

