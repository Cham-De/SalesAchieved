<?php
session_start();
require '../../Model/db-con.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../View/styles/home/login-final.css">
</head>
<body>
    <div class="background_img"></div>
    <div class="back-col-home"></div>

    <div class="outer-container">
                <table>
                    <tr>
                        <td>
                            <div class="logo-side">
                                <img src="../../View/assets/saleslogo-final.png" width="400px" height="400px">
                            </div>
                        </td>
                        <td class="form-col">
                            
                                <form action="../../Model/login/crud-login.php" method="post">
                                    <div class="form-title">
                                        <h1>Login</h1>
                                        <div class="error-msg"><h4>
                                            <?php
                                                if(isset($_SESSION['message'])){

                                                echo $_SESSION['message'];
                                                unset($_SESSION['message']);
                                            }
                                            ?>
                                    </h4></div>
                                    </div>
                
                                    <div class="form-element">
                                        <label for="username">Username</label>
                                        <input type="text" name="uname">
                                    </div>
                
                                    <div class="form-element">
                                        <label for="password">Password</label>
                                        <input type="password" name="pwd" >
                                    </div>
                
                                    <div class="form-btns">
                                        <button type="submit">Login</button>
                                    </div>    
                                </form>
                
                                <!--<p> Don't have an account yet? <a href="signup.php">Sign Up</a></p>-->
                        </td>
                    </tr>
                </table>
            </div>

</body>
</html>