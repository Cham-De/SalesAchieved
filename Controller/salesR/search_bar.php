<?php

require __DIR__.'../../../Model/salesR/connect.php';

if(isset($_POST['searchValue'])){

    $orderSearch = $_POST['searchValue'];
    $result = mysqli_query($con, "SELECT * FROM orders
                                        INNER JOIN customer ON customer.customerID = orders.customerID
                                        LEFT JOIN slips ON orders.orderID = slips.orderID 
                                        WHERE orders.orderID LIKE \"%$orderSearch%\" OR customerName LIKE \"%$orderSearch%\"
                                        ORDER BY orders.orderID DESC");
    if (mysqli_error($con)) {
        echo "Failed to connect to MySQL: " . mysqli_error($con);
        exit();
    }

    if($_POST['identifier'] === 'bar_filter'){
        while ($row = mysqli_fetch_array($result)){
            $orderID = $row[0]; ?>
    
    <ul class="middle-cards">
        <li>
            <div class="cards">
                <div class="cmpg">

                    <h2>Order <?php echo $row[0];?></h2>
                    <div class="orderStatus">
                    <?php 
                    if($row['orderStatus'] == 'Pending'){?>
                        <h5 class="pending"><?php echo $row['orderStatus'];?></h5>
                    <?php } 
                    elseif($row['orderStatus'] == 'Dispatched'){?>
                        <h5 class="dispatched"><?php echo $row['orderStatus'];?></h5>
                    <?php }
                    elseif($row['orderStatus'] == 'Delivered'){?>
                        <h5 class="delivered"><?php echo $row['orderStatus'];?></h5>
                    <?php }
                    elseif($row['orderStatus'] == 'Cancel'){?>
                        <h5 class="canceled"><?php echo $row['orderStatus'];?></h5>
                    <?php }
                    else{?>
                        <h5 class="completed"><?php echo $row['orderStatus'];?></h5>
                    <?php } ?>
                    </div>
                </div>
                <div class="dv">
                    <div class="customerName">
                        <?php echo $row['customerName'];?><br>
                        <?php echo $row['orderDate'];?>
                    </div>
                    <div class="button view">
                        <table>
                            <tr>
                                <td><i class="fa-solid fa-eye"></i></td>
                                <td><button id="performance" class="view-txt"><?php echo "<a href=\"ordersUiView.php?orderID=$orderID\">View</a>";?></button></td>
                            </tr>
                        </table>
                    </div>
                    <?php if($row['orderStatus'] != "Completed" && $row['orderStatus'] != "Cancel"){ ?>
                    <div class="button update">
                        <table>
                            <tr>
                                <td><i class="fa-solid fa-pen-to-square"></i></td>
                                <td><button id="performance" class="update-txt"><a href="ordersUiUpdate.php?orderID=<?php echo $orderID; ?>">Update</a></button></td>
                            </tr>
                        </table>
                    </div>
                    <?php
                    }
                        if($row['paymentMethod'] == 'BT' && $row['orderStatus'] != 'Cancel'){?>
                            <div class="button uploadSlip">
                                <table>
                                    <tr>
                                        <td><i class="fa-solid fa-angles-up"></i></td>

                                        <?php
                                            $quer = "SELECT * FROM slips WHERE orderID = $orderID";
                                            $res = mysqli_query($con, $quer);

                                            if (mysqli_num_rows($res) > 0) {
                                                // image already exists, set parameter to "view"
                                                $param = "view Slip";
                                            } else {
                                                // image does not exist, set parameter to "upload"
                                                $param = "upload Slip";
                                            }
                                        ?>
                                        <td><button id="performance" class="uploadSlip-txt"><a href="uploadSlip.php?orderID=<?php echo $orderID; ?>"><?php echo $param; ?></a></button></td>
                                    </tr>
                                </table>
                            </div>
                    <?php } ?>
                    <!-- <div class="button delete">
                        <table>
                            <tr>
                                <td><i class="fa-solid fa-trash"></i></td>
                                <td><button id="delete" class="delete-txt">Delete</button></td>
                            </tr>
                        </table>
                    </div> -->
                </div>
                <?php
                    if ($row['approvalStatus'] == "disapproved" && $row['rejectedReason']) {
                        // Show the div if there's a rejectedReason value
                        echo '<div class="reason" onclick="toggleReason(this)">Payment Rejected</div>';
                        echo '<div class="reasonText" style="display: none;">'.$row['rejectedReason'].'</div>';
                        }
                ?>
            </div>
        </li>
    </ul>
    <?php }
    }
    
}

if(isset($_POST['sql_query'])){
    $sql = $_POST['sql_query'];

    $result = mysqli_query($con, $sql);
    if (mysqli_error($con)) {
        echo "Failed to connect to MySQL: " . mysqli_error($con);
        exit();
    }

    if($_POST['identifier'] === 'orders_filter'){
        while ($row = mysqli_fetch_array($result)){
            $orderID = $row[0]; ?>
    
    <ul class="middle-cards">
        <li>
            <div class="cards">
                <div class="cmpg">

                    <h2>Order <?php echo $row[0];?></h2>
                    <div class="orderStatus">
                    <?php 
                    if($row['orderStatus'] == 'Pending'){?>
                        <h5 class="pending"><?php echo $row['orderStatus'];?></h5>
                    <?php } 
                    elseif($row['orderStatus'] == 'Dispatched'){?>
                        <h5 class="dispatched"><?php echo $row['orderStatus'];?></h5>
                    <?php }
                    elseif($row['orderStatus'] == 'Delivered'){?>
                        <h5 class="delivered"><?php echo $row['orderStatus'];?></h5>
                    <?php }
                    elseif($row['orderStatus'] == 'Cancel'){?>
                        <h5 class="canceled"><?php echo $row['orderStatus'];?></h5>
                    <?php }
                    else{?>
                        <h5 class="completed"><?php echo $row['orderStatus'];?></h5>
                    <?php } ?>
                    </div>
                </div>
                <div class="dv">
                    <div class="customerName">
                        <?php echo $row['customerName'];?><br>
                        <?php echo $row['orderDate'];?>
                    </div>
                    <div class="button view">
                        <table>
                            <tr>
                                <td><i class="fa-solid fa-eye"></i></td>
                                <td><button id="performance" class="view-txt"><?php echo "<a href=\"ordersUiView.php?orderID=$orderID\">View</a>";?></button></td>
                            </tr>
                        </table>
                    </div>
                    <?php if($row['orderStatus'] != "Completed" && $row['orderStatus'] != "Cancel"){ ?>
                    <div class="button update">
                        <table>
                            <tr>
                                <td><i class="fa-solid fa-pen-to-square"></i></td>
                                <td><button id="performance" class="update-txt"><a href="ordersUiUpdate.php?orderID=<?php echo $orderID; ?>">Update</a></button></td>
                            </tr>
                        </table>
                    </div>
                    <?php
                    }
                        if($row['paymentMethod'] == 'BT' && $row['orderStatus'] != 'Cancel'){?>
                            <div class="button uploadSlip">
                                <table>
                                    <tr>
                                        <td><i class="fa-solid fa-angles-up"></i></td>

                                        <?php
                                            $quer = "SELECT * FROM slips WHERE orderID = $orderID";
                                            $res = mysqli_query($con, $quer);

                                            if (mysqli_num_rows($res) > 0) {
                                                // image already exists, set parameter to "view"
                                                $param = "view Slip";
                                            } else {
                                                // image does not exist, set parameter to "upload"
                                                $param = "upload Slip";
                                            }
                                        ?>
                                        <td><button id="performance" class="uploadSlip-txt"><a href="uploadSlip.php?orderID=<?php echo $orderID; ?>"><?php echo $param; ?></a></button></td>
                                    </tr>
                                </table>
                            </div>
                    <?php } ?>
                    <!-- <div class="button delete">
                        <table>
                            <tr>
                                <td><i class="fa-solid fa-trash"></i></td>
                                <td><button id="delete" class="delete-txt">Delete</button></td>
                            </tr>
                        </table>
                    </div> -->
                </div>
                <?php
                    if ($row['approvalStatus'] == "disapproved" && $row['rejectedReason']) {
                        // Show the div if there's a rejectedReason value
                        echo '<div class="reason" onclick="toggleReason(this)">Payment Rejected</div>';
                        echo '<div class="reasonText" style="display: none;">'.$row['rejectedReason'].'</div>';
                        }
                ?>
            </div>
        </li>
    </ul>
    <?php }
    }
}

?>