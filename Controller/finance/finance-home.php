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
    <title>Finance Manager</title>
    <!--stylesheet for icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <link rel="stylesheet" href="../../View/styles/popup-btn-table.css">
    <link rel="stylesheet" href="../../View/styles/filter-buttons.css">
    <link rel="stylesheet" href="../../View/styles/cards-large.css">

    <style>

    .card1, .card2{
        text-align: left;
    }
    .wrapper{
        position: absolute;
        display: flex;
        width: 70%;
        top: 16%;
        margin-left:25%;
    }

    div.side_bar ul li{
        padding-top: 8%;
        padding-bottom: 6%;
    }

    #charge_btn{
        cursor: pointer;
        border: none;
        background: #F8914A;
        color: white;
        padding: 10px 15px;
        border-radius: 12px;
        margin-left: 45%;
    }

    #charge_btn:hover{
        color: #F8914A;
        border: 2px solid #F8914A;
        background: white;
    }

    .graph-kpi{
      margin-top: 2%;
    }
    
    .topic {
      text-align: center;
      margin-bottom: 20px;
      font-size: 3.5vh;
    }


    </style>

</head>
<body>
  <!--common top nav and side bar content-->
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
            <img src="../../View/assets/man.png" width="50px" height="50px" alt="user image">
            <div>
                <h4>John Doe</h4>
                <small style="color:rgb(235, 137, 58)">Finance Manager</small>
            </div>
        </div>
    </div>

    <div class="side_bar">
        <div class="logo">
            <img src="../../View/assets/saleslogo-final.png" width= "70%" height="70%">
        </div>
        <ul class="icon-list">
            <li class="active"><a href="index.php"><i style="margin-right: 2%;" class="fa-solid fa-house"></i>Home</a></li>
            <li><a href="commissions.php"><i style="margin-right: 2%;" class="fa-solid fa-money-check-dollar"></i>Commissions</a></li>
            <li><a href="products.php"><i style="margin-right: 2%;" class="fa-solid fa-boxes-stacked"></i>Products</a></li>
            <li><a href="sales.php"><i style="margin-right: 2%;" class="fa-solid fa-magnifying-glass-dollar"></i>Sales</a></li>
            <li><a href="payment.php"><i style="margin-right: 2%;" class="fa-solid fa-hand-holding-dollar"></i>Payments</a></li>
            <li><a href="#"><i style="margin-right: 2%;" class="fa-solid fa-file-contract"></i>Reports</a></li>
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
    <!---end of side and nav bars-->


    <div class="wrapper">
            <div class="dropdown">
                <button onclick="myFunction(this)" class="dropbtn"><span class="button__text">2022</span> 
                    <span class="button__icon" onclick="myFunction(this)">
                        <!--<ion-icon name="arrow-down-circle-outline"></ion-icon>-->
                        <i style="color: #2c0dda;" class="fa-solid fa-chevron-down fa-lg"></i>
                    </span>
                </button>
                 <div style="min-width: 140px;" id="myDropdown1" class="dropdown-content">
                    <a href="#">2021</a>
                    <a href="#">2019</a>
                    <a href="#">2018</a>
                 </div>
             </div> 
            <div class="dropdown">
                <button onclick="myFunction(this)" class="dropbtn"><span class="button__text">January</span>
                    <span class="button__icon" onclick="myFunction(this)">
                        <!--<ion-icon name="arrow-down-circle-outline"></ion-icon>-->
                        <i style="color: #2c0dda;" class="fa-solid fa-chevron-down fa-lg"></i>
                    </span>
                </button>
                 <div id="myDropdown2" class="dropdown-content">
                    <a href="#">February</a>
                    <a href="#">March</a>
                    <a href="#">April</a>
                 </div>
             </div> 


             <button id="charge_btn">Update Delivery Charges</button>
    </div>
    
 
    <div class="graphs-large">
        <div class="sales">
                <h2 class="card-title">Monthly Sales Revenue</h2>
                <img src="../../View/assets/graph3.png" width="80%" height="80%" alt="monthly sales">
        </div>
        <div class="products">
                <h2 class="card-title">Products Sold Monthly</h2>
                <img src="../../View/assets/graph1.png" width="80%" height="80%" alt="monthly sales">
        </div>  
    </div>
    
    <div class="graph-kpi">
        <div class="orders">
                <h2 class="card-title">Complete and Incomplete Orders</h2>
                <img src="../../View/assets/graph2.jpg" alt="monthly sales">
        </div>

        <div class="title-and-kpis">
        <div class="txt"><h2>Key Performance Indicators</h2></div>
            <div class="KPIs">
                <div class="card1">
                    <h3>Sales</h3>
                    <h4>Monthly</h4>
                    <h2>Rs.120,000</h2>
                </div>
                <div class="card2">
                    <h3>GP Margin</h3>
                    <h4>Monthly</h4>
                    <h2>48.09%</h2>
                </div>
            </div>
    </div>

    </div>
    
    <?php
          $sql = "SELECT * FROM delivery";
          $query = mysqli_query($con, $sql);
             
          if(mysqli_num_rows($query) > 0 ){
            foreach($query as $thing){
    
    ?>
    <div class="popup-container" id="popup_container">
            <div class="popup-modal" style="max-width: 400px;">
              <div class="topic">Delivery Charges</div>
              <form action="../../Model/finance/fin-crud.php" method="post">
              <label for="colombo">Within Colombo (Rs.)
                <input type="number" id="s-date" name="wCol" value="<?=$thing['withCol']; ?>">
              </label>
              <label for="suburbs">Colombo Suburbs (Rs.)
                <input type="number" id="s-date" name="sCol" value="<?=$thing['subCol']; ?>">
              </label> 
              <label for="outofcolombo">Out of Colombo (Rs.)
                <input type="number" id="budget" name="oCol" value="<?=$thing['outCol']; ?>">
              </label>
              <label for="outofcolombo">
                <input type="hidden" name="id" value="<?=$thing['chargeID']; ?>">
              </label>
              <button class="cancel" id="close" type="reset" value="Reset" style="margin-left: 11%; margin-top: 2%; margin-bottom: 2%;">Cancel</button>
              <button class="submit" id="save" type="submit" value="Submit" name="update">Update</button>
              </form>
    
            </div>
    </div>
    <?php
        }

    }
    ?>

    <script>
        var myFunction = function(target) {
   target.parentNode.querySelector('.dropdown-content').classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.button__text')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
    </script>

<script>
    const charge_btn = document.getElementById('charge_btn');
    const close = document.getElementById('close');
    const save = document.getElementById('save');
    const popup_container = document.getElementById('popup_container');

    charge_btn.addEventListener('click', () => {
        popup_container.classList.add('show');
    });

    close.addEventListener('click', () => {
        popup_container.classList.remove('show');
    });

    save.addEventListener('click', () => {
        popup_container.classList.remove('show');
    });

</script>
      <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
</body>
</html>