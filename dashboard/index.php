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
        <img id="logo" src="../Attributes/Images/logo.png" alt="logo">
        <div id="header-right">
            <button id="mode-switch"><span class="material-symbols-outlined">dark_mode</span></button>
            <button id="settings-switch"><span class="material-symbols-outlined">settings</span></button>
        </div>
    </header>
    <div id="motivation">
        <div id="talk">
            <h1 id="welcome">Welcome back,
                <?php
                session_start();
               echo '<span id="userName">' .$_SESSION["UserName"] . '</span>';

                ?>

            </h1>
            <q id="quot">Experience the power of CSS</q>
        </div>
        <div id="progress">
            <div id="lesson1" class="lesson">
                <p>Introduction to CSS</p>
                <button id="lesson1Button" class="btn">Get Started</button>
            </div>
            <div id="lesson2" class="lesson">
                <p>Essentials of CSS</p>
                <button id="lesson2Button" class="btn">Locked</button>
            </div>
            <div id="lesson3" class="lesson">
                <p>Advanced CSS</p>
                <button id="lesson3Button" class="btn">Locked</button>
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