<?php
    require '../../Model/db-con.php';
    require __DIR__.'/../../Model/utils.php';
    $role = "Digital Marketing Strategist";
    require_once("../../Model/dms/profileCRUD.php");
    $userData = check_login($role);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Marketing Strategist</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <link rel="stylesheet" href="../../View/styles/popup-btn-table.css">
    <link rel="stylesheet" href="../../View/styles/filter-buttons.css">
    <link rel="stylesheet" href="../../View/styles/profile.css">
    <link rel="stylesheet" href="../../View/styles/popupForm.css">

    <style>
        .wrapper{
        position: absolute;
        display: flex;
        width: 70%;
        top: 16%;
        margin-left:25%;
    }

    .name{
        margin-top: 2%;
        margin-left:25%;
    }
    .view-card h1{
        margin-top: 45%;
    }
    .view-cards-wrapper{
        border: none;
    }
    </style>
</head>
<body>
<div class="nav_bar">
        <div class="search-container">
            <table class="element-container">
              <tr>
                <td>
                  <input type="text" placeholder="Search..." class="search">
                </td>
                <td>
                  <a><i style="color:rgb(235, 137, 58)" class="fa-solid fa-magnifying-glass"></i></a>
                </td>
              </tr>
            </table>
        </div>
        <div class="user-wrapper">
            <img src="../../View/assets/chamodi.png" width="50px" height="50px" alt="user image">
            <div>
                <h4><?php echo $userData['name'];?></h4>
                <small><?php echo $userData['user_role'];?></small>
            </div>
        </div>
    </div>
    <div class="side_bar">
        <div class="logo">
            <img src="../../View/assets/saleslogo-final.png" width= "70%" height="70%">
        </div>
        <ul class="icon-list">
            <li><a href="dms.php"><i style="margin-right: 2%;" class="fa-solid fa-house"></i>Home</a></li>
            <li><a href="campaigns.php"><i style="margin-right: 2%;" class="fa-solid fa-globe"></i>Campaigns</a></li>
            <li><a href="stats.php"><i style="margin-right: 2%;" class="fa-solid fa-chart-line"></i>Statistics</a></li>
            <li><a href="cust-dms.php"><i style="margin-right: 2%;" class="fa-solid fa-users"></i></i>Customers</a></li>
        </ul>
        <table class="side-bar-icons">
          <tr>
            <td><i class="fa-regular fa-circle-user" style="color: rgb(235, 137, 58);"></i></td>
            <td><a href="../profile.html" style="color: rgb(235, 137, 58);">Profile</a></td>
          </tr>
          <tr>
            <td><i class="fa-solid fa-arrow-right-from-bracket"></i></i></td>
            <td><a href="../home/logout.php">Log out</a></td>
          </tr>
        </table>
    </div>
    
    <div class="middle">
        <table class="prof-table">
        <?php $row = mysqli_fetch_array($result)?>
            <tr>
                <td><a href="#"><img src="../../View/assets/chamodi.png" width="120px" height="120px" alt="user image"></a></td>
                <td><p>Username</p><b><?php echo $row['username'];?></b></td>
            </tr>
            <tr>
                <td><p>Your Name</p><b><?php echo $row['name'];?></b></td>
                <td><p>Email Address</p><b><?php echo $row['email'];?></b></td>
            </tr>
            <tr>
                <td><p>Phone Number</p><b><?php echo $row['telephone'];?></b></td>
                <td><p>Gender</p><b><?php echo $row['gender'];?></b></td>
            </tr>
        </table>
      </div>

      <div class="btn-wrap">
        <button id="change_pwd"><b>Change Password</b></button>
        <button id="update_popup"><b>Update Profile</b></button>
      </div>

    <!-- Update Popup From -->
      <div class="popup-container" id="popup_container"> 
      <div class="update-modal">
        <form>
            <label for="name">Your Name
                <input type="text" placeholder="Name">
            </label>
            

            <label for="email">Email Address
                <input type="text" placeholder="cha123@email.com">
            </label>
            

            <label for="phone">Phone number
                <input type="text" placeholder="phone">
            </label>
            

            <label for="gender">Gender
                <select id="gender">
                    <option value="female">Female</option>
                    <option value="male">Male</option>
                </select>
            </label>
            
            <label class="sp-label">
                <button class="cancel" id="close">Cancel</button>
                <input type="submit" value="Save" class="submit" id="save">
            </label>
            
        </form>
      </div>
    </div>

    <!-- Change Password -->
    <div class="popup-container" id="popup_container">
        <div class="popup-modal">
          <form method="post" action="complaints.php">
            <label for="orderID">Order ID
                <input type="number" id="orderID" name="orderID" required="required">
            </label>
            <label for="productCode">Product Code
                <input type="string" id="productCode" name="productCode" required="required">
            </label>
            <label for="complaint">Complaint
                <textarea name="complaint" id="complaint" required="required"></textarea>
            </label>
            <button class="cancel" id="close" type="reset" value="Reset">Cancel</button>
            <button class="submit" id="save" type="submit" value="Submit" name="submit">Save</button>
          </form>
        </div>
    </div>

      <script>
        const update_popup = document.getElementById('update_popup');
        const popup_container = document.getElementById('popup_container');
        const popup_container_pwd = document.getElementById('popup_container_pwd');
        const close = document.getElementById('close');

        const change_pwd = document.getElementById('change_pwd');
        const save = document.getElementById('save');

        update_popup.addEventListener('click', () => {
            popup_container.classList.add('show');
        });

        close.addEventListener('click', () => {
            popup_container.classList.remove('show');
        });

        save.addEventListener('click', () => {
            popup_container.classList.remove('show');
        });

        change_pwd.addEventListener('click', () => {
            popup_container_pwd.classList.add('show');
        });

        close_pwd.addEventListener('click', () => {
            popup_container_pwd.classList.remove('show');
        });

        save_pwd.addEventListener('click', () => {
            popup_container_pwd.classList.remove('show');
        });


    </script>

    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
</body>
</html>