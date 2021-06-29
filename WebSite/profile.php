<?php
include('session.php');
if (!isset($_SESSION['login_user'])) {
    header("location: indexOr.php"); // Redirecting To Home Page
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Your Home Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link href="style.css" rel="stylesheet" type="text/css">-->
    <style>
        html {
            height: 100%;
            overflow: hidden;
            box-sizing: border-box;
        }

        body {
            background: plum;
            color: cadetblue;
            margin: 0;
            padding: 0;
            perspective: 1px;
            transform-style: preserve-3d;
            height: 100%;
            width: 100%;
            overflow-y: scroll;
            overflow-x: hidden;
            font-family: "Luna";
            font-size: 18px;
        }

        .box {
            width: 80%;
            box-sizing: border-box;
        }

        header {
            box-sizing: border-box;
            min-height: 100vh;
            position: relative;
            transform-style: inherit;
            width: 100vw;
            padding: 30vw 0;
        }

        header h1 {
            margin-top: -100px;
            height: 0px;
            bottom: 30px;
        }

        header,
        header:before {
            background: 50% 50% / cover;
        }

        header::before {
            content: "";
            position: absolute;
            top: none;
            margin: 0px;
            left: 0;
            right: 0;
            bottom: 0;
            display: block;
            background: url(image/flower.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            transform-origin: center center 0;
            transform: translateZ(-1px) scale(2);
            z-index: -1;
            min-height: 100vh;
        }

        header * {
            font-weight: normal;
            letter-spacing: 0.2em;
            text-align: center;
            margin: 0;
            padding: 1em 0;
        }

        .data {
            font-weight: bold;
            width: 100%;
            font-style: inherit;
            font-family: 'Times New Roman';
            background-color: purple;
        }

        p {
            color: black;
        }


        .btn {
            text-align: center;
            display: block;
            margin-top: 250px;
            float: left;
            position: fixed;
        }

        .back_btn {
            border: 1px solid purple;
            background: none;
            padding: 10px 20px;
            font-size: 20px;
            font-family: monospace;
            cursor: pointer;
            margin: 10px;
            transition: 0.8s;
            position: relative;
            overflow: hidden;
        }

        .btn1 {
            color: purple;
        }

        .btn1:hover {
            color: plum;
        }

        .back_btn::before {
            content: "";
            position: absolute;
            left: 0;
            width: 100%;
            height: 0%;
            background: purple;
            z-index: -1;
            transition: 0.8s;
        }

        .btn1::before {
            top: 0;
            border-radius: 0 0 50% 50%;
        }

        .btn1:hover::before {
            height: 180%;
        }
    </style>
</head>

<body>

    <div id="profile">
        <b id="welcome">Welcome : <i><?php echo $login_session; echo "" ?></i></b>
        <button style="background-color:powderblue;"  id="logout"><a href="logout.php">Log Out</a></button>
    </div>

    <div class="box">
        <header>
            <h1><strong>My profile</strong></h1>
            <header>
                <div class="btn">
                    <a href="homepage.php">
                        <button class="back_btn btn1">Back</button>
                    </a>
                </div>
                <br>
                <br>
                <br>
                <h3><strong>Information</strong></h3>
                <div class="infoData">
                    <?php
                    //include('session.php');

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "ucycledata";
                    $this_user = $login_session;
                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // echo $this_user,$_POST['eventname'],$_POST['starttime'],$_POST['endtime'],$this_user ;
                    //print_r($str_arr); 
                    $sql = "SELECT * from users where user = '$this_user'";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo "<div>
                        <h4>Full Name</h4>
                        <br> " . $row["user"] .
                            "</div>
                    <div>
                        <h4>Phone</h4>
                        <br>" . $row["phone"] . "<br>
                    </div>
                    <div>
                        <h4>Email</h4>
                        <br>" . $row["email"] . "<br></div>";
                    }

                    ?>

                </div>
</body>

</html>
