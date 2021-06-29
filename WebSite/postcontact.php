<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/postEventStyle.css">
    <title>Post event</title>
</head>
<body>
<h3> </h3>
      <div>
        <a href="contactPage.php">
            <button class="backToHome">Back</button> 
        </a>
      </div>
      <br>   
    <?php

    include('session.php');
    //if (!isset($_SESSION['login_user'])) {
    //    header("location: indexOr.php"); // Redirecting To Home Page
    //}

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

    $sql = "INSERT INTO contacts (`name`, `email`, `phone`, `work`, `address`, `headUser`) VALUES ('$_POST[fullname]','$_POST[email]','$_POST[phone]','$_POST[work]','$_POST[address]','$this_user')";
    if ($conn->query($sql) === TRUE) {
        echo "New contact has been successfully added!";
    }
    ?>
</body>
</html>
