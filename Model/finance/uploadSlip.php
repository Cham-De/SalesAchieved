<?php

session_start();


    if(isset($_POST['submit']) && isset($_FILES['paymentSlip'])){
        // $_SESSION['message'] = "Working";
        // header("Location: ../../Controller/finance/view-slip.php ");
        // exit(0);

        // echo "<pre>";
        // print_r($_FILES['paymentSlip']);
        // echo "</pre>";

        $fileDetails = print_r($_FILES['paymentSlip'], true);

        $img_name = $_FILES['paymentSlip']['name'];
        $img_size = $_FILES['paymentSlip']['size'];
        $img_tmp_name = $_FILES['paymentSlip']['tmp_name'];
        $error = $_FILES['paymentSlip']['error'];

        if($error === 0){
            if($img_size > 125000){
                $em = "file size too large";
                header("Location: ../../Controller/finance/view-slip.php?details=".urlencode($em));
            }
            else{
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			    $img_ex_lc = strtolower($img_ex);

			    $allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = '../../uploads'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "INSERT INTO images(image_url) 
				        VALUES('$new_img_name')";
				mysqli_query($conn, $sql);
				header("Location: view.php");
			}else {
				$em = "You can't upload files of this type";
		        header("Location: index.php?error=$em");
			}
            }
        }
        else{
            $em = "unknown error occurred";
            header("Location: ../../Controller/finance/view-slip.php?details=".urlencode($em));
        }


        // $_SESSION['fileDetails'] = $fileDetails;
        // header("Location: ../../Controller/finance/view-slip.php?details=".urlencode($fileDetails));
        // exit(0);
    }

?>