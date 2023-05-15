<?php

session_start();
require '../db-con.php';

if(isset($_POST['update'])){
    $wCol = mysqli_real_escape_string($con, $_POST['wCol']);
    $sCol = mysqli_real_escape_string($con, $_POST['sCol']);
    $oCol = mysqli_real_escape_string($con, $_POST['oCol']);
    
    $result = mysqli_query($con, "UPDATE delivery SET charges = CASE
    WHEN deliveryRegion = 'Within Colombo' THEN $wCol
    WHEN deliveryRegion = 'Colombo Suburbs' THEN $sCol
    WHEN deliveryRegion = 'Out of Colombo' THEN $oCol
    END");

    header("Location: ../../Controller/finance/finance-home.php ");
}
elseif(isset($_POST['rateDate'])){
    $rateDate = $_POST['rateDate'];

    $rateDateTime = DateTime::createFromFormat('M j, Y', $rateDate);

    if(!$rateDateTime){
        echo "Error: Invalid date format";
        exit;
    }

    $now = new DateTime();
    $updateAllowedDateTime = $rateDateTime->modify('+30 days');
    $diff = $now->diff($updateAllowedDateTime)->format('%a');

    if ($now < $updateAllowedDateTime){
        $updateAllowedDate = $updateAllowedDateTime->format('M j, Y');

        echo '<button class="cancelR" id="closeR" type="reset" value="Reset"><b>X</b></button>';
        echo '<div class="popup-content">';
        echo "You can't update the commission rate until after $updateAllowedDate";
        echo '</div>';

        echo '<style>
            .popup-content {
                // border: 1px solid black;
                margin-bottom: 8%;
                text-align: center;
            }
            .cancelR {
                color: #F8914A;
                cursor: pointer;
                margin-bottom: 5%;
                margin-left: 90%;
                background: white;
                border: 1px solid #F8914A;
                padding: 5px 8px;
            }
        </style>';

        echo '<script>
            const closeR = document.getElementById("closeR");
            const popup_container = document.getElementById("popup_container");

            $(document).on("click", "#closeR", function() {
                console.log("Close button clicked");
                popup_container.classList.remove("show");
            });
        </script>';
        
    }
    else{
        ?>
              <div class="topic">Commission Rate</div>
              <form name="comm" action="../../Model/finance/fin-crud.php" method="post" onsubmit="return validateForm();">
              <input type="number" id="s-date" name="rate" step="any" required>
              <input type="hidden" name="id" value="<?=$thing['commID']; ?>">
              <button class="cancel" id="closeR" type="reset" value="Reset" style="margin-left: 11%; margin-top: 2%; margin-bottom: 2%;">Cancel</button>
              <button class="submit" id="save" type="submit" value="Submit" name="updateC">Update</button>
              </form>
        <?php
        
        echo '<script>
            const closeR = document.getElementById("closeR");
            const save = document.getElementById("save");
            const popup_container = document.getElementById("popup_container");
            const form = document.forms["comm"];

            $(document).on("click", "#closeR", function() {
                console.log("Close button clicked");
                popup_container.classList.remove("show");
                resetForm();
            });
            $(document).on("click", "#save", function() {
                console.log("Close button clicked");
                if (validateForm()) {
                    form.submit();
                    popup_container.classList.remove("show");
                }
            });
        </script>';

        echo '<script>
            function validateForm() {
            const commissionRate = parseFloat(document.getElementById("s-date").value);
            if (commissionRate < 1 || commissionRate > 40) {
                alert("Commission rate should be between 1 and 40.");
                return false;
            }

            if (isNaN(commissionRate)) {
                alert("Enter a rate");
                return false;
            }
            return true;
            }
            </script>';
    }
}
elseif(isset($_POST['updateC'])){
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $rate = mysqli_real_escape_string($con, $_POST['rate']);

    $checkRate = "SELECT * FROM commissions
    ORDER BY commID DESC
    LIMIT 1";

    $query = mysqli_query($con, $checkRate);
                
    if(mysqli_num_rows($query) > 0 ){
        foreach($query as $thing){
                $rateExist = $thing['commRate'];
            }
    }

    if($rate == $rateExist){
        // Rates are the same, skip the update
        header("Location: ../../Controller/finance/commissions.php");
        exit();
    }
    else{
        // $result = mysqli_query($con, "UPDATE commissions SET commRate = '$rate' WHERE commID = $id");
        $result = mysqli_query($con, "INSERT INTO commissions (commRate) VALUES ($rate)");

        header("Location: ../../Controller/finance/commissions.php ");
    }
    
}

?>

