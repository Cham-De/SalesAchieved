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


    <style>

      .nav_bar{
        margin-bottom: 2%;
      }
      .search_container{
        margin-left: 22%;
      }
      .profile li{
      padding-top: 2%;
      padding-bottom: 2%;
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
                <h4>Chamodi</h4>
                <small style="color:rgb(235, 137, 58)">Digital Marketing Strategist</small>
            </div>
        </div>
    </div>
    <div class="side_bar">
        <div class="logo">
            <img src="../../View/assets/saleslogo-final.png" width= "70%" height="70%">
        </div>
        <ul class="icon-list">
            <li><a href="dms.php"><i style="margin-right: 2%;" class="fa-solid fa-house"></i>Home</a></li>
            <li><a href="campaigns.html"><i style="margin-right: 2%;" class="fa-solid fa-globe"></i>Campaigns</a></li>
            <li><a href="stats.php"><i style="margin-right: 2%;" class="fa-solid fa-chart-line"></i>Statistics</a></li>
            <li class="active"><a href="cust-dms.php"><i style="margin-right: 2%;" class="fa-solid fa-users"></i></i>Customers</a></li>
        </ul>
        <table class="side-bar-icons">
          <tr>
            <td><i class="fa-regular fa-circle-user"></i></td>
            <td><a href="./profile.php">Profile</a></td>
          </tr>
          <tr>
            <td><i class="fa-solid fa-arrow-right-from-bracket"></i></i></td>
            <td><a href="../home/logout.php">Log out</a></td>
          </tr>
        </table>
    </div>
    

      <div class="btn_cmpg">
        <!--<div class="search_box">
            <input type="text" class="input" placeholder="Search...">
            <div class="icon">
              <i class="fa-solid fa-magnifying-glass"></i>
            </div>
        </div>-->
        <div class="search_container">
          <table class="element_container">
          <tr>
              <form action="" method="GET">
              <td>
                    <input type="text" name="searchVal" value="<?php if(isset($_GET['searchVal'])){ echo $_GET['searchVal']; } ?>" class="search" placeholder="Search Table...">
              </td>
              <td>            
                    <button type="submit">Search</button>              
              </td>
              </form>
            </tr>
          </table>
        </div>

      </div>
        

        <table class="content-table">
            <thead>
              <tr>
                <th>Customer ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Social Media<br>Platform</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>12</td>
                <td>Anil Kumara</td>
                <td>23/B, Flower Road, Maharagama</td>
                <td>Instagram</td>
              </tr>
              <tr>
                <td>12</td>
                <td>Anil Kumara</td>
                <td>23/B, Flower Road, Maharagama</td>
                <td>Instagram</td>
              </tr>
              <tr>
                <td>12</td>
                <td>Anil Kumara</td>
                <td>23/B, Flower Road, Maharagama</td>
                <td>Instagram</td>
              </tr>
              <tr>
                <td>12</td>
                <td>Anil Kumara</td>
                <td>23/B, Flower Road, Maharagama</td>
                <td>Instagram</td>
              </tr>
              <tr>
                <td>12</td>
                <td>Anil Kumara</td>
                <td>23/B, Flower Road, Maharagama</td>
                <td>Instagram</td>
              </tr>
            </tbody>
          </table>
          <div class="navigation-table">
            <i class="fa-solid fa-circle-chevron-left fa-lg"></i>
            <i class="fa-solid fa-circle-chevron-right fa-lg"></i>
          </div>
            
      <div class="popup-container" id="popup_container">
        <div class="popup-modal">
          <form>
            <label for="name" class="title"><h3 style="color: rgb(0, 0, 0); margin-top: 3px; margin-right: 10px; margin-bottom: 20px;">Campaign ID :</h3> <h2 style="color: rgb(0, 0, 0);">002</h2>
          </label>
          <label for="start-date">Start Date
            <input type="date" id="s-date">
          </label>
          <label for="objective">Objective
            <select id="objective">
                <option value="awareness">Awareness</option>
                <option value="leads">Leads</option>
                <option value="engagement">Engagement</option>
                <option value="sales">Sales</option>
            </select>
          </label>
          <label for="status">Status
            <select id="status">
                <option value="tobelaunched">To-be Launched</option>
                <option value="ongoing">Ongoing</option>
                <option value="complete">Complete</option>
            </select>
          </label>
          <label for="budget">Budget
            <input type="number" id="budget">
          </label>
          </form>

          <label class="sp-label">
            <button class="cancel" id="close">Cancel</button>
            <button class="submit" id="save">Save</button>
        </label>
        </div>
      </div>

    <script>
        const add_btn = document.getElementById('add_btn');
        const close = document.getElementById('close');
        const save = document.getElementById('save');
        const popup_container = document.getElementById('popup_container');

        add_btn.addEventListener('click', () => {
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