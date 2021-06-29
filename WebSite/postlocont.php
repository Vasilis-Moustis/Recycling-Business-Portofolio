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
        <a href="localcontacts.php">
            <button class="backToHome">Back</button> 
        </a>
      </div>
      <br>   
    <?php
    include('session.php');
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ucycledata";
    $this_user = $login_session;
    $notfound = false;
    $querysucc = false;
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    $sql = "SELECT * FROM localcon";
    $result1 = $conn->query($sql);
    if ($result-> num_rows >0){
      while ($row = $result->fetch_assoc()){
           if( $row['email'] == $_POST['email']) {
            $sql = "INSERT INTO localcon (ownscon, name ,email,phone) VALUES ('$this_user','$row[user]','$row[email]',$row[phone])";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                $querysucc = true;
            }else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
           }else{
             $notfound = true ;
           }
          
      }
  }
  if ($notfound == true && $querysucc == false){
    echo "No User with the email " , $_POST['email'] , " found";
  }
  

    ?>
</body>
</html>
