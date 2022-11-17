<?php
	session_start();
	include("../../Model/connect.php");
	
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$orderID = $_POST["orderID"];
        $productCode = $_POST["productCode"];
        $complaint = $_POST["complaint"];
		
		if(!empty($orderID) && !empty($productCode) && !empty($complaint))
		{
			mysqli_query($con, "INSERT INTO complaint(orderID, productCode, complaint) values('$orderID', '$productCode', '$complaint')");
		}
		else
		{
			echo "<script>window.alert('Please enter valid information');</script>";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Rep</title>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!--stylesheet for icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Stylesheet for nav bar-->
    <link rel="stylesheet" href="../styles/navBar.css">
    <!--Stylesheet for the tabel-->
    <link rel="stylesheet" href="../styles/table.css">
    <!--Stylesheet for the complains.html-->
    <link rel="stylesheet" href="complaints.css">
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
                <small>Sales Representative</small>
            </div>
        </div>
    </div>

    <div class="side_bar">
        <div class="logo">
            <img src="../assets/logosales.jpeg" width="65%" height="55%">
        </div>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Orders</a></li>
            <li><a href="#">Customers</a></li>
            <li><a href="#">Stocks</a></li>
            <li><a href="#">Sales</a></li>
            <li class="active"><a href="#">Complaints</a></li>
            <li>
                <table class="side-bar-icons">
                    <tr>
                        <td><i class="fa-regular fa-circle-user"></i></td>
                        <td><a href="#">Profile</a></td>
                    </tr>
                    <tr>
                        <td><i class="fa-solid fa-arrow-right-from-bracket"></i></i></td>
                        <td><a href="#">Log out</a></td>
                    </tr>
                </table>
            </li>
        </ul>
    </div>
    </div>
    <!---end of side and nav bars-->
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>

    <!--Top right corner buttons-->
    <div class="btn_complaint">
        <button id="complaint_btn">Add<br>Complaint</button>
    </div>

    <!--Table-->
    <table class="content-table">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Order Date</th>
            <th>Product Code</th>
            <th>Customer ID</th>
            <th>Complain</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>23</td>
            <td>21/10/2022</td>
            <td>PR002</td>
            <td>12</td>
            <td>Damaged goods</td>
          </tr>
          <tr>
            <td>23</td>
            <td>21/10/2022</td>
            <td>PR002</td>
            <td>12</td>
            <td>Damaged goods</td>
          </tr>
          <tr>
            <td>23</td>
            <td>21/10/2022</td>
            <td>PR002</td>
            <td>12</td>
            <td>Damaged goods</td>
          </tr>
          <tr>
            <td>23</td>
            <td>21/10/2022</td>
            <td>PR002</td>
            <td>12</td>
            <td>Damaged goods</td>
          </tr>
          <tr>
            <td>23</td>
            <td>21/10/2022</td>
            <td>PR002</td>
            <td>12</td>
            <td>Damaged goods</td>
          </tr>
        </tbody>
      </table>
    
    <div class="navigation-table" id="nav_table">
        <i class="fa-solid fa-circle-chevron-left fa-lg"></i>
        <i class="fa-solid fa-circle-chevron-right fa-lg"></i>
    </div>

    <!--Popup Form-->
    <div class="popup-container" id="popup_container">
        <div class="popup-modal">
          <form method="post">
            <label for="orderID">Order ID
                <input type="number" id="orderID">
            </label>
            <label for="productCode">Product Code
                <input type="string" id="productCode">
            </label>
            <label for="complaint">Complaint
                <textarea name="complaint" id="complaint" required="required"></textarea>
            </label>
            <button class="cancel" id="close" type="reset" value="Reset">Cancel</button>
            <button class="submit" id="save" type="submit" value="Submit">Save</button>
          </form>
        </div>
      </div>

    <script>
        const complaint_btn = document.getElementById('complaint_btn');
        const close = document.getElementById('close');
        const save = document.getElementById('save');
        const popup_container = document.getElementById('popup_container');

        complaint_btn.addEventListener('click', () => {
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