<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments in CSS</title>
    <link rel="stylesheet" href="../../next_btn.css">
    <link rel="stylesheet" href="./index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="apple-touch-icon" sizes="180x180" href="../../Attributes/Favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../Attributes/Favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../Attributes/Favicon/favicon-16x16.png">
    <link rel="manifest" href="../../Attributes/Favicon/site.webmanifest">
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
    if (!isset($_SESSION['progress'])  && $_SESSION['progress'] < 2)
        header('Location: ../../log_in/login.php');
    else {
        $result1 = mysqli_query($connect, "SELECT Progress from sign_in where UserName='$name';");
        $row1 = mysqli_fetch_array($result1);
        echo "<script> alert('value of progress is $row1[0]'); </script> ";
        $result2 = mysqli_query($connect, "UPDATE sign_in SET Progress = 3 WHERE UserName='$name';");
        $_SESSION['progress'] = 3;
        mysqli_commit($connect);
    }

    ?>
    <h1 id="section-heading">Comments in CSS</h1>
    <div id="main-container">
        <div id="slide4">
            <p class="para">
                In CSS, We can add explanations about code, remainders, temporarily disabling a part of code.
                Comments are ignored by browser and are not rendered on web page. Anything between "/*" and "*/" are
                treated as comments.
            </p>
            <div id="commentImages">
                <figure>
                    <img class="comments" src="../../Attributes/Images/cssComments.png">
                    <figcaption>Syntax of comments in CSS</figcaption>
                </figure>
            </div>
        </div>
    </div>
    <a id="prev" href="../Lesson 3/index.html">Previous</a>
    <a id="next" href="../../Quizzes/Quiz_1/quiz.php">Next</a>
</body>
<script src="./index.js"></script>

</html>