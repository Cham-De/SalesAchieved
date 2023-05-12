<?php

require '../../Model/db-con.php';

if(isset($_POST['searchVal'])){

    $searchVal = $_POST['searchVal'];
    // $key = "%{$_POST['searchVal']}%";
    $sql = "SELECT * FROM customer WHERE customerName LIKE '%".$searchVal."%' ";

    $result = mysqli_query($con,$sql);

    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){

            ?>
            <li>
                <a href="#" style="text-decoration: none;padding:20px;margin-top:10px;"><?php echo $row['customerName'] ?></a>
            </li>
            <?php
            
        }
    }
    else{
        echo '<p>Record not found</p>';
    }
}
?>