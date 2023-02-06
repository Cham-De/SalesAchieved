<?php
    require 'connect.php';
    if(isset($_POST['submit'])){
        $companyName = $_POST["companyName"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        if(!empty($companyName) && !empty($phone) && !empty($address))
		{
			mysqli_query($con, "INSERT INTO agent(companyName, phone, address) values('$companyName', '$phone', '$address')");
            header("Location:../../Controller/store/agentsUi.php");
		}
		else
		{
			echo "<script>window.alert('Please enter valid information');</script>";
		}
        unset($_POST);
    }

    $query = "SELECT * FROM agent;";
    $result = mysqli_query($con, $query);
    if (mysqli_error($con)) {
        echo "Failed to connect to MySQL: " . mysqli_error($con);
        exit();
      }
?>