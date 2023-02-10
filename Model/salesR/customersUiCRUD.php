<?php
    require 'connect.php';
    if(isset($_POST['submit'])){
        $name = $_POST["name"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $socialMediaPlatform = $_POST["socialMediaPlatform"];
        if(!empty($name) && !empty($address) && !empty($phone) && !empty($socialMediaPlatform))
		{
            if(strlen($phone) == 10){
			    mysqli_query($con, "INSERT INTO customer(name, address, phone, socialMediaPlatform) values('$name', '$address', '$phone', '$socialMediaPlatform')");
                header("Location:../../Controller/salesR/customersUi.php");
            }
            else{
                echo "<script>window.alert('The phone number does not contain 10 digits');</script>";
            }
		}
		else
		{
			echo "<script>window.alert('Please enter valid information');</script>";
		}
        unset($_POST);
    }

    $query = "SELECT * FROM customer;";
    $result = mysqli_query($con, $query);
    if (mysqli_error($con)) {
        echo "Failed to connect to MySQL: " . mysqli_error($con);
        exit();
    }
?>