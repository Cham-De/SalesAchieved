<?php

if(isset($_POST['reportName'])){
    $reportName = $_POST['reportName'];

    // $sql_query .= " limit $start_from, $num_per_page ";

    if($reportName == 'performance'){
        
      ?>
        <form action="./test-reports.php" method="POST" target="_blank">
              <h3>Performance Review</h3>
              <Label for="subjet" class="subject_label">Select a subject</Label>
              <select name="subject" id="subject">
              <option value="" disabled="" selected="" >--Select--</option>
                <option value="Products">Products</option>
                <option value="Sales">Sales</option>
              </select>
              
              <div class="range">
                <div class="range_sub">
                  <Label for="month_range" class="subject_label" id="month_label">Month</Label>
                    <select name="month" id="month">
                      <option value="" disabled="" selected="" >--Select--</option>
                      <option value="None">None</option>
                      <option value="January">January</option>
                      <option value="February">February</option>
                      <option value="March">March</option>
                      <option value="April">April</option>
                      <option value="May">May</option>
                      <option value="June">June</option>
                      <option value="July">July</option>
                      <option value="August">August</option>
                      <option value="September">September</option>
                      <option value="October">October</option>
                      <option value="November">November</option>
                      <option value="December">December</option>
                    </select>
                  </div>

                  <div class="range_sub">
                    <Label for="month_range" class="subject_label" id="month_label">Year</Label>
                    <select name="year" id="year">
                      <option value="" disabled="" selected="" >--Select--</option>
                      <option value="2023">2023</option>
                      <option value="2022">2022</option>
                      <option value="2021">2021</option>
                      <option value="2020">2020</option>
                    </select>
                  </div>
                
              </div>
              
              <button class="report_btn" type="submit" name="generate">Generate Report >></button>
              </form>
        <?php
    }
    elseif($reportName == 'income_stmt'){
      ?>
        <h3>Income Statement</h3>
        <!-- <h5>For the Year 2022</h5> -->
        <form action="./test-reports.php" method="POST" target="_blank">
        <button class="report_btn" type="submit" name="generateIn">Generate Report >></button>
        </form>
      <?php
  }

  elseif($reportName == 'inventory_report'){
      ?>
        <h3>Inventory Report</h3>
        <form action="./test-reports.php" method="POST" target="_blank">
        <button class="report_btn" type="submit" name="generateI">Generate Report >></button>
        </form>
      <?php
  }

  elseif($reportName == 'budget_forecast'){
    ?>
      <h3>Budget Forecast</h3>
      <form action="./test-reports.php" method="POST" target="_blank">
      <Label for="subjet" class="subject_label">Select a Time Period</Label>
              <select name="subject" id="subject">
              <option value="" disabled="" selected="" >--Select--</option>
                <!-- <option value="Month">Upcoming Month</option> -->
                <option value="Quarter">Upcoming Quarter</option>
                <option value="Year">Upcoming Year</option>
              </select>
      <button class="report_btn" type="submit" name="generateB">Generate Report >></button>
      </form>
    <?php
}
    
}
else{
    ?>
        <p>Select a Report</p>
    <?php
}

