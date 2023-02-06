<?php

session_start();
require '../db-con.php';


if(isset($_POST['save'])){

    $start_d = mysqli_real_escape_string($con, $_POST['start_d']);
    $obj = mysqli_real_escape_string($con, $_POST['obj']);
    $stat = mysqli_real_escape_string($con, $_POST['stat']);
    $budget = mysqli_real_escape_string($con, $_POST['budget']);
}

$data = $_POST;

if (empty($data['start_d']) ||
    empty($data['obj']) ||
    empty($data['stat']) ||
    empty($data['budget'])) {
    
    die('Please fill all required fields!');
}
else{
    $sql = "INSERT INTO campaign (startdate, objective, cmpg_stat, budget) values ('$start_d','$obj','$stat', '$budget')";
}


$query = mysqli_query($con, $sql);
if($query){

    $_SESSION['message'] = "User added successfully";
    header("Location: '../../Controller/DMS/campaigns.php' ");
    exit(0);
}
else{
    $_SESSION['message'] = "User not added";
    header("Location: '../../Controller/DMS/campaigns.php' ");
    exit(0);
}


//signup

if(isset($_POST['signup'])){

    $name = mysqli_real_escape_string($con, $_POST['fullname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $userrole = mysqli_real_escape_string($con, $_POST['userrole']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['confpassword']);
}

$data = $_POST;

if (empty($data['fullname']) ||
    empty($data['email']) ||
    empty($data['userrole']) ||
    empty($data['gender']) || 
    empty($data['phone']) || 
    empty($data['username']) ||
    empty($data['confpassword'])) {
    
    die('Please fill all required fields!');
}
else{
    $sql = "INSERT INTO user (name, email, user_role, gender, telephone, username, password) values ('$name','$email','$userrole', '$gender', '$phone', '$username', '$password')";
}


$query = mysqli_query($con, $sql);
if($query){

    $_SESSION['message'] = "User added successfully";
    header("Location: signup.php");
    exit(0);
}
else{
    $_SESSION['message'] = "User not added";
    header("Location: signup.php");
    exit(0);
}


/*user registration

$name = $_POST['fullname'];
$email = $_POST['email'];
$userrole = $_POST['userrole'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$username = $_POST['username'];
$password = $_POST['confpassword'];

$stmt = $con->prepare("INSERT INTO user (name, email, user_role, gender, telephone, username, password) values(?,?,?,?,?,?,?)");
$stmt->bind_param("ssssiss", $name, $email, $userrole, $gender, $phone, $username, $password);
$stmt->execute();
echo "registration successfull";
$stmt->close();
$con->close();*/

?>

