<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/createEventStyle.css">
    <link rel="stylesheet" href="css/eventpageStyle.css"/>
    <style type="text/css"></style>
    <title>Contacts</title>
    
</head>
<body>
    <form class="formEvent" action="postlocont.php" method="post">
        
         <div class="form_title">Add an application Contact</div><br>

         <label for="email">Email:</label><br>
         <input type="text" id="email" class="event_input" name="email" required><br><br>

        <input type="submit" value="Submit" style="border-radius: 5px; padding: 10px 12px; cursor: pointer; color: aquamarine; background-color: magenta; box-sizing: border-box;">
    </form>
    <div class="box">
    <h1>My in-App Contacts</h1>
    <p>&nbsp;</p>
    <table>
      <tr>
      <th>Name</th>
      <th>Email Adress</th>
      <th>Phone</th>
      </tr>
      <?php
        include('session.php');
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ucycledata";  
        $this_user = $login_session;
        $conn = mysqli_connect($servername, $username, $password,$dbname);
        $sql = "SELECT email , name, phone from localcon where ownscon = '$this_user' GROUP BY email";
        $result = $conn->query($sql);
        if ($result-> num_rows >0){
            while ($row = $result->fetch_assoc()){
                 echo "<tr><td>" . $row["email"] . "</td><td>". $row["name"] . "</td><td>" . $row["phone"] . "</td></tr>";
            }
            echo "</table>";
        }else{
            echo "0 application Contacts";
        }
        $conn->close();
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
