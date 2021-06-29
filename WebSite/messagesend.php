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
    
   // echo $this_user,$_POST['eventname'],$_POST['starttime'],$_POST['endtime'],$this_user ;
    //print_r($str_arr); 
    $sql = "INSERT INTO messages (sender,recipient,message) VALUES ('$this_user','$_POST[recipient]','$_POST[mess]')";
    if ($conn->query($sql) === TRUE) {
        echo "Message sent to:", $_POST['recipient'];
        header('Refresh: 2; URL=mymessages.php');

    }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    
    ?>
