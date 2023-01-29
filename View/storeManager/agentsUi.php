<?php
    require_once("../../Model/addAgentCRUD.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Store Manager-Dashboard</title>
    <link rel="stylesheet"
      href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!--stylesheet for icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Stylesheet for nav bar-->
    <link rel="stylesheet" href="../styles/navBar.css">
    <!--Stylesheet for table navigation buttons-->
    <link rel="stylesheet" href="../styles/navButtons.css">
    <!--Stylesheet for table search bar-->
    <link rel="stylesheet" href="../styles/tableSearch.css">
    <!--Stylesheet for tables-->
    <link rel="stylesheet" href="../styles/table.css">
    <!--Stylesheet for quick actions buttons-->
    <link rel="stylesheet" href="../styles/quickActions.css">
    <!--Stylesheet for popup form-->
    <link rel="stylesheet" href="../styles/popupForm.css">
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
                      <a><i class="fa-solid fa-magnifying-glass"></i></a>
                  </td>
              </tr>
          </table>
      </div>

      <div class="user-wrapper">
          <img src="../assets/man.png" width="50px" height="50px" alt="user image">
          <div>
              <h4>John Doe</h4>
              <small>Store Manager</small>
          </div>
      </div>
  </div>

  <div class="side_bar">
      <div class="logo">
          <img src="../assets/logosales.png" width="65%" height="55%">
      </div>
      <ul>
          <li><a href="landingUi.php"><i class="fa-solid fa-house"></i>Home</a></li>
          <li><a href="stocksUi.php"><i class="fa-solid fa-warehouse"></i>Stocks</a></li>
          <li><a href="ordersUi.php"><i class="fa-solid fa-file-circle-check"></i>Orders</a></li>
          <li class="active"><a href="agentsUi.php"><i class="fa-solid fa-user-group"></i>Agents</a></li>
          <li><a href="returnedGoodsUi.php"><i class="fa-solid fa-user-group"></i>Returned Goods</a></li>
      </ul>
      <ul class="profile">
          <li>
              <a href="../profile.php"><i class="fa-regular fa-circle-user"></i>Profile</a>
          </li>
          <li>
              <a href="#"><i class="fa-solid fa-arrow-right-from-bracket"></i>Log out</a>
          </li>
      </ul>
  </div>
  </div>
  <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
    <!---end of side and nav bars-->

    <!--Quick actions buttons-->
    <div class="btn_three">
        <button id="agent_btn">Add Agent</button>
    </div>

    <!--Table search bar-->
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
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
    
    <!--Table-->
    <table class="content-table">
        <thead>
            <tr>
                <th>Agent ID</th>
                <th>Agent Name</th>
                <th>Phone</th>
                <th>Address</th>
            </tr>
        </thead>
        <?php
            while($rows = mysqli_fetch_assoc($result))
                {
        ?>
        <tbody>
            <tr>
                <td><?php echo $rows['agentID'];?></td>
                <td><?php echo $rows['companyName'];?></td>
                <td><?php echo $rows['phone'];?></td>
                <td><?php echo $rows['address'];?></td>
            </tr> 
        </tbody>
        <?php
            }
        ?>
      </table>
    
    <!-- Navigation Arrows -->
    <div class="navigation-table" id="nav_table">
        <i class="fa-solid fa-circle-chevron-left fa-lg"></i>
        <i class="fa-solid fa-circle-chevron-right fa-lg"></i>

        <!--Popup Form - Add Agent-->
    <div class="popup-container" id="popup_container_agent">
        <div class="popup-modal">
          <form method="post" action="agentsUi.php">
            <label for="companyName">Company Name
                <input type="string" id="companyName" name="companyName" required="required">
            </label>
            <label for="phone">Phone Number
                <input type="string" id="phone" name="phone" required="required">
            </label>
            <label for="address">Address
                <input type="string" id="address" name="address" required="required">
            </label>
            
            <button class="cancel" id="close_agent" type="reset" value="Reset">Cancel</button>
            <button class="submit" id="save_agent" type="submit" value="Submit" name="submit">Save</button>
          </form>
        </div>
      </div>
    </div>

    <script>
        const agent_btn = document.getElementById('agent_btn');

        const close_agent = document.getElementById('close_agent');
        const save_agent = document.getElementById('save_agent');

        const popup_container_agent = document.getElementById('popup_container_agent');

        agent_btn.addEventListener('click', () => {
            popup_container_agent.classList.add('show');
        });

        close_agent.addEventListener('click', () => {
            popup_container_agent.classList.remove('show');
        });

        save_agent.addEventListener('click', () => {
            popup_container_agent.classList.remove('show');
        });

    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
  </body>
</html>