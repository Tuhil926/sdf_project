<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../prism.css">
    <link rel="stylesheet" href="./quiz.css">
    <link rel="stylesheet" href="../../dashboard/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="apple-touch-icon" sizes="180x180" href="../../Attributes/Favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../Attributes/Favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../Attributes/Favicon/favicon-16x16.png">
    <link rel="manifest" href="../../Attributes/Favicon/site.webmanifest">
    <title>Quiz 3</title>
</head>
<body>
<?php
    $server = "localhost";
    $Username = "root";
    $Password = "";
    $database = "Details";

    $connect = mysqli_connect($server, $Username, $Password, $database);
    session_start();
    $name = $_SESSION['UserName'];
    if (!isset($_SESSION['progress'])  || $_SESSION['progress'] < 23)
        header('Location: ../../log_in/login.php');
    else {
        $result1 = mysqli_query($connect, "SELECT Progress from sign_in where UserName='$name';");
        $row1 = mysqli_fetch_array($result1);
        // echo "<script> alert('value of progress is $row1[0]'); </script> ";
        if ($row1[0] > 24)
        $updating = $row1[0];
        else
        $updating = 24;
        $result2 = mysqli_query($connect, "UPDATE sign_in SET Progress = $updating WHERE UserName='$name';");
        $_SESSION['progress'] = $updating;
        mysqli_commit($connect);
    }

    ?>
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
                    <a href="../../logout.php">Log Out</a>
                    <br>
                    <a href="../../dashboard/index.php">DashBoard</a>
                    <br>
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
    <div class="quiz">
        <div class="left_panel">
            <div class="question">
                <h1>Justify Code</h1>
                <h4>There is a container with class by name "test". It contains 5 paragraph elements without any class/id selectors.</h4>
                <ul class="taskList">
                    <li class="msfl">Make the container a flex-container with a height of 400px</li>
                    <li class="msfl">Change it's background color to #B83B5E</li>
                    <li class="msfl">Get the paragraph elements into the middle of page</li>
                    <li class="msfl">Change their color to #F08A5D</li>
                    <li class="msfl">Make their font-size to 15px</li>
                    <li class="msfl">Align those paragraph elements into a column</li>
                </ul>
                <pre> </pre>
            </div>
            <textarea id="editor" class="language-css" autocomplete="off" autocapitalize="off" spellcheck="false" oninput="update(this.value);sync_scroll(this);applyUserCSS();try_show_newx_button()" onscroll="sync_scroll(this);" onkeydown="check_tab(this, event);">/* Write your code here */
.test{
    display:none;
}</textarea>
            <pre id="highlighting" aria-hidden="true"><code class="language-css" id="highlighting-content">/* Write your code here */ </code></pre>
        </div>
        <style id="result-style"></style>
        <!-- <iframe src="result.html" class="result"></iframe> -->
        <div class="result">
            <div class="tab-bar">
                <div class="tab" id="output-tab" onclick="show_output()">Output</div>
                <div class="tab" id="expected-tab" onclick="show_expected()">Expected</div>
            </div>
            <div class="output" id="output">
                <div class="test">
                    <p>Item 1</p>
                    <p>Item 2</p>
                    <p>Item 3</p>
                    <p>Item 4</p>
                    <p>Item 5</p>
                </div>
            </div>
            <div id="expected">
                <div class="a">
                    <p>Item 1</p>
                    <p>Item 2</p>
                    <p>Item 3</p>
                    <p>Item 4</p>
                    <p>Item 5</p>
                </div>
            </div>
        </div>
        
    </div>

    <div id="next"><a href="../Quiz_9/quiz.php">Next</a></div>
</body>
<script src="../../prism.js"></script>
<script src="./index.js"></script>
<script src="../modeSwitch.js"></script>
<script>
    update(document.getElementById("editor").value);
    applyUserCSS();
</script>
</html>