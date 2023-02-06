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
    <link rel="stylesheet" href="../../View/styles/navBar.css">
    <!--Stylesheet for popup form-->
    <link rel="stylesheet" href="../../View/styles/popupForm.css">
    <!--Stylesheet for order cards-->
    <link rel="stylesheet" href="../../View/styles/cards.css">
    <!--Stylesheet for table search bar-->
    <link rel="stylesheet" href="../../View/styles/tableSearch.css">
    <!--Stylesheet for buttons on order cards-->
    <link rel="stylesheet" href="../../View/styles/buttons.css">
    <!--Stylesheet for navigation arrows-->
    <link rel="stylesheet" href="../../View/styles/navButtons.css">

    <style>
      div.side_bar ul li{
        padding-top: 8%;
        padding-bottom: 4%;
    }

    .side-bar-icons{
      margin-top: 20%;
    }
    .cards{
        margin-left: 22%;
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
                        <a><i class="fa-solid fa-magnifying-glass"></i></a>
                    </td>
                </tr>
            </table>
        </div>
  
        <div class="user-wrapper">
            <img src="../../View/assets/man.png" width="50px" height="50px" alt="user image">
            <div>
                <h4>John Doe</h4>
                <small style="color:rgb(235, 137, 58)">Sales Representative</small>
            </div>
        </div>
    </div>
  
    <div class="side_bar">
        <div class="logo">
        <img src="../../View/assets/saleslogo-final.png" width= "70%" height="70%">
        </div>
        <ul>
            <li><a href="landingUi.php"><i class="fa-solid fa-house"></i>Home</a></li>
            <li><a href="ordersUi.php"><i class="fa-solid fa-file-circle-check"></i>Orders</a></li>
            <li class="active"><a href="customersUi.php"><i class="fa-solid fa-user-group"></i>Customers</a></li>
            <li><a href="stocksUi.php"><i class="fa-solid fa-warehouse"></i>Stocks</a></li>
            <li><a href="salesUi.php"><i class="fa-solid fa-sack-dollar"></i>Sales</a></li>
            <li><a href="complaints.php"><i class="fa-solid fa-comment"></i>Complaints</a></li>
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
    <script src="https://kit.fontawesome.com/ed71ee7a11.js" crossorigin="anonymous"></script>
    <!---end of side and nav bars-->

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

    <!--Orders Cards-->
    <div class="cards-middle" id="cards_middle">
        <ul class="middle-cards">
            <li>
                <div class="cards">
                    <div class="cmpg">
                        <h2>Senu Dilshara</h2>
                    </div>
                    <div class="dv">
                        <div class="button view">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-eye"></i></td>
                                    <td><button id="view" class="perf">View</button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="button update">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td><button id="update" class="update-txt">Update</button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="button delete">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-trash"></i></td>
                                    <td><button id="delete" class="delete-txt">Delete</button></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="cards">
                    <div class="cmpg">
                        <h2>Bethmi Navanjana</h2>
                    </div>
                    <div class="dv">
                        <div class="button view">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-eye"></i></td>
                                    <td><button id="view" class="perf">View</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="button update">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td><button id="update" class="update-txt">Update</button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="button delete">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-trash"></i></td>
                                    <td><button id="delete" class="delete-txt">Delete</button></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="cards">
                    <div class="cmpg">
                        <h2>Binu De Silva</h2>
                    </div>
                    <div class="dv">
                        <div class="button view">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-eye"></i></td>
                                    <td><button id="view" class="perf">View</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="button update">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td><button id="update" class="update-txt">Update</button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="button delete">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-trash"></i></td>
                                    <td><button id="delete" class="delete-txt">Delete</button></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="cards">
                    <div class="cmpg">
                        <h2>Kaveesha Perera</h2>
                    </div>
                    <div class="dv">
                        <div class="button view">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-eye"></i></td>
                                    <td><button id="view" class="perf">View</button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="button update">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td><button id="update" class="update-txt">Update</button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="button delete">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-trash"></i></td>
                                    <td><button id="delete" class="delete-txt">Delete</button></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="cards">
                    <div class="cmpg">
                        <h2>Maleesha Fernando</h2>
                    </div>
                    <div class="dv">
                        <div class="button view">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-eye"></i></td>
                                    <td><button id="view" class="perf">View</button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="button update">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td><button id="update" class="update-txt">Update</button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="button delete">
                            <table>
                                <tr>
                                    <td><i class="fa-solid fa-trash"></i></td>
                                    <td><button id="delete" class="delete-txt">Delete</button></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        
        <!--Popup Form-->
        <div class="popup-container" id="popup_container"> 
            <div class="popup-modal">
              <form>
                <fieldset id="form_field">
                  <label for="name">Customer Name
                      <input type="text" value="Senu Dilshara">
                  </label>
                  
      
                  <label for="address">Address
                      <input type="text" value="23/A, Flower Road, Maharagama">
                  </label>
                  
      
                  <label for="phone">Phone Number
                      <input type="text" value="0713648954">
                  </label>
                  
      
                  <label for="socialMediaPlatform">Social Media Platform
                    <select id="socialMediaPlatform">
                        <option value="facebook">Facebook</option>
                        <option value="instagram">Instagram</option>
                        <option value="whatsapp">WhatsApp</option>
                    </select>
                  </label>
                </fieldset>
                  
                <label class="sp-label">
                    <button class="cancel" id="close">Cancel</button>
                    <button class="submit" id="save">Update</button>
                </label>  
              </form>
            </div>
        </div>
        <script>
            const view = document.getElementById('view');
            const update = document.getElementById('update');
            const popup_container = document.getElementById('popup_container');
            const close = document.getElementById('close');
            const save = document.getElementById('save');
            const form_field = document.getElementById('form_field');
            
            view.addEventListener('click', () => {
                popup_container.classList.add('show');
                form_field.setAttribute('disabled', true);
            });

            update.addEventListener('click', () => {
                popup_container.classList.add('show');
            });
    
            close.addEventListener('click', () => {
                popup_container.classList.remove('show');
            });
    
            save.addEventListener('click', () => {
                popup_container.classList.remove('show');
            });
    
            save.addEventListener('click', () => {
                popup_container_pwd.classList.remove('show');
            });
        </script>

        <div class="navigation-table" id="nav_table">
            <i class="fa-solid fa-circle-chevron-left fa-lg"></i>
            <i class="fa-solid fa-circle-chevron-right fa-lg"></i>
        </div>
</body>

</html>