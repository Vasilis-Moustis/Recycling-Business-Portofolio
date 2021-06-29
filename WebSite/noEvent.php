<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/postEventStyle.css">
    <title>Deleted Event</title>
</head>
<body>
<h3> </h3>
<div>
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
    $sql = " SELECT owner,eventname from events where eventname = '$_POST[deletename]'";
    if($row['owner']= '$this_user'){
    $sql = " DELETE from events where eventname = '$_POST[deletename]'";
    if ($conn->query($sql) === TRUE) {
      echo "Processing request .....";
      header('Refresh: 1; URL=eventpage.php');
    } else {
      echo "No events found with the given name, or you are not the owner";
    }

    
  }
    ?>
</body>
</html>
