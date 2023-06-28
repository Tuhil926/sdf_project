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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="apple-touch-icon" sizes="180x180" href="../../Attributes/Favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../Attributes/Favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../Attributes/Favicon/favicon-16x16.png">
    <link rel="manifest" href="../../Attributes/Favicon/site.webmanifest">
    <title>Quiz 6</title>
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
    if (!isset($_SESSION['progress'])  && $_SESSION['progress'] < 15)
        header('Location: ../../log_in/login.php');
    else {
        $result1 = mysqli_query($connect, "SELECT Progress from sign_in where UserName='$name';");
        $row1 = mysqli_fetch_array($result1);
        // echo "<script> alert('value of progress is $row1[0]'); </script> ";
        if ($row1[0] > 16)
        $updating = $row1[0];
        else
        $updating = 16;
        $result2 = mysqli_query($connect, "UPDATE sign_in SET Progress = $updating WHERE UserName='$name';");
        $_SESSION['progress'] = 16;
        mysqli_commit($connect);
    }

    ?>
    <header>
        <img id="logo" src="../../Attributes/Images/logo.png" alt="logo">
        <div id="header-right">
            <button id="mode-switch"><span class="material-symbols-outlined">dark_mode</span></button>
            <button id="settings-switch"><span class="material-symbols-outlined">settings</span></button>
        </div>
    </header>
    <div class="quiz">
        <div class="left_panel">
            <div class="question">
                <h1>Margin Align Size</h1>
                Use your knowledge of margins, text-align and font-size to make the output look the same as the expected
                result.
                The values for these parameters are mostly easy to figure out and not obscure values like 127 or
                something.<br><br>
                Note: Use div selector only.
            </div>
            <textarea id="editor" class="language-css" autocomplete="off" autocapitalize="off" spellcheck="false"
                oninput="update(this.value);sync_scroll(this);applyUserCSS();try_show_newx_button()"
                onscroll="sync_scroll(this);" onkeydown="check_tab(this, event);">/* Write your code here */</textarea>
            <pre id="highlighting"
                aria-hidden="true"><code class="language-css" id="highlighting-content">/* Write your code here */</code></pre>
        </div>
        <style id="result-style"></style>
        <!-- <iframe src="result.html" class="result"></iframe> -->
        <div class="result">
            <div class="tab-bar">
                <div class="tab" id="output-tab" onclick="show_output()">Output</div>
                <div class="tab" id="expected-tab" onclick="show_expected()">Expected</div>
            </div>
            <div class="output" id="output">
                <div class="a" id="a">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                <div class="b">Nullam vehicula ipsum a arcu cursus vitae congue mauris.</div>
            </div>
            <div id="expected">
                <div class="a">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                <div class="b">Nullam vehicula ipsum a arcu cursus vitae congue mauris.</div>
            </div>
        </div>

    </div>
    <div id="next" onclick="next_click()"><a href="../Quiz_7/quiz.php">Next</a></div>
</body>
<script src="../../prism.js"></script>
<script src="./index.js"></script>
<script src="../modeSwitch.js"></script>
</html>