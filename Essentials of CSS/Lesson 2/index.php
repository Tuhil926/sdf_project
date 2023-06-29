<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Need of CSS</title>
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
    if (!isset($_SESSION['progress'])  && $_SESSION['progress'] < 10)
        header('Location: ../../log_in/login.php');
    else {
        $result1 = mysqli_query($connect, "SELECT Progress from sign_in where UserName='$name';");
        $row1 = mysqli_fetch_array($result1);
        // echo "<script> alert('value of progress is $row1[0]'); </script> ";
        if ($row1[0] > 11)
        $updating = $row1[0];
        else
        $updating = 11;
        $result2 = mysqli_query($connect, "UPDATE sign_in SET Progress = $updating WHERE UserName='$name';");
        $_SESSION['progress'] = $updating;
        mysqli_commit($connect);
    }

    ?>
    <h1 id="section-heading">The Box Model</h1>
    <div id="main-container">
        <div id="slide1">
            <p class="para">
                One of the most basic necessities to make your website look attractive . 
                It includes :
                
                
            </p>
            <ul class="para">
                <li>Border : The border enclosing the text . By default it is empty but by using CSS we can add attractive borders by changing color , thickness .</li>
                <br>
                <li>Padding: The distance of the text from border is governed by this styling . We can specifically change top ,bottom, right , left padding by mentioning it .  </li>
                <br>
                <li>Margin: The distance of the border from its ancestor div . Margin can easily be set be mentioning its value  </li>
            </ul>
            <h2 class="para" id="conc">These three when used appropriately make the layout impressive and neat ! </h2>
            <div id ="images">
            <figure>
                <img class="bocLogo" src="../../Attributes/Images/boxmodel.png" width="600px" height="278px">
                <figcaption id="bocLogoCaption">A sample CSS code</figcaption>
            </figure>
            <figure>
                <img class="bocLogo" src="../../Attributes/Images/pic.png" width="450px" height="278px">
                <figcaption id="bocLogoCaption">Actual represntation</figcaption>
            </figure>
            </div>

        </div>
    </div>
    <a id="prev" href="../Lesson 1/index.php">Previous</a>
    <a id="next" href="../Lesson 3/index.php">Next</a>
</body>
<script src="./index.js"></script>

</html>