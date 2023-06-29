<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flex Direction</title>
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
    if (!isset($_SESSION['progress'])  && $_SESSION['progress'] < 20)
        header('Location: ../../log_in/login.php');
    else {
        $result1 = mysqli_query($connect, "SELECT Progress from sign_in where UserName='$name';");
        $row1 = mysqli_fetch_array($result1);
        // echo "<script> alert('value of progress is $row1[0]'); </script> ";
        if ($row1[0] > 21)
        $updating = $row1[0];
        else
        $updating = 21;
        $result2 = mysqli_query($connect, "UPDATE sign_in SET Progress = $updating WHERE UserName='$name';");
        $_SESSION['progress'] = $updating;
        mysqli_commit($connect);
    }

    ?>
    <h1 id="section-heading">Flex Direction</h1>
    <div id="main-container">
        <div id="slide1">
            <p class="para">
            The flex-direction CSS property sets the main axis and the direction of flex items inside the flex container. <br>
            -> The main axis can be row or column which specifies the aliginment of flex items.<br>
            -> The direction property specifies the direction of items in the main axis. It can be reverse. For normal direction, We don't need to specify anything.<br>
            Note: By default, It is set to row. You can make it column by writing "flex-direction: column";
            </p>
            <div class="rowAlign">
                <figure>
                    <img class="flexImg" src="../../Attributes/Images/rowReverseCode.png" height="100px">
                    <figcaption>Aligning flex-items reverse in a row</figcaption>
                </figure>
                <figure>
                    <img class="flexImg" src="../../Attributes/Images/columnReverseCode.png" height="100px">
                    <figcaption>Aligning flex-items reverse in a column</figcaption>
                </figure>
            </div>
            <figure>
                <img class="flexImg" src="../../Attributes/Images/rowReverseResult.png" height="100px">
                <figcaption>Result</figcaption>
            </figure>
        </div>
    </div>
    <a id="prev" href="../Lesson 1/index.php">Previous</a>
    <a id="next" href="../Lesson 3/index.php">Next</a>
</body>
<script src="./index.js"></script>

</html>