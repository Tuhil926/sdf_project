<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Align Items</title>
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="../../next_btn.css">
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
    if (!isset($_SESSION['progress'])  && $_SESSION['progress'] < 22)
        header('Location: ../../log_in/login.php');
    else {
        $result1 = mysqli_query($connect, "SELECT Progress from sign_in where UserName='$name';");
        $row1 = mysqli_fetch_array($result1);
        // echo "<script> alert('value of progress is $row1[0]'); </script> ";
        if ($row1[0] > 23)
        $updating = $row1[0];
        else
        $updating = 23;
        $result2 = mysqli_query($connect, "UPDATE sign_in SET Progress = $updating WHERE UserName='$name';");
        $_SESSION['progress'] = $updating;
        mysqli_commit($connect);
    }

    ?>
    <h1 id="section-heading">Align Items</h1>
    <div id="main-container">
        <div id="slide1">
            <p class="para">The Align Items CSS property controls the alignment of items inside their flex-container along the axis which is not main-axis. This is similar to Justify Content.</p>
            <ul class="para">
                Some of the most comment values of align items are:
                <li>center : Aligns items around the center</li>
                <li>start : Aligns items from the start</li>
                <li>end : Aligns items from the end</li>
            </ul>
            <div class="alignImg">
                <figure>
                    <img src="../../Attributes/Images/alignCode.png" height="200px">
                    <figcaption>Code to set align items to center</figcaption>
                </figure>
                <figure>
                    <img src="../../Attributes/Images/alignResult.png" height="200px">
                    <figcaption>Result</figcaption>
                </figure>
            </div>
        </div>
    </div>
    <a id="prev" href="../Lesson 3/index.php">Previous</a>
    <a id="next" href="../../Quizzes/Quiz_8/quiz.php">Next</a>
</body>
<script src="./index.js"></script>

</html>