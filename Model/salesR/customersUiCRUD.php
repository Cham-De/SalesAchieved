<?php
    require 'connect.php';
    //Create - Form to enter customer details to the system
    if(isset($_POST['submit'])){
        $name = $_POST["name"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $socialMediaPlatform = $_POST["socialMediaPlatform"];
        if(!empty($name) && !empty($address) && !empty($phone) && !empty($socialMediaPlatform))
		{
            if(strlen($phone) == 10){
			    mysqli_query($con, "INSERT INTO customer(name, address, phone, email, socialMediaPlatform) values('$name', '$address', '$phone', '$email', '$socialMediaPlatform')");
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
        $email = htmlspecialchars($_POST["email"]);
        $socialMediaPlatform = htmlspecialchars($_POST["socialMediaPlatform"]);

        if(!empty($name) && !empty($address) && !empty($phone) && !empty($email) && !empty($socialMediaPlatform))
		{
            if(strlen($phone) == 10){
                $sql = "UPDATE customer set name='$name', address='$address', phone='$phone', email='$email', socialMediaPlatform='$socialMediaPlatform' WHERE customerID = $cusID";
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

    //Delete - Delete a customer from the system
    // if(isset($_POST['submit_delete'])){
    //     $customerID=$_POST['deleteid'];

    //     $sql="UPDATE orders SET customerID='10'";
    //     $result=mysqli_query($con,$sql);
    //     $sql="DELETE FROM customer WHERE customerID='$customerID'";
    //     $result=mysqli_query($con,$sql);
    //     if($result){
    //         echo "Deleted successfully";
    //         header("location:../../Controller/salesR/customersUi.php");
    //     }else{
    //         echo "Delete unsuccessful: " . mysqli_error($con);
    //         // die(mysqli_error($con));
    //     }
    // }
?>