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
			$user_data = mysqli_fetch_assoc($result);
			if ($user_data['user_role'] == $role)
				return $user_data['username'];
		}
	}
	
	header("Location:../../Controller/home/login-final.php");
    die;
}
