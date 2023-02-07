<?php
session_start();
require '../db-con.php';

if(isset($_POST['delete_user'])){

    $user_id = mysqli_real_escape_string($con, $_POST['delete_user']);
    $sql = "DELETE FROM user  WHERE id='$user_id'";
    $query = mysqli_query($con, $sql);

    if($query){
        $_SESSION['message'] = "Deleted";
        header("Location: '../../Controller/admin/admin_landing.php' ");
        exit(0);
    }
    else{
        $_SESSION['message'] = "Not Deleted";
        header("Location: '../../Controller/admin/admin_landing.php'");
        exit(0);
    }
}

if(isset($_POST['submit'])){

    $urole = mysqli_real_escape_string($con, $_POST['userrole']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $gen = mysqli_real_escape_string($con, $_POST['gender']);
    $pho = mysqli_real_escape_string($con, $_POST['phone']);
    $uname = mysqli_real_escape_string($con, $_POST['username']);
    $pwd = mysqli_real_escape_string($con, $_POST['password']);
}
$data = $_POST;

if (empty($data['userrole']) ||
    empty($data['name']) ||
    empty($data['gender']) ||
    empty($data['phone']) ||
    empty($data['username']) ||
    empty($data['password']) ||
    empty($data['email'])) {
    
    die('Please fill all required fields!');
}
else{
    $sql = "INSERT INTO user (name, email, user_role, gender, telephone, username, password) values ('$urole','$name','$email', '$gen', '$pho', '$uname', '$pwd')";
}

$query = mysqli_query($con, $sql);
if($query){

    $_SESSION['message'] = "User added successfully";
    header("Location: '../../Controller/admin/admin_landing.php' ");
    exit(0);
}
else{
    $_SESSION['message'] = "User not added";
    header("Location: '../../Controller/admin/admin_landing.php' ");
    exit(0);
}

?>