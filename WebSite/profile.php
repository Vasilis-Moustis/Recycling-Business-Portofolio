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
    <style>
        
        *{
            margin: 0;
            padding: 0;
            align-items:center;
        }

        body .box, html{
            color: darkblue;
            font-family: 'lato', sans-serif;
            display:flex;
            justify-content: center;
            align-items:center;
            min-height: 100vh;
        }

        body{
            background-image:url(about.jpg);
            background-repeat: no-repeat;
            background-position: bottom;
        }

        .button{
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 13px;  
            background-color: powderblue;
        }

        .box{
            position:relative;
            max-width:400px;
            max-height:200px;
            padding:30px;
            text-align: center;
            background:rgba(255,255,255,.2);
            box-shadow: 0 5px 15px rgba(0,0,0,.5);
        }

        .infoData{
            position:relative;
            max-width:400px;
            max-height:300px;
            padding:50px;
            background:rgba(255,255,255,.2);
        }

        .btn {
            text-align: center;
            display: block;
            margin-top: 350px;
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
        <button class="button" id="logout"><a href="logout.php">Log Out</a></button>
    </div>
    <div class="box">
        <header>
            <h1><strong>My profile</strong></h1>
                <div class="btn">
                    <a href="homepage.php">
                        <button class="back_btn btn1">Back</button>
                    </a>
                </div>
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
                            "</div><br>
                    <div>
                        <h4>Phone</h4>
                        <br>" . $row["phone"] . "<br>
                    </div>
                    <br>
                    <div>
                        <h4>Email</h4>
                        <br>" . $row["email"] . "<br></div>";
                    }

                    ?>

                </div>
</body>

</html>
