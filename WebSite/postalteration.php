<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/postEventStyle.css">
    <title>Altered Event</title>
</head>
<body>
<h3> </h3>
      <div>
        <a href="homepage.php">
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
    echo $_POST['eventdate'];

    // echo $this_user,$_POST['eventname'],$_POST['starttime'],$_POST['endtime'],$this_user ;
    //print_r($str_arr); 
    $sql = "SELECT * FROM events where owner = '$this_user' and eventname = '$_POST[preventname]'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      $sql = " DELETE from events where owner = '$this_user' and eventname = '$_POST[preventname]'";
      $conn->query($sql);
      $sql = "INSERT INTO events (owner,eventname,eventdate,starttime,endtime,user) VALUES ('$this_user','$_POST[eventname]','$_POST[eventdate]','$_POST[starttime]','$_POST[endtime]','$this_user')";
    if ($conn->query($sql) === TRUE) {
        echo "Record has been edited successfully";
    }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
     


    
        foreach ($str_arr as $value){
        $sql ="INSERT INTO events (owner,eventname,eventdate,starttime,endtime,user) VALUES('$this_user','$_POST[eventname]','$_POST[eventdate]','$_POST[starttime]','$_POST[endtime]','$value')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        }else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        }

    
    
      
    } else {
      echo "No events found with the given name, or you are not the owner";
    }    
    
    ?>
</body>
</html>