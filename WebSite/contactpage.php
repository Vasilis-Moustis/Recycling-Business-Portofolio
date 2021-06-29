<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Events</title>
  <link rel="stylesheet" href="css/eventpageStyle.css" />
  <style type="text/css"></style>
</head>

<body>
  <div class="box">
    <h1>My Contacts</h1>
    <p>portofolio:</p>
    <p>&nbsp;</p>
    <table>
      <tr>
        <th>Full Name</th>
        <th>E-mail</th>
        <th>Phone Number</th>
        <th>Work Details</th>
        <th>Personal Address</th>
      </tr>
      <?php
      include('session.php');
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "ucycledata";
      $this_user = $login_session;
      $conn = mysqli_connect($servername, $username, $password, $dbname);
      $sql = "SELECT * from contacts where headUser	 = '$this_user'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["work"] . "</td><td>" . $row["address"] . "</td></tr>";
        }
        echo "</table>";
      } else {
        echo "No contacts available";
      }
      $conn->close();
      ?>
    </table>
  </div>
  <div class="back">
    <a href="homepage.php">
      <button class="backToHome">Back</button>
    </a>
    <a href="createContact.html">
      <button class="backToHome">Add contacts</button>
    </a>
  </div>
</body>

</html>
