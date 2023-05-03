<?php 

require __DIR__.'/../connect.php';

if (isset($_POST['submit']) && isset($_FILES['my_image'])) {

	$id = $_POST['orderID'];

	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 1005000) {
			$em = "Sorry, your file is too large.";
		    header("Location: uploadSlip.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = '../../uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "INSERT INTO slips(slipUrl, orderID) 
				        VALUES('$new_img_name', '$id')";
				mysqli_query($con, $sql);
				header("Location: ../../Controller/courier/uploadSlip.php?orderID=" . $id);
			}else {
				$em = "You can't upload files of this type";
		        header("Location: uploadSlip.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: uploadSlip.php?error=$em");

        //echo '<div class="slip">' . $em . '</div>';
	}

}elseif(isset($_POST['submitAgain']) && isset($_FILES['my_image'])) {

	$id = $_POST['orderID'];

	$sql = "DELETE FROM slips WHERE orderID = $id";
    $query = mysqli_query($con, $sql);

	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 1005000) {
			$em = "Sorry, your file is too large.";
		    header("Location: uploadSlip.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = '../../uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "INSERT INTO slips(slipUrl, orderID) 
				        VALUES('$new_img_name', '$id')";
				mysqli_query($con, $sql);
				header("Location: ../../Controller/courier/uploadSlip.php?orderID=" . $id);
			}else {
				$em = "You can't upload files of this type";
		        header("Location: uploadSlip.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";

		error_reporting(E_ALL);
		ini_set('display_errors', 1);
		header("Location: uploadSlip.php?error=$em");


        //echo '<div class="slip">' . $em . '</div>';
	}
	//header("Location: uploadSlip.php");
}