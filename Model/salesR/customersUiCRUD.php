<?php
    require 'connect.php';
    //Create - Form to enter customer details to the system
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
                echo "<script>
                window.alert('The phone number does not contain 10 digits');
                window.location.href='customersUi.php';
                </script>";
            }
		}
		else
		{
			echo "<script>
            window.alert('Please enter valid information');
            window.location.href='customersUi.php';
            </script>";
		}
        unset($_POST);
    }

    //Update - Update customer details
    if(isset($_POST['update'])) {
        $cusID = htmlspecialchars($_POST["customerID"]);
        $name = htmlspecialchars($_POST["name"]);
        $address = htmlspecialchars($_POST["address"]);
        $phone = htmlspecialchars($_POST["phone"]);
        $socialMediaPlatform = htmlspecialchars($_POST["socialMediaPlatform"]);

        if(!empty($name) && !empty($address) && !empty($phone) && !empty($socialMediaPlatform))
		{
            if(strlen($phone) == 10){
                $sql = "UPDATE customer set name='$name', address='$address', phone='$phone', socialMediaPlatform='$socialMediaPlatform' WHERE customerID = $cusID";
			    mysqli_query($con, $sql);
                header("Location:../../Controller/salesR/customersUi.php");
            }
            else{
                echo "<script>
                window.alert('The phone number does not contain 10 digits');
                window.location.href='../../Controller/salesR/customersUi.php';
                </script>";
            }
		}
		else
		{
			echo "<script>
            window.alert('Please enter valid information');
            window.location.href='../../Controller/salesR/customersUi.php';
            </script>";
		}
        unset($_POST);
    }

    //Read - Read customer details from the database
    $query = "SELECT * FROM customer;";
    $result = mysqli_query($con, $query);
    if (mysqli_error($con)) {
        echo "Failed to connect to MySQL: " . mysqli_error($con);
        exit();
    }
?>