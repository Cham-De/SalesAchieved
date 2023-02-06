<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Marketing Strategist</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../styles/navBar.css">
    <link rel="stylesheet" href="../popup-btn-table.css">
    <link rel="stylesheet" href="../filter-buttons.css">
    <link rel="stylesheet" href="../profile.css">
    <link rel="stylesheet" href="../form.css">

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
    .side-bar-icons{
        margin-top: 96%;
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
            <img src="../man.png" width="50px" height="50px" alt="user image">
            <div>
                <h4>John Doe</h4>
                <small style="color:rgb(235, 137, 58)">Admin</small>
            </div>
        </div>
    </div>
    <div class="side_bar">
        <div class="logo">
            <img src="../saleslogo-final.png" width= "70%" height="70%">
        </div>
        <ul class="icon-list">
            <li><a href="admin-landing.php"><i style="margin-right: 2%;" class="fa-solid fa-house"></i>Home</a></li>
        </ul>
        <table class="side-bar-icons">
          <tr>
            <td><i class="fa-regular fa-circle-user" style="color: rgb(235, 137, 58);"></i></td>
            <td><a href="./profile.php" style="color: rgb(235, 137, 58);">Profile</a></td>
          </tr>
          <tr>
            <td><i class="fa-solid fa-arrow-right-from-bracket"></i></i></td>
            <td><a href="#">Log out</a></td>
          </tr>
        </table>
    </div>
    
    <div class="middle">
        <table class="prof-table">
            <tr>
                <td><a href="#"><img src="../man.png" width="120px" height="120px" alt="user image"></a></td>
                <td><p>Username</p><b>Cham234</b></td>
            </tr>
            <tr>
                <td><p>Your Name</p><b>Chamodi</b></td>
                <td><p>Email Address</p><b>cham123@gmail.com</b></td>
            </tr>
            <tr>
                <td><p>Phone Number</p><b>0786546567</b></td>
                <td><p>Gender</p><b>Female</b></td>
            </tr>
        </table>
      </div>

      <div class="btn-wrap">
        <button id="change_pwd"><b>Change Password</b></button>
        <button id="update_popup"><b>Update Profile</b></button>
      </div>


      <div class="popup-container" id="popup_container"> 
      <div class="update-modal">
        <form>
            <label for="name">Your Name
                <input type="text" placeholder="Name">
            </label>
            

            <label for="username">Username
                <input type="text" placeholder="Uaser Name">
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


    <div class="popup-container-pwd" id="popup_container_pwd"> 
        <div class="update-modal">
          <form>
              <label for="current_password">Current Password
                  <input type="text">
              </label>
              
  
              <label for="new_password">New Password
                  <input type="text">
              </label>
              
  
              <label for="re_enter_password">Re-enter New Password
                  <input type="text">
              </label>
              
              <label class="sp-label">
                  <button class="cancel" id="close">Cancel</button>
                  <input type="submit" value="Save" class="submit" id="save">
              </label>
              
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

        close.addEventListener('click', () => {
            popup_container_pwd.classList.remove('show');
        });

        save.addEventListener('click', () => {
            popup_container_pwd.classList.remove('show');
        });


    </script>

    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
</body>
</html>