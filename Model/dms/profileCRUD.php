<?php
    require __DIR__.'/../connect.php';
    //Read User Details
    $username = $_SESSION['username'];
    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($con, $query);
        if (mysqli_error($con)) {
            echo "Failed to connect to MySQL: " . mysqli_error($con);
            exit();
        }

    //Update Password
    if(isset($_POST['submit'])){
        $currentPassword = $_POST["currentPassword"];
        $newPassword = $_POST["newPassword"];
        $newPasswordCheck = $_POST["newPasswordCheck"];
        $query = "SELECT password FROM user WHERE username = '$username'";
        $res = mysqli_query($con, $query);
        $password = mysqli_fetch_assoc($res);
        if($currentPassword == $password){
            if($newPassword == $newPasswordCheck){
                $query = "UPDATE user SET password='$newPassword' WHERE username = '$username'";
                $updateResult = mysqli_query($con, $query);
            }
            else{
                echo "<script>
                    window.alert('New password and confirmation password are different');
                    window.location.href='profile.php';
                </script>";
            }
        }
        else{
            echo "<script>
                window.alert('Please enter the correct password');
                window.location.href='profile.php';
            </script>";
        }
    }

    //Update Profile
    if(isset($_POST['update'])){
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $gender = $_POST["gender"];
        if(!empty($name) && !empty($phone) && !empty($email) && !empty($gender)){
            $query = "UPDATE user SET name = '$name', telephone = '$phone', email = '$email', gender = '$gender'";
            mysqli_query($con, $query);
            header("Location: ../../Controller/DMS/profile.php");
        }
    }
?>