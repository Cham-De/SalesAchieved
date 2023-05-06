<div class="search_wrapper">
<form action="" method="GET">
          <div class="dropdown">
              <select  name="dmsSelect" id="stats">
                <option value="" disabled="" selected="">Select Status</option>
                <option value="ongoing">Ongoing</option>
                <option value="tobelaunched">To be launched</option>
                <option value="complete">Complete</option>
              </select>
          </div>
      
        <div class="search_bar">
          <table class="icon_container">
            <tr>
              <td>
                <input type="text" name="searchVal" value="<?php if(isset($_GET['searchVal'])){ echo $_GET['searchVal']; } ?>" class="search" placeholder="Search Customers...">
              </td>
              <td>
                <!--<a><i class="fa-solid fa-magnifying-glass"></i></a>-->
                <button type="submit">Search</button>
              </td>
            </tr>
          </table>
        </div>
</form>
        <button id="add_btn" name="add_cmpg">Add Campaign</button>
    </div>