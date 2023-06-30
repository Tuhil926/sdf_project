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
    <title>Final Exam</title>
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
    if (!isset($_SESSION['progress'])  && $_SESSION['progress'] < 27)
        header('Location: ../../log_in/login.php');
    else {
        $result1 = mysqli_query($connect, "SELECT Progress from sign_in where UserName='$name';");
        $row1 = mysqli_fetch_array($result1);
        // echo "<script> alert('value of progress is $row1[0]'); </script> ";
        if ($row1[0] > 28)
        $updating = $row1[0];
        else
        $updating = 28;
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
    <div class="quiz">
        <div class="left_panel">
            <div class="question">
                <h1>Final Exam</h1>
                <p>You will be tested on all the topics covered in this course</p>
                <p>There are two classes with names "test1" and "test2". Style them as per the following requirements</p>
                <ul class="examList msfl">
                    <li class="msfl">Make test1 a container of 200px height</li>
                    <li class="msfl">It's background color should be #6527BE</li>
                    <li class="msfl">Increase font size to 24px and color to #FF6666</li>
                    <li class="msfl">Make it look like it was striked off</li>
                    <li class="msfl">Make test2 a container of 200px</li>
                    <li class="msfl">Background color is #990000 and font color is #D4D925</li>
                    <li class="msfl">Size of text is 24px</li>
                    <li class="msfl">It's opacity should be 0.76</li>
                    <li class="msfl">It should have a #4E6C50 dotted border of 10px</li>
                    <li class="msfl">Style it using margin & flexbox according to the Expected output</li>
                    <li class="msfl">Good luck!</li>
                </ul>
            </div>
            <textarea id="editor" class="language-css" autocomplete="off" autocapitalize="off" spellcheck="false" oninput="update(this.value);sync_scroll(this);applyUserCSS();try_show_newx_button()" onscroll="sync_scroll(this);" onkeydown="check_tab(this, event);">/* Write your code here */
.test{
    color: orange;
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
                <div class="test1">Debugging code is tedious</div>
                <div class="test2">
                    <p>Clearing</p>
                    <p>Final</p>
                    <p>Exam</p>
                    <p>is</p>
                    <p>not</p>
                    <p>so</p>
                    <p>easy.</p>
                </div>
            </div>
            <div id="expected">
                <div class="a1">Debugging code is tedious</div>
                <div class="a2">
                    <p>Clearing</p>
                    <p>Final</p>
                    <p>Exam</p>
                    <p>is</p>
                    <p>not</p>
                    <p>so</p>
                    <p>easy.</p>
                </div>
            </div>
        </div>
        
    </div>

    <div id="next" onclick="next_click()"><a href="#">Next</a></div>
</body>
<script src="../../prism.js"></script>
<script src="./index.js"></script>
<script src="../modeSwitch.js"></script>
<script>
    update(document.getElementById("editor").value);
    applyUserCSS();
</script>
</html>