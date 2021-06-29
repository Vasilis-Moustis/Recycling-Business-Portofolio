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
    <h1>My Events</h1>
    <p>Upcoming:</p>
    <p>&nbsp;</p>
    <table>
      <tr>
        <th>Owner</th>
        <th>Event Name</th>
        <th>Event Date</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Invited</th>
      </tr>
      <?php
      include('session.php');
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "ucycledata";
      $this_user = $login_session;
      $conn = mysqli_connect($servername, $username, $password, $dbname);
      $sql = "SELECT owner, eventname, eventdate, starttime, endtime, user from events where user = '$this_user'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr><td>" . $row["owner"] . "</td><td>" . $row["eventname"] . "</td><td>" . $row["eventdate"] . "</td><td>" . $row["starttime"] . "</td><td>" . $row["endtime"] . "</td><td>" . $row["user"] . "</td></tr>";
        }
        echo "</table>";
      } else {
        echo "0 Events";
      }
      $conn->close();
      ?>
    </table>
  </div>
  <div class="back">
    <a href="homepage.php">
      <button class="backToHome">Back</button>
    </a>
    <a href="createevent.html">
      <button class="backToHome">Create an Event</button>
    </a>
    <a href="alterevent.html">
      <button class="backToHome">Edit an Event</button>
    </a>
    <a href="deleteEvent.html">
      <button class="backToHome">Delete a Event</button>
    </a>
  </div>
</body>

</html>