<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="apple-touch-icon" sizes="180x180" href="../Attributes/Favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../Attributes/Favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../Attributes/Favicon/favicon-16x16.png">
    <link rel="manifest" href="../Attributes/Favicon/site.webmanifest">
</head>

<body>
<header>
        <style>
            #dropdown {
                display: inline-block;
            }

            .dropdown-content {
                left:94%;
                width:6%;
                display: none;
                position: absolute;
                border-radius: 10px;
                background-color: rgb(255, 151, 54) ;
                text-align:center;
                
                /* min-width: 160px; */
                box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                z-index: 10;
                /* margin-right: 10px; */
            }

            .dropdown:hover .dropdown-content {
                display: block;
            }
            
        </style>
        <img id="logo" src="../../Attributes/Images/logo.png" alt="logo">
        <div id="header-right">
            <button id="mode-switch"><span class="material-symbols-outlined">dark_mode</span></button>
            <div id="dropdown">
                <button id="settings-switch" onclick="">
                    <span class="material-symbols-outlined">Settings</span></button>
                <div class="dropdown-content">
                    <a href="../logout.php">Log Out</a>
                    <br>
                    <a href="#">Option 2</a>
                    <br>
                    <a href="#">Option 3</a>
                </div>
            </div>

            
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var dropdownButton = document.getElementById('settings-switch');
                var dropdownContent = document.querySelector('.dropdown-content');

                dropdownButton.addEventListener('click', function() {
                    dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
                });

                document.addEventListener('click', function(event) {
                    if (!dropdownButton.contains(event.target)) {
                        dropdownContent.style.display = 'none';
                    }
                });
            });
        </script>
    </header>
    <div id="motivation">
        <div id="talk">
            <h1 id="welcome">Welcome back,
                <?php
                session_start();
                if (!isset($_SESSION["progress"])){
                    header('Location: ../log_in/login.php');
                    exit();
                }
                echo '<span id="userName">' . $_SESSION["UserName"] . '</span>';

                ?>

            </h1>
            <q id="quot">Experience the power of CSS</q>
        </div>
        <div id="progress">
            <div id="lesson1" class="lesson">
                <p>Introduction to CSS</p>
                <button id="lesson1Button" class="btn">
                    <?php 
                        if ($_SESSION["progress"] == 0){echo "Get Started";
                            echo " 
                            <script>let var1 = document.getElementById('lesson1Button');

                            var1.addEventListener('click',function(){
                                window.location.href = 'http://localhost/sdf_web/sdf_project/Basics%20of%20CSS/Lesson%201';
                            
                            }); </script>";
                        }
                        else if ($_SESSION["progress"] < 10){echo "Continue";
                            echo " 
                            <script>let var1 = document.getElementById('lesson1Button');

                            var1.addEventListener('click',function(){
                                window.location.href = 'http://localhost/sdf_web/sdf_project/Basics%20of%20CSS/Lesson%201';
                            
                            }); </script>";
                            

                            
                        }
                        else {echo "Revise";}
                    ?>
                </button>
            </div>
            <div id="lesson2" class="lesson">
                <p>Essentials of CSS</p>
                <button id="lesson2Button" class="btn">
                    <?php 
                        if ($_SESSION["progress"] == 10){echo "Get Started";} 
                        else if ($_SESSION["progress"] < 10){echo "Locked";}
                        else if ($_SESSION["progress"] < 20){echo "Continue";}
                        else {echo "Revise";}
                    ?>
                </button>
            </div>
            <div id="lesson3" class="lesson">
                <p>Advanced CSS</p>
                <button id="lesson3Button" class="btn">
                    <?php 
                        if ($_SESSION["progress"] == 20){echo "Get Started";} 
                        else if ($_SESSION["progress"] < 20){echo "Locked";}
                        else if ($_SESSION["progress"] < 30){echo "Continue";}
                        else {echo "Revise";}
                    ?>
                </button>
            </div>
        </div>
    </div>
    <footer>
        <ul>
            <li>About Us</li>
            <li>Privacy Policy</li>
            <li>Do not sell my data</li>
            <li>Contact Us</li>
        </ul>
    </footer>
    <script src="./index.js"></script>
</body>

</html>