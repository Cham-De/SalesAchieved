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
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!--<link rel="stylesheet" href="../dms.css">-->
    <link rel="stylesheet" href="../styles/navBar.css">
    <link rel="stylesheet" href="../styles/popup-btn-table.css">
    <link rel="stylesheet" href="../styles/admin/admin.css">
    <link rel="stylesheet" href="../styles/popupForm.css">

    <style>
      .icon-list{
        margin-bottom: 100%;
      }

      #add_btn_u{
    cursor: pointer;
    border: none;
    background: #F8914A;
    color: white;
    padding: 10px 25px;
    border-radius: 12px;
    margin-right: 5%;
}

      #add_btn_u:hover{
        color: #F8914A;
        border: 2px solid #F8914A;
        background: white;
      }

      .search_container{
        margin-left: 25%;
      }

      .nav_bar{
        margin-bottom: 2%;
      }

      .user-wrapper{
        margin-left: 86%;
      }
      .cancel{
    margin-left: 2%;
    margin-bottom: 1%;
}
.submit{
    margin-left: 5px;
}
.content-table{
  margin-left: 20%;
  width: 78%;
}
.content-table th,
.content-table td {
    padding: 12px 15px;
    width: 5%;
    height: 5%;
    text-align: center;
    font-size: 16px;
}
    </style>
</head>
<body>
    <div class="nav_bar">
        <div class="user-wrapper">
            <img src="../assets/man.png" width="50px" height="50px" alt="user image">
            <div>
                <h4>Chamodi</h4>
                <small style="color:rgb(235, 137, 58)">Admin</small>
            </div>
        </div>
    </div>
    <div class="side_bar">
        <div class="logo">
            <img src="../assets/saleslogo-final.png" width= "70%" height="70%">
        </div>
        <ul class="icon-list">
            <li class="active"><a href="dms.html"><i style="margin-right: 2%;" class="fa-solid fa-house"></i>Home</a></li>
        </ul>
        <table class="side-bar-icons">
          <tr>
            <td><i class="fa-regular fa-circle-user"></i></td>
            <td><a href="./profile.php">Profile</a></td>
          </tr>
          <tr>
            <td><i class="fa-solid fa-arrow-right-from-bracket"></i></i></td>
            <td><a href="#">Log out</a></td>
          </tr>
        </table>
    </div>
    

      <div class="btn_cmpg">
        <div class="search_container">
          <table class="element_container">
            <tr>
              <td>
                <input type="text" placeholder="Search User..." class="search">
              </td>
              <td>
                <a><i class="fa-solid fa-magnifying-glass"></i></a>
              </td>
            </tr>
          </table>
        </div>

        <button id="add_btn_u">Add User</button>  

      </div>
        

        <table class="content-table">
            <thead>
              <tr>
                <th>User ID</th>
                <th>User Role</th>
                <th>Username</th>
                <th>Name</th>
                <th>Email Address</th>
                <th>Phone</th>
                <th>Actions</th>

              </tr>
            </thead>
            <tbody>

              <?php
                    $sql = "SELECT * FROM User";
                    $query = mysqli_query($con, $sql);

                    if(mysqli_num_rows($query) > 0 ){

                        foreach($query as $user){
                            ?>
                                <tr>
                                    <td scope="row"><?=$user['id']; ?></td>
                                    <td><?=$user['user_role']; ?></td>
                                    <td><?=$user['username']; ?></td>
                                    <td><?=$user['name']; ?></td>
                                    <td><?=$user['email']; ?></td>
                                    <td><?=$user['telephone']; ?></td>
                                    <td class="action-btns">
                                      <button class="edit">Edit</button>
                                    <form action="admin_crud.php" method="POST">
                                      <button class="del" name="delete_user" value="<?=$user['id'];?>">Delete</button>
                                    </form>
                                    </td> 
                                </tr>

                            <?php 

                        }
                    }
                    else{
                        echo "<h4>No records</h4>";
                    }
                
                ?>

            </tbody>
          </table>


          <div class="navigation-table">
            <i class="fa-solid fa-circle-chevron-left fa-lg"></i>
            <i class="fa-solid fa-circle-chevron-right fa-lg"></i>
          </div>
            
          <div class="popup-container" id="popup_container">
        <div class="popup-modal">
          <form method="post" action="admin_crud.php">
          <label for="user-role">User Role</label>
                        <select name="userrole" id="selections">
                            <option>Sales Representative</option>
                            <option>Store Manager</option>
                            <option>Finance Manager</option>
                            <option>Digital Marketing Strategist</option>
                            <option>Courier</option>
                        </select>
            <label for="name">Name</label>
            <input type="text" name="name">
            <label for="email">Email</label>
            <input type="text" name="email" >
            <label for="gender">Gender</label>
                        <select name="gender" id="selections">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
            <label for="phonenum">Phone Number</label>
            <input type="number" name="phone" >
            <label for="uname">Username</label>
            <input type="text" name="username" >
            <label for="pwd">Password</label>
            <input type="password" name="password" >
            <button class="cancel" id="close" type="reset" value="Reset">Cancel</button>
            <button class="submit" id="save" type="submit" value="Submit" name="submit">Save</button>
          </form>
        </div>
      </div>



      <script>
        const add_btn_u = document.getElementById('add_btn_u');

        const close = document.getElementById('close');
        const save = document.getElementById('save');

        const popup_container = document.getElementById('popup_container');

        add_btn_u.addEventListener('click', () => {
            popup_container.classList.add('show');
        });

        close.addEventListener('click', () => {
            popup_container.classList.remove('show');
        });

        save.addEventListener('click', () => {
            popup_container.classList.remove('show');
        });


    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
</body>
</html>