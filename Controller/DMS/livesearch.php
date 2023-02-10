<?php

require '../../Model/db-con.php';

if(isset($_POST['input'])){

    $input = $_POST['input'];
    $query = "SELECT * FROM campaign WHERE cmpg_stat LIKE '{$input}%' ";

    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0){
        ?>
           <table class="content-table">
                <thead>
                    <tr>
                        <th>Campaign ID</th>
                        <th>Start Date</th>
                        <th>Objective</th>
                        <th>Status</th>
                        <th>Budget<br>(Rs.)</th>
                    </tr>
                </thead>
           </table> 
        <?php
    }

}


?>