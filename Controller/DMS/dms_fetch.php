<?php

require '../../Model/db-con.php';

if(isset($_POST['request'])){

    $request = $_POST['request'];

    $query = "SELECT * FROM campaign WHERE cmpg_stat = '$request' ";
    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);
}

?>

<table class="content-table">
    <?php 
        if($count){    
    ?>
     <thead>
        <tr>
            <th>Campaign ID</th>
            <th>Start Date</th>
            <th>Objective</th>
            <th>Status</th>
            <th>Budget<br>(Rs.)</th>
        </tr>
        <?php
        }
        else{
            echo "No matching records";
        }
        ?>
    </thead>

    <tbody>
        <?php
            while($thing = mysqli_fetch_assoc($result)){

                ?>
                <tr>
                    <td scope="row"><?=$thing['id']; ?></td>
                    <td><?=$thing['startdate']; ?></td>
                    <td><?=$thing['objective']; ?></td>
                    <td>
                        <select id="status" name="stat">
                          <option value="unknown"><?=$thing['cmpg_stat']; ?></option>
                          <option value="tobelaunched">To-be Launched</option>
                          <option value="ongoing">Ongoing</option>
                          <option value="complete">Complete</option>
                        </select>   
                    </td>
                    <td><?=$thing['budget']; ?></td> 
                </tr>

                <?php
            }
        
        ?>
    </tbody>

</table>