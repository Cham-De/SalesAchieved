<?php

session_start();
require '../db-con.php';

/*if(isset($_POST['uname'])){

    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];

    $sql = "SELECT * FROM user WHERE username='".$uname."' AND password='".$pwd."' limit 1";

    $res = mysqli_query($con, $sql);

    if(mysqli_num_rows($res)==1){
        $row=mysqli_fetch_assoc($res);
        if($row['user_role'] == 'Digital Marketing Strategist'){
            header("Location: ../digital marketing strategist/campaigns.php");
            exit(0);
        }

        else if($row['user_role'] == 'admin'){
            header("Location: ../admin/admin-landing.php");
            exit(0);
        }
    }
    else{
        $_SESSION['message'] = "Incorrect username or password";
        header("Location: login-final.php");
        exit(0);
    }
}*/

if(isset($_POST['uname']) && isset($_POST['pwd'])){

    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];

    if(empty($uname)){
        $_SESSION['message'] = "Username is required!";
        header("Location: ../../Controller/home/login-final.php");
        exit(0);
    }
    else if(empty($pwd)){
        $_SESSION['message'] = "Password is required!";
        header("Location: ../../Controller/home/login-final.php");
        exit(0);
    }

    else{
        $sql = "SELECT * FROM user WHERE username='$uname' AND password='$pwd'";

        $result = mysqli_query($con, $sql);

        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            if($row['username'] == $uname && $row['password'] == $pwd){

                $_SESSION['logged_in'] = true;

                if($row['user_role'] == 'Digital Marketing Strategist'){
                    header("Location: ../../Controller/DMS/dms.php");
                    exit(0);
                }

                else if($row['user_role'] == 'admin'){
                    header("Location: ../../Controller/admin/admin_landing.php");
                    exit(0);
                }

                else if($row['user_role'] == 'Courier'){
                    header("Location: ../../Controller/Courier/landingUi.php");
                    exit(0);
                }

                else if($row['user_role'] == 'Sales Representative'){
                    header("Location: ../../Controller/salesR/landingUi.php");
                    exit(0);
                }

                else if($row['user_role'] == 'Finance Manager'){
                    header("Location: ../../Controller/finance/finance-home.php");
                    exit(0);
                }

                else if($row['user_role'] == 'Store Manager'){
                    header("Location:../../Controller/store/landingUi.php");
                    exit(0);
                }

                else if($row['user_role'] == 'Owner'){
                    header("Location: ../../Controller/owner/owner-landing.php");
                    exit(0);
                }

            }

            else{
                $_SESSION['message'] = "Incorrect username or password!";
                header("Location: ../../Controller/home/login-final.php");
                exit(0);
            }
        }

        else{
            $_SESSION['message'] = "Incorrect username or password!";
            header("Location: ../../Controller/home/login-final.php");
            exit(0);
        }

    }


}

?>

