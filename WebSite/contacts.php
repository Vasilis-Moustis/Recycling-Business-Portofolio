<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/contactStyleFile.css" />
    <title>My contacts</title>
</head>

<body>
    <div class="table-box">
        <h1>Contacts</h1>
        <table>
            <tr>
                <th>Info</th>
                <th>Email</th>
                <th>Name</th>
                <th>Phone</th>
            </tr>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "ucycledata";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td></td><td>" . $row["email"] . "</td><td>" . $row["user"] . "</td><td>" . $row["pass"] . "</td></tr>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>

        </table>
    </div>
    <div class="btn">
        <a href="homepage.php">
            <button class="back_btn btn1">Back</button>
        </a>
    </div>

</body>

</html>