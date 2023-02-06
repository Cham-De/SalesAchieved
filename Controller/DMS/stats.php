<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Marketing Strategist</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <link rel="stylesheet" href="../../View/styles/stats.css">
    <link rel="stylesheet" href="../../View/styles/dms/campaigns.css">

    <style>
      .nav_bar{
        margin-bottom: 2%;
      }
      .search_container{
        margin-left: 22%;
      }

      #nav_table{
        position: absolute;
        margin-top: 5%;
        margin-left: 55%;
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
            <li><a href="campaigns.php"><i style="margin-right: 2%;" class="fa-solid fa-globe"></i>Campaigns</a></li>
            <li class="active"><a href="stats.php"><i style="margin-right: 2%;" class="fa-solid fa-chart-line"></i>Statistics</a></li>
            <li><a href="cust-dms.php"><i style="margin-right: 2%;" class="fa-solid fa-users"></i></i>Customers</a></li>
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

    <div class="search_container">
          <table class="element_container">
            <tr>
              <td>
                <input type="text" placeholder="Search Table..." class="search">
              </td>
              <td>
                <a><i class="fa-solid fa-magnifying-glass"></i></a>
              </td>
            </tr>
          </table>
    </div>


    <div class="cards-middle" id="cards_middle">
      <ul class="middle-cards">
        <li>
            <div class="cards">
              <div class="cmpg"><h2>Campaign 002</h2></div>
                <div class="dv">
                  <div class="status"><h4>Ongoing</h4></div>
                  <a href="stats-view.php"><button id="performance" class="perf">View Performance</button></a>
                </div>                    
            </div>
        </li>
        <li>
            <div class="cards">
              <div class="cmpg"><h2>Campaign 004</h2></div>
              <div class="dv">
                <div class="status"><h4>Ongoing</h4></div>
                <a href="stats-view.php"><button id="performance" class="perf">View Performance</button></a>    
              </div>
            </div>
        </li>
        <li>
          <div class="cards">
            <div class="cmpg"><h2>Campaign 012</h2></div>
            <div class="dv">
              <div class="status"><h4>Complete</h4></div>
              <a href="stats-view.php"><button id="performance" class="perf">View Performance</button></a>    
            </div>
          </div>
        </li>
    </ul>   

    <div class="navigation-table" id="nav_table">
      <i class="fa-solid fa-circle-chevron-left fa-lg"></i>
      <i class="fa-solid fa-circle-chevron-right fa-lg"></i>
    </div>
  </div>


    <!--stat cards-->
    
  
    <script>
        /*const view_cards_wrapper = document.getElementById('view_cards_wrapper');
        const cards_middle = document.getElementById('cards_middle');
        const performance = document.getElementById('performance');
        const btn_back = document.getElementById('btn_back');
        const nav_table = document.getElementById('nav_table');

        performance.addEventListener('click', () => {
            cards_middle.classList.add('hide');
            view_cards_wrapper.classList.add('show');
            btn_back.classList.add('show');
        });*/




    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
</body>
</html>