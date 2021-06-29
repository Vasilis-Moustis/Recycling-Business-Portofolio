<?php
include('login.php'); // Includes Login Script
if (isset($_SESSION['login_user'])) {
    header("location: profile.php"); // Redirecting To Profile Page
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Sign Up Form in PHP with Session</title>
    <link href="css/style1.css" rel="stylesheet" type="text/css">
    <style>
        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -ms-box-sizing: border-box;
            -o-box-sizing: border-box;
            box-sizing: border-box;
        }

        html {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        body {
            width: 100%;
            height: 100%;
            font-family: 'Open Sans', sans-serif;
            background: #092756;
            background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -moz-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -moz-linear-gradient(-45deg, #670d10 0%, #092756 100%);
            background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -webkit-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -webkit-linear-gradient(-45deg, #670d10 0%, #092756 100%);
            background: -o-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -o-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -o-linear-gradient(-45deg, #670d10 0%, #092756 100%);
            background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -ms-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -ms-linear-gradient(-45deg, #670d10 0%, #092756 100%);
            background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), linear-gradient(to bottom, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), linear-gradient(135deg, #670d10 0%, #092756 100%);
            filter: progid: DXImageTransform.Microsoft.gradient(startColorstr='#3E1D6D', endColorstr='#092756', GradientType=1);
        }

        input {
            width: 100%;
            margin-bottom: 10px;
            background: rgba(0, 0, 0, 0.3);
            padding: 10px;
            font-size: 13px;
            color: #fff;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(0, 0, 0, 0.3);
            border-radius: 4px;
            box-shadow: inset 0 -5px 45px rgba(100, 100, 100, 0.2), 0 1px 1px rgba(255, 255, 255, 0.2);
            transition: box-shadow .5s ease;
        }
    </style>
</head>

<body>
    <div id="login">
        <h2>Sign Up Form</h2>
        <form action="" method="post">
            <label>Email :</label><br>
            <input id="mail" name="mail" placeholder="Email" type="email"><br>
            <label>Full Name :</label><br>
            <input id="usr" name="usr" placeholder="Full Name" type="text"><br>
            <label>Phone Number :</label><br>
            <input id="phone" name="phone" placeholder="Your phone number..." type="number"><br>
            <label>Password :</label>
            <input id="passwd" name="passwd" placeholder="**********" type="password"><br><br>
            <input name="signthemup" type="submit" value=" Sign Up " class="btn btn-primary btn-block btn-large"><br>
            <input name="btl" type="submit" value=" Back to Login " class="btn btn-primary btn-block btn-large">
            <span><?php echo $error; ?></span>
        </form>
    </div>
</body>

</html>