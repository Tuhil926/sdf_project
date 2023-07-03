<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
        integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <?php
    session_start();
    if (!isset($_SESSION['progress']) || $_SESSION['progress'] < 28)
        header('Location: log_in/login.php');
    ?>
    <script>
        function screenshot() {
            document.getElementById("writing").style.marginTop = "75px";
            document.getElementById("cert_comp").style.marginTop = "75px";
            html2canvas(document.getElementById("certificate")).then(function (canvas) {
                var img = canvas.toDataURL("image/png");
                saveAs(img, 'practiCSS_certificate.png');
                // var doc = new jspdf.jsPDF({orientation: "landscape"});
                // // var doc = new jspdf.jsPDF();
                // doc.addImage(img, "JPEG", 20, 20);
                // doc.save("practiCSS_certificate.pdf");
            });
            document.getElementById("writing").style.marginTop = "0";
            document.getElementById("cert_comp").style.marginTop = "0";
        }
        function saveAs(uri, filename) {
            var link = document.createElement('a');
            if (typeof link.download === 'string') {
                link.href = uri;
                link.download = filename;
                //Firefox requires the link to be in the body
                document.body.appendChild(link);
                //simulate click
                link.click();
                //remove the link when done
                document.body.removeChild(link);
            } else {
                window.open(uri);
            }
        }
    </script>
    <style>
        body {
            background-color: rgb(255, 235, 183);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-family: "Poppins";
            text-align: center;
            margin: 0;
        }

        h1 {
            background-color: rgb(189, 172, 133);
            font-size: 50px;
            text-align: center;
            margin: 0;
            padding: 20px;
        }

        h2 {
            font-size: 30px;
            text-align: center;
            margin: 50px;
        }

        #download {
            font-size: 30px;
            width: 200px;
            padding: 20px;
            background-color: green;
            color: white;
            border-radius: 20px;
            margin: 40px;
            background-color: rgb(8, 196, 8);
            border-radius: 10px;
            transition: 0.1s;
            box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.6);
            text-decoration: none;
        }

        #download:hover {
            cursor: pointer;
            background-color: rgb(127, 234, 127);
            box-shadow: 7px 7px 7px rgba(0, 0, 0, 0.6);
        }

        #download:active {
            box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.6);
            background-color: rgb(175, 245, 175);
        }

        #certificate {
            width: 1200px;
            height: 700px;
            /* background-color: antiquewhite; */
            background: rgb(255, 233, 141);
            background: linear-gradient(0deg, rgba(255, 233, 141, 1) 0%, rgba(255, 184, 97, 1) 100%);
            display: flex;
            align-items: flex-start;
            flex-direction: column;
            justify-content: left;
        }

        img {
            height: 75px;
        }

        #heading {
            width: 100%;
            display: flex;
            height: 75px;
            flex-direction: row;
            /* top: 20px; */
            background-color: rgb(24, 22, 92);
        }

        #cert_comp {
            /* background-color: white; */
            width: 1000px;
            text-align: center;
            font-size: 50px;
            /* margin-left: 170px; */
            color: #FFB861;
            font-family: "Poppins";
            margin-top: 0;
            /* z-index: 3; */
        }

        #writing {
            width: 100%;
            margin-top: 0;
            font-size: 25px;
            font-family: "Poppins";
            line-height: 100px;
            text-align: center;
        }

        #username {
            font-family: "Poppins";
            font-size: 90px;
        }

        #css {
            font-size: 170px;
        }

        #practicss {
            font-size: 70px;
        }
    </style>
</head>

<body>
    <h1>Congratulations! You have completed this course!</h1>
    <h2>Here is your certificate for completion:</h2>
    <div id="certificate">
        <div id="heading">
            <img src="./Attributes/Images/logo.png" alt="">
            <div id="cert_comp">
                Certificate of Completion
            </div>
        </div>
        <div id="writing">This is to certify that <br><span id="username">
                <?php
                echo $_SESSION['UserName'];
                ?>
            </span><br> has completed the course
            on <br><span id="css">css</span><br>by <span id="practicss">practiCSS</span>.
        </div>
    </div>
    <div id=download onclick="screenshot()">Download</div>
</body>

</html>