
<?php
//session_start();
require '../../Model/db-con.php';
require __DIR__.'/../../Model/utils.php';
$role = "Digital Marketing Strategist";
$userData = check_login($role);


if(isset($_GET['page'])){

  $page = $_GET['page'];

}
else{
  $page = 1;
}

$num_per_page = 05;
$start_from = ($page-1)*05;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Marketing Strategist</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!--<link rel="stylesheet" href="dms.css">-->
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <link rel="stylesheet" href="../../View/styles/dms/campaigns.css">
    <link rel="stylesheet" href="../../View/styles/searchNfilter.css">

    <style>
      .error_msg{
      color: red;
      margin-bottom: 5%;
      text-align: center;
      display: none;
    }
    </style>
</head>
<body id="whole">
    <div class="nav_bar">
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
            <li  class="active"><a href="campaigns.html"><i style="margin-right: 2%;" class="fa-solid fa-globe"></i>Campaigns</a></li>
            <!-- <li><a href="stats.php"><i style="margin-right: 2%;" class="fa-solid fa-chart-line"></i>Statistics</a></li> -->
            <li><a href="cust-dms.php"><i style="margin-right: 2%;" class="fa-solid fa-users"></i></i>Customers</a></li>
        </ul>
        <table class="side-bar-icons">
          <tr>
            <td><i class="fa-regular fa-circle-user"></i></td>
            <td><a href="profile.php">Profile</a></td>
          </tr>
          <tr>
            <td><i class="fa-solid fa-arrow-right-from-bracket"></i></i></td>
            <td><a href="../home/logout.php">Log out</a></td>
          </tr>
        </table>
    </div>
    
    <button id="add_btn" name="add_cmpg">Add Campaign</button>

    <div class="search_wrapper">
        <!-- <label for="">Filter</label> -->
        <select name="fetchval" id="fetchval" onchange="if (this.value == 'Status' || this.value == 'Objective') { populate('fetchval', 'fetchval2'); }">
          <option value="" disabled="" selected="" >Select Filter</option>
          <option value="Status">Status</option>
          <option value="Objective">Objective</option>
          <option value="Date">Date</option>
          <option value="Budget">Budget</option>
          <option value="Reset">Reset</option>
        </select>

        <!-- <label for="">Options</label> -->
        <select name="fetchval2" id="fetchval2" class="filter2">
          
        </select>

        <div class="budgetRange" id="budgetRange" style="display: none;">
          <input type="number" id="budget_min" name="budget_min" placeholder="Enter min budget...">
          <input type="number" id="budget_max" name="budget_max" placeholder="Enter max budget...">
          <button onclick="filterTable()">Filter</button>
        </div>

        <div class="dateRange" id="dateRange" style="display: none;">
          <input type="date" id="date_min" name="date_min" placeholder="Enter min date...">
          <input type="date" id="date_max" name="date_max" placeholder="Enter max date...">
          <button onclick="filterTable()">Filter</button>
        </div>
        
    </div>

    <!-- filtering -->
    <script>

      var fetchval = document.getElementById('fetchval');
      var fetchval2 = document.getElementById('fetchval2');
      var budgetRange = document.getElementById('budgetRange');
      var dateRange = document.getElementById('dateRange');

      fetchval.addEventListener('change', function() {

        if(fetchval.value === 'Status' || fetchval.value === 'Objective'){
            filterTable();
        }
        if (fetchval.value === 'Budget') {
            fetchval2.style.display = 'none';
            dateRange.style.display = 'none';
            budgetRange.style.display = 'block';
        } 
        else if(fetchval.value === 'Date'){
          fetchval2.style.display = 'none';
          budgetRange.style.display = 'none';
          dateRange.style.display = 'block';
        }
          else if (fetchval.value === 'Reset') {
            dateRange.style.display = 'none';
            budgetRange.style.display = 'none';
            fetchval2.style.display = 'block';
            fetchval2.value = '';
            fetchval.value = '';
            filterTable();
        }
        else {
            fetchval2.style.display = 'block';
            budgetRange.style.display = 'none';
            dateRange.style.display = 'none';
        }
      });

      fetchval2.addEventListener('change', function() {
            filterTable();
            
        });

        function populate(s1, s2){
          var select1 = document.getElementById(s1);
          var select2 = document.getElementById(s2);

          if(select2){
            console.log("Populating options for: " + s1);
            console.log("Populating options for: " + s2);

            select2.innerHTML = "";
            var optionArray;

            if(select1.value == "Status"){
              optionArray = ['ongoing','To Be Launched','complete'];
            }
            else if(select1.value == "Objective"){
              optionArray = ['leads','sales','awareness','engagement'];
            }

            for (var i = 0; i < optionArray.length; i++) {
              var option = document.createElement("option");
              option.value = optionArray[i];
              option.text = optionArray[i];
              select2.appendChild(option);
            }
          }
        }

        function filterTable() {
             var fetchval = document.getElementById("fetchval").value;
             var fetchval2 = document.getElementById("fetchval2").value;
             var budget_min = document.getElementById("budget_min").value;
             var budget_max = document.getElementById("budget_max").value;
             var date_min = document.getElementById("date_min").value;
             var date_max = document.getElementById("date_max").value;

             console.log("select 1:", fetchval);
             console.log("select 2:", fetchval2);

             // Construct SQL query based on the selected values
             var sql_query = "SELECT * FROM campaign ";
             if (fetchval === "Status") {
                 sql_query += "WHERE cmpg_stat = '" + fetchval2 + "'";
             } else if (fetchval === "Objective") {
                 sql_query += "WHERE objective = '" + fetchval2 + "'";
             } else if (fetchval === "Date") {
                 sql_query += "WHERE startdate >= '" + date_min + "' AND startdate <= '" + date_max + "'";
             } else if (fetchval === "Budget") {
                 sql_query += "WHERE budget >= " + budget_min + " AND budget <= " + budget_max;
             }
             else{
              //reset filter
                sql_query = "SELECT * FROM campaign";
                fetchval2.selectedIndex = 0;
                fetchval.selectedIndex = 0;
             }

             console.log("query:", sql_query);

             $(document).ready(function(){
                  $.ajax({
                    url: "fetch.php",
                    type: "POST",
                    data: {sql_query: sql_query,
                      identifier: 'campaign_filter'
                    },
                    success: function(response){
                    // Handle the response from the server here
                    console.log(response);
                    $(".tb_pg").html(response);
                  }
                });
              });             

         }

    </script>

<!-- pagination -->
  <script>
  
    $(document).ready(function() {
        // Fetch the initial page on page load
        fetchNextPage(<?php echo $page; ?>);

        // Attach click event listeners to the pagination links
        $('.prev-page').click(function() {
          fetchNextPage(<?php echo $page - 1; ?>);
        });

        $('.next-page').click(function() {
          fetchNextPage(<?php echo $page + 1; ?>);
        });

        $('.page-number').click(function() {
          var pageNumber = parseInt($(this).find('a').text());
          console.log("pagenumber working: ",pageNumber);
          fetchNextPage(pageNumber);
        });    
    });

    function fetchNextPage(pageNumber) {
      $.ajax({
        url: 'pagin_copy.php',
        type: 'GET',
        data: {
          page_campaigns: pageNumber,
          identifier: 'campaign_pagin'
        },
        success: function(data) {
          // Update the campaign list with the new data
          $('.content-table').html(data);

          // Update the URL with the new page number
          window.history.pushState({
            page: pageNumber
          }, '', '?page=' + pageNumber);

          // Update the active class for the pagination links
          $('.page-number').removeClass('active');
          $('.page-number').eq(pageNumber - 1).addClass('active');
        }
     });
    }

  </script>


<div class="tb_pg">
        <table class="content-table" id="content_data">
            <thead>
              <tr>
                <th>Campaign ID</th>
                <th>Start Date</th>
                <th>Objective</th>
                <th>Status</th>
                <th>Budget<br>(Rs.)</th>
              </tr>
            </thead>
            <tbody>
            <?php

                    // $sql = "SELECT * FROM campaign limit $start_from, $num_per_page";
                    $sql = "SELECT * FROM campaign limit $start_from, $num_per_page ";

                    $query = mysqli_query($con, $sql);

                    if(mysqli_num_rows($query) > 0 ){

                        foreach($query as $thing){
                            ?>
                                <tr>
                                    <td scope="row"><?=$thing['id']; ?></td>
                                    <td><?=$thing['startdate']; ?></td>
                                    <td><?=$thing['objective']; ?></td>
                                    <td>
                                        <!-- <select id="status_update_<?= $thing['id']; ?>" class="status_update" name="stat">
                                          <option value="unknown"><?=$thing['cmpg_stat']; ?></option>
                                          <option value="tobelaunched">To-be Launched</option>
                                          <option value="ongoing">Ongoing</option>
                                          <option value="complete">Complete</option>
                                        </select>    -->
                                    </td>
                                    <td><?=$thing['budget']; ?></td> 
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
  
  <script>
    // const selectElements = document.querySelectorAll('.status_update');

    // // Attach change event listener to each select element
    // selectElements.forEach(select => {
    //   select.addEventListener('change', function() {
    //     const campaignId = this.id.split('_')[2]; // Extract the campaign ID from the select element's ID
    //     const newStatus = this.value;
    //     console.log("working :", newStatus);
    //   });
    // });


  // var stat = document.getElementById('status_update');
  
  // stat.addEventListener('change', function() {

  //   updateStatus();
  // });

  // function updateStatus(){
  //   var stat_op = document.getElementById('status_update').value;
  //   console.log("working :", stat_op);
  // }
</script>

    <?php
      $pr_query = "SELECT * FROM campaign";
      
      $pr_res = mysqli_query($con, $pr_query);

      $total_records = mysqli_num_rows($pr_res);

      $total_pages = ceil($total_records/$num_per_page);?>

  <div style="margin-left: 750px; margin-bottom:30px;">
    <?php

      // if ($page > 1) {
      //   echo "<button class='page-link prev-page' style='margin-left:10px; border: none; outline: none;'><i class='fa-solid fa-circle-chevron-left fa-lg' style='color:#F8914A;'></i></button>";
      // }
    
      for ($i = 1; $i <= $total_pages; $i++) {

        // if($i == $page){
        //   echo "<button class='page-link page-number' style='margin-left:10px; border: none; outline: none; padding: 10px; background:#F8914A; border: 2px solid blue;'><a href='#' style='text-decoration:none; color:#FFFFFF;'>$i</a></button>";
        // }
        
          echo "<button class='page-link page-number' style='margin-left:10px; border: none; outline: none; padding: 10px; background:#F8914A;'><a href='#' style='text-decoration:none; color:#FFFFFF;'>$i</a></button>";
        
        // echo "<button class='page-link page-number' style='margin-left:10px; border: none; outline: none; padding: 10px; background:#F8914A;'><a href='#' style='text-decoration:none; color:#FFFFFF;'>$i</a></button>";
      }
    
      // if ($i - 1 > $page) {
      //   echo "<button class='page-link next-page' style='margin-left:10px; border: none; outline: none;'><i class='fa-solid fa-circle-chevron-right fa-lg' style='color:#F8914A;'></i></button>";
      // }
    ?>

  </div>
  </div>

  <div class="popup-container" id="popup_container">
        <div class="popup-modal">

        <?php
        $sqlCamp = "SELECT id FROM campaign ORDER BY id DESC LIMIT 1";
        $query = mysqli_query($con, $sqlCamp);
        if(mysqli_num_rows($query)>0){
          foreach($query as $thing){
            $id = $thing['id'];
          }
        }
        ?>
          <form name="campaigns" action="../../Model/dms/crud.php" method="post" onsubmit="return validateForm()">
            <label for="name" class="title"><h3 style="color: rgb(0, 0, 0); margin-top: 3px; margin-right: 10px; margin-bottom: 20px;">Campaign </h3> <h2 style="color: rgb(0, 0, 0);"><?php echo ($id+1) ?></h2>
            
          </label>
          <!-- <div class="error_msg" id="error_msg">Error msgs</div> -->
          <label for="start-date">Start Date
            <input type="date" id="s-date" name="start_d" required>
          </label>
          <label for="objective">Objective
            <select id="objective" name="obj" required>
                <option value="awareness">Awareness</option>
                <option value="leads">Leads</option>
                <option value="engagement">Engagement</option>
                <option value="sales">Sales</option>
            </select>
          </label>
          <label for="status">Status
            <select id="status" name="stat" required>
                <option value="To Be Launched">To-be Launched</option>
                <option value="Ongoing">Ongoing</option>
                <option value="Complete">Complete</option>
            </select>
          </label>
          <label for="budget">Budget
            <input type="number" id="budget" name="budget" required min="500" max="10000">
          </label>
          <button class="cancel" id="close" type="reset" value="Reset">Cancel</button>
          <button class="submit" id="save" type="submit" value="Submit" name="save">Save</button>
          </form>

        </div>
      </div>
  
    <script>
    // function validateForm() {
    //   var error_msg = document.getElementById("error_msg");
    //   var budget = document.forms["campaigns"]["budget"].value;
    //   var date = document.forms["campaigns"]["start_d"].value;
    //   var status = document.getElementById("status").value;
    //   var objective = document.getElementById("objective").value;
    //   if (budget == "" || date == "" || status == "" || objective == "") {
    //     error_msg.innerHTML = "All fields must be filled out";
    //     error_msg.style.display = "block";
    //     return false;
    //   }
    //   else if(budget <=0){
    //     error_msg.innerHTML = "Budget should be in the range 0-1000";
    //     error_msg.style.display = "block";
    //   }
      // else if((wCol>=1000) || (sCol>=1000) || (oCol>=1000)){
      //   error_msg.innerHTML = "Charges cannot exceed Rs.1000";
      //   error_msg.style.display = "block";
      //   return false;
      // }
      // else if((wCol<30) || (sCol<30) || (oCol<30)){
      //   error_msg.innerHTML = "Charges cannot be less than Rs.30";
      //   error_msg.style.display = "block";
      //   return false;
      // }
    // }
    </script>

      <!-- add campaigns popup -->
    <script>
        const add_btn = document.getElementById('add_btn');
        const close = document.getElementById('close');
        const save = document.getElementById('save');
        const popup_container = document.getElementById('popup_container');
        const form = document.forms["delivery"];

        add_btn.addEventListener('click', () => {
            popup_container.classList.add('show');
        });

        close.addEventListener('click', () => {
          // error_msg.style.display = 'none';
            popup_container.classList.remove('show');
            resetForm();
        });

        save.addEventListener('click', () => {
          if (validateForm()) {
            form.submit();
            popup_container.classList.remove('show');
          }
        });

        function resetForm() {
          form.reset();
        }

        function validateForm() {
          const stat = form.elements["stat"];
          const obj = form.elements["obj"];
          const start_d = form.elements["start_d"];

          if ((stat.value) == "" || (obj.value) == "" || (start_d.value) == "") {
            alert("Please enter a value");
            wCol.focus();
            return false;
          }
          return true;

        }
    </script>

    

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
</body>
</html>