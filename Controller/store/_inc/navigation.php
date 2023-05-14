<div class="navigation">
    <form class="search-bar" method="get" action="<?php echo  $GLOBALS["store_path"] ?>/search">
        <input type="search" name="q" placeholder="Search store..." class="search">
        <button type="submit" value="search">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </form>
    <div class="user">

    <a href="calendar.php"><i class="fa-solid fa-calendar-days"></i></a>

        <!-- Notifications -->
        <div class="icon" onclick="toggleNotifi()">
          <i class="fa-solid fa-bell"></i><span><?php echo mysqli_num_rows($notifData) ?></span>
        </div>
        <div class="notifi-box" id="box">
          <h2>Notifications <span><?php echo mysqli_num_rows($notifData) ?></span></h2>
          <?php 
          while ($row = mysqli_fetch_array($notifData)){
            $title = $row['title'];
            $message = $row['message'];
            $notificationID = $row['notificationID'];
            echo  "
            <div class='notifi-item' style='display:none;'>
            <i class='fa-solid fa-circle-info' style='font-size:2em;padding-left: 10px;'></i>
              <div class='text'>
                <h4>$title</h4>
                <p>$message</p>
                
              </div>
              <div style='margin-right: 0;margin-left: auto; display:block;'>
              <form method='post'>
              <input type='hidden' name='notificationID' value='$notificationID'>
              <button id='remove' type='submit' value='remove' name='remove' style='border: none;padding: 0px;background-color: white;'>
                <i class='fa-regular fa-circle-xmark' style='cursor: pointer;'></i>
              </button>
              </form>
              </div>
            </div>";
          }
          ?>
        </div>
        
        <img src="<?php echo APP_ASSETS_PATH ?>/man.png" width="50px" height="50px" alt="user image">
        <div>
          <h4><?php echo $userData['name'];?></h4>
          <small><?php echo $userData['user_role'];?></small>
        </div>
    </div>
</div>