<!DOCTYPE html>
<html lang="en">




<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

</head>

<body>
    <script>
        let bool = false;
        </script>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['form1'])) {
            $server = "localhost";
            $username = "root";
            $password = "";
            $database = "Details";

            $connect = mysqli_connect($server, $username, $password, $database);




            $showalert = false;
            $showerror = false;
            $username = $_POST["UserName"];
            $email_id = $_POST["Email_id"];
            $password = $_POST["Password"];
            $result1 = mysqli_query($connect, "SELECT Count(*) from sign_in where UserName='$username';");
            $result3 = mysqli_query($connect, "SELECT Count(*) from sign_in where Email_id='$email_id';");
            $row1 = mysqli_fetch_array($result1);
            $row3 = mysqli_fetch_array($result3);



            if ($row1[0] == 0 && $row3[0] == 0) {
                $sql2 = "INSERT INTO sign_in VALUES (0, '$username', '$email_id', '$password', 0)";
                $result = mysqli_query($connect, $sql2);

                if ($result) {
                    $showalert = true;
                    mysqli_commit($connect);
                    session_start();
                    $_SESSION['UserName'] = $username;
                    if (isset($_SESSION['UserName'])) {
                        // Redirect to the login page
                        header('Location: ../dashboard/index.php');
                        exit(); // Ensure that the script stops executing
                    }
                }
            } else if ($row1[0])
                echo " <script> alert('UserName already exists')
                       bool = true;  
                </script>";
            else
                echo "<script> alert('Email-id already taken')
                bool = true;
                </script>";
        } else if (isset($_POST['form2'])) {
            $server = "localhost";
            $username = "root";
            $password = "";
            $database = "Details";

            $connect = mysqli_connect($server, $username, $password, $database);

            $showalert = false;
            $showerror = false;
            $username = $_POST["UserName"];
            $password = $_POST["Password"];

            $result1 = mysqli_query($connect, "SELECT Count(*) from sign_in where UserName='$username' AND Password='$password';");
            $row = mysqli_fetch_array($result1);





            if ($row[0] != 0) {
                $sql2 = "SELECT Progress from sign_in where UserName='$username';";
                $result = mysqli_query($connect, "SELECT Progress from sign_in where UserName='$username';");
                $row = mysqli_fetch_array($result);
                $showalert = true;
                mysqli_commit($connect);
                session_start();
                $_SESSION['UserName'] = $username;
                if (isset($_SESSION['UserName'])) {
                    // Redirect to the login page
                    header('Location: ../dashboard/index.php');
                    exit(); // Ensure that the script stops executing
                }
            } else
                echo " <script> alert('Invalid User Name or Password')</script>";
        }
    }

    ?>

    <header>
        <img id="logo" src="../Attributes/Favicon/logo.png" alt="logo">
        <div class="banner-btn">
            <a onclick="show1()" href="#" id="sign_up"> <span></span>Sign Up</a>
            <a onclick="show2()" href="#" id="sign_in"> <span></span>Sign In</a>
        </div>

    </header>
    <div class="main">
        <div id="pop">
            <div class="image">
                <img class="image1" id="image1" src="../Attributes/Images/signup.jpg"></img>
                <img class="image2" id="image2" src="../Attributes/Images/sign_upp.png"></img>
            </div>
            <div class="hj">
                <div id="popup">
                    <h1 class="heading">Sign Up</h1>
                    <form class="form" method="POST">
                        <label class="x" for name>UserName</label>
                        <br>
                        <input class="y" type="text" id="name" value="Aditya" name="UserName"></input>
                        <br>
                        <label class="x" for name>E-mail Id</label>
                        <br>
                        <input class="y" type="text" id="name" value="Aditya" name="Email_id"></input>
                        <br>
                        <label class="x" for name>Password</label>
                        <br>
                        <input class="y" type="password" id="name" value="Aditya" name="Password"></input>
                        <br>
                        <input class="z" type="checkbox" id="name">I agree to the terms and conditions </input>
                        <br>

                        <div class="buttondiv">

                            <input class="pressButton" type="submit" value="Sign Up" name="form1"> </input> <br>
                        </div>
                    </form>
                    <div class="buttondiv">
                        <button onclick="show2()" id="pressBelow">Already have an account ? Sign in </p>
                        </button>
                    </div>


                </div>
                <div id="popup1">
                    <h1 class="heading">Sign In</h1>
                    <form class="form" method="POST">
                        <label class="x" for name>UserName</label>
                        <br>
                        <input class="y" type="text" id="name" value="Aditya" name="UserName"></input>
                        <br>
                        <label class="x" for name>Password</label>
                        <br>
                        <input class="y" type="password" id="name" value="Aditya" name="Password"></input>
                        <br>



                        <div class="buttondiv">
                            <input class="pressButton" type="submit" value="Sign In" name="form2"> </input> <br>
                        </div>
                    </form>
                    <div class="buttondiv">
                        <button onclick="show1()" id="pressBelow">New User ? Sign Up </p>
                        </button>
                    </div>


                </div>
            </div>




        </div>




    </div>
    <script src="login.js"></script>
    <footer id="footer">

        <ul>
            <li>About Us</li>
            <li>Privacy Policy</li>
            <li>Do not sell my data</li>
            <li>Contact Us</li>
        </ul>

    </footer>
</body>

</html>