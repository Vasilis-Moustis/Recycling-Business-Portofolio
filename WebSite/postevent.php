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
        <a href="eventpage.php">
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
    
    
    $string = $_POST['invited']; 
    $str_arr = explode (",", $string); 
    
   // echo $this_user,$_POST['eventname'],$_POST['starttime'],$_POST['endtime'],$this_user ;
    //print_r($str_arr); 
    $sql = "INSERT INTO events (owner,eventname,eventdate,starttime,endtime,user) VALUES ('$this_user','$_POST[eventname]','$_POST[eventdate]','$_POST[starttime]','$_POST[endtime]','$this_user')";
    if ($conn->query($sql) === TRUE) {
       echo $_POST['eventname'];
       echo "  event created successfully";
    }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
     


    
        foreach ($str_arr as $value){
        $sql ="INSERT INTO events (owner,eventname,eventdate,starttime,endtime,user) VALUES('$this_user','$_POST[eventname]','$_POST[eventdate]','$_POST[starttime]','$_POST[endtime]','$value')";
        if ($conn->query($sql) === TRUE) {
        }else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        }

    
    
    ?>
</body>
</html>
