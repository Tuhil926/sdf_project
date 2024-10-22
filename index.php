<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="./log_in/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="apple-touch-icon" sizes="180x180" href="./Attributes/Favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./Attributes/Favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./Attributes/Favicon/favicon-16x16.png">
    <link rel="manifest" href="./Attributes/Favicon/site.webmanifest">
    <title>PractiCSS</title>
</head>
<body>
    <header>
        <img id="logo" src="./Attributes/Images/logo.png" alt="logo">
        <div class="banner-btn">
            <!-- <a onclick="show1()" href="log_in/login.html" id="sign_in"> <span></span>Sign Up</a> -->
            <a onclick="show2()" href="log_in/login.php" id="sign_up"> <span></span>Get Started</a>
        </div>
    </header>

    
    
    <!-- <h2>Welcome to [project name]! Tired of not being able to get CSS to work? Learn CSS now!</h2> -->
    <div class="slideshow">
        <button class="slideshow_btn" onclick="doLeft();reset_btn();">&lt;</button>
        <div class="container">
            <div class="page_desc">
                Learn css easily
                <br>
                <img src="Attributes/Images/bocLogo.jpg" alt="demo1" class="demo_img" id="first_img">
            </div>
            <div class="page_desc">
                Slide based learning
                <br>
                <img src="Attributes/Images/slideDemo.png" alt="demo1" class="demo_img">
            </div>
            <div class="page_desc">
                Quizzes at the end of each chapter to practice your skills
                <br>
                <img src="Attributes/Images/editorDemo.png" alt="demo1" class="demo_img">
            </div>
        </div>
        <button class="slideshow_btn" onclick="doRight();reset_btn();">&gt;</button>
    </div>
    <div id="some_stuff">
        <h1> About us</h1>
        This is a group project by Aditya, Hemanth and Tuhil, made for the Software development fundamentals course in IIT Hyderabad.
    </div>
    <script>
        // import{show1,show2} from "log_in/login.js";

        var scroll_amount = 1000;
        var img_no = 0;
        var no_of_imgs = 3;
        var button_clicked = false;
        function doRight(){
            img_no += 1;
            if (img_no >= no_of_imgs){
                img_no = 0;
                document.querySelector(".container").scrollLeft = 0;
            }else{
                document.querySelector(".container").scrollLeft += scroll_amount;
            }
        }
        function doLeft(){
            img_no -= 1;
            if (img_no < 0){
                img_no = no_of_imgs - 1;
                document.querySelector(".container").scrollLeft = no_of_imgs*scroll_amount;
            }else{
                document.querySelector(".container").scrollLeft -= scroll_amount;
            }
        }
        function recursive_repeat(){
            if (!button_clicked){
                doRight();
                setTimeout(recursive_repeat, 3000);
            }
        }
        function reset_btn(){
            button_clicked =true;
            setTimeout(() => {
                button_clicked =false;
                setTimeout(recursive_repeat, 3000);
            }, 10000);
        }
        setTimeout(recursive_repeat, 3000);
    </script>
</body>
</html>