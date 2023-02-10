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
    <link rel="stylesheet" href="../../View/styles/cards-large.css">

    <style>
      .card-title-tb{
        margin-top: 1%;
        margin-bottom: 40%;
      }

      .title-wrap:first-child{
        margin-top: 2%;
      }

      .view-card h2{
        margin-left: 5px;
      }

      .card-stats{
        width: 20%;
        background: #E1EAF5;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 15px;
        padding: 2%;
        color: #0E31AD;
      }
      .hfghg{
        margin-top: 45%;
      }
      .card-stats:hover{
        transform: scale(1.1);
        z-index: 3;
        transition: transform 0.2s;
        background: #0E31AD;
        color: #E1EAF5;
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
            <td><a href="../home/logout.php">Log out</a></td>
          </tr>
        </table>
    </div>


    


    <!--stat cards-->
    <a href="stats.php"><button class="back" id="btn_back">Back</button></a>
    <div class="view-cards-wrapper">
      <h2 class="name">Overall</h2>
      <div class="kpi-cards-row">
      <div class="view-card">
        <table class="card-title-tb">
          <tr>
            <td>
              <i class="fa-solid fa-globe fa-lg"></i>
            </td>
            <td>
              <h3>Reach</h3>
            </td>
          </tr>
        </table>
        <h1>50</h1>
      </div>
      <div class="view-card">
      <table class="card-title-tb">
          <tr>
            <td>
              <i class="fa-sharp fa-solid fa-arrow-up-right-from-square fa-lg"></i>
            </td>
            <td>
              <h3>Link Clicks</h3>
            </td>
          </tr>
        </table>
        <h1>50</h1>
      </div>
      <div class="view-card">
        <table class="card-title-tb">
          <tr>
            <td>
              <i class="fa-sharp fa-solid fa-bag-shopping fa-lg"></i>
            </td>
            <td>
              <h3>Purchases</h3>
            </td>
          </tr>
        </table>
        <h1>50</h1>
      </div>
      </div>
      
    </div>

    <div style="margin-top: 2%;" class="view-cards-wrapper">
      <h2 class="name">Cost</h2>
      <div class="kpi-cards-row">
        <div class="card-stats">
          <h3>Cost Per Result</h3>
          <h4>Monthly</h4>
          <h3 class="hfghg">Rs.2000.00</h3>
        </div>
        <div class="card-stats">
          <h3>Cost Per Result</h3>
          <h4>Monthly</h4>
          <h3 class="hfghg">Rs.2000.00</h3>
        </div>
        <div class="card-stats">
          <h3>Cost Per Result</h3>
          <h4>Monthly</h4>
          <h3 class="hfghg">Rs.2000.00</h3>
        </div>
        </div>
      
    </div>



    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
</body>
</html>