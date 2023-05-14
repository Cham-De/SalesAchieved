<?php

require __DIR__.'../../../Model/salesR/connect.php';
require __DIR__.'/../../Model/utils.php';
require_once("../../Model/courier/ordersCRUD.php");
require __DIR__.'/../../Model/notificationCRUD.php';
$agentData = courier_check_login();
$agentUsername = $agentData['agentUsername'];

if(isset($_POST['searchValue'])){
    $orderSearch = $_POST['searchValue'];
    $query = "SELECT * FROM orders 
                INNER JOIN customer ON orders.customerID = customer.customerID
                LEFT JOIN slips ON orders.orderID = slips.orderID
                WHERE (agentUsername = \"$agentUsername\") && (orderStatus != 'Completed') && (orders.orderID LIKE \"%$orderSearch%\" OR customerName LIKE \"%$orderSearch%\")
                ORDER BY orders.orderID DESC";
    
    $result = mysqli_query($GLOBALS['con'], $query);
    if (mysqli_error($GLOBALS['con'])) {
        echo "Failed to connect to MySQL: " . mysqli_error($GLOBALS['con']);
        exit();
    }

    if($_POST['identifier'] === 'cou_search_filter'){
        while ($row = mysqli_fetch_array($result)){
            $orderID = $row[0]; ?>
            
            <div class="cards-middle" id="cards_middle">
    <ul class="middle-cards">
        <li>
            <div class="cards">
                <div class="cmpg">
                    <h2>Order <?php echo $orderID;?></h2>
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
                        <?php echo $row['deliveryDate'];?>
                    </div>
                    <div class="button view">
                        <table>
                            <tr>
                                <td><i class="fa-solid fa-eye"></i></td>
                                <td><button id="performance" class="view-txt"><?php echo "<a href=\"ordersUiView.php?orderID=$orderID\">View</a>";?></button></td>
                            </tr>
                        </table>
                    </div>
                    <?php
                        if($row['orderStatus'] == 'Dispatched'){
                    ?>
                        <div class="button delivered">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-clipboard-check"></i></td>
                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="orderID" value="<?php echo $row[0]; ?>">
                                            <button id="delivered" class="delivered-txt" type="delivered" value="Delivered" name="delivered">Delivered</button>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    <?php
                        }
                    ?>
                    <?php
                    if($row['paymentMethod'] == 'COD'){?>
                    <div class="button uploadSlip">
                        <table>
                            <tr>
                                <td><i class="fa-solid fa-angles-up"></i></td>
                                <!-- Slip upload functionality -->
                                <?php
                                    $quer = "SELECT * FROM slips WHERE orderID = $orderID;";
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
                    <?php }?>  
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

        if($_POST['identifier'] === 'cou_dropdown_filter'){
            while ($row = mysqli_fetch_array($result)){
                $orderID = $row[0]; ?>
                
                <div class="cards-middle" id="cards_middle">
        <ul class="middle-cards">
            <li>
                <div class="cards">
                    <div class="cmpg">
                        <h2>Order <?php echo $orderID;?></h2>
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
                            <?php echo $row['deliveryDate'];?>
                        </div>
                        <div class="button view">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-eye"></i></td>
                                    <td><button id="performance" class="view-txt"><?php echo "<a href=\"ordersUiView.php?orderID=$orderID\">View</a>";?></button></td>
                                </tr>
                            </table>
                        </div>
                        <?php
                            if($row['orderStatus'] == 'Dispatched'){
                        ?>
                            <div class="button delivered">
                                <table>
                                    <tr>
                                        <td><i class="fa-solid fa-clipboard-check"></i></td>
                                        <td>
                                            <form method="post">
                                                <input type="hidden" name="orderID" value="<?php echo $row[0]; ?>">
                                                <button id="delivered" class="delivered-txt" type="delivered" value="Delivered" name="delivered">Delivered</button>
                                            </form>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        <?php
                            }
                        ?>
                        <?php
                        if($row['paymentMethod'] == 'COD'){?>
                        <div class="button uploadSlip">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-angles-up"></i></td>
                                    <!-- Slip upload functionality -->
                                    <?php
                                        $quer = "SELECT * FROM slips WHERE orderID = $orderID;";
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
                        <?php }?>  
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