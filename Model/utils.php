<?php
require __DIR__.'/connect.php';
session_start();

function check_login($role)
{
	if(isset($_SESSION['username']))
	{
		$id = $_SESSION['username'];
		$query = "SELECT * from user where username = '$id' limit 1";
		
		$result = mysqli_query($GLOBALS['con'], $query);
		if($result && mysqli_num_rows($result) > 0)
		{
			$userData = mysqli_fetch_assoc($result);
			if ($userData['user_role'] == $role)
				return $userData;
		}
	}
	
	header("Location:../../Controller/home/login-final.php");
    die;
}
