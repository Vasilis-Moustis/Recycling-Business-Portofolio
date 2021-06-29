<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Messages</title>
    <link rel="stylesheet" href="css/eventpageStyle.css"/>
    <style type="text/css"></style>
</head>
<body>
    <div class="box">
       <h1>My Messages</h1>
       <table>
         <tr>
           <th>Sender</th>
           <th>Message</th>
         </tr>
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
            $sql = "SELECT sender , message from messages where recipient = '$this_user'" ;
            $result = $conn->query($sql);
            if ($result-> num_rows >0){
               while ($row = $result->fetch_assoc()){
                   echo "<tr><td>" . $row["sender"] . "</td><td>" . $row["message"] . "</td></tr>";
                }
            }else{
                echo "0 Messages";
            }
        ?>
        </table>
    </div>
    <div class="back">
        <a href="homepage.php">
            <button class="backToHome">Back</button> 
        </a>        
    </div>
</body>
</html>
