<?php
if (isset($_POST['sign']))
{
    header("location: SignUp.php");
}else if (isset($_POST['btl'])) {
    header("location: indexOR.php");
}
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else{
// Define $username and $password
$username = $_POST['username'];
$password = $_POST['password'];
// mysqli_connect() function opens a new connection to the MySQL server.
$conn = mysqli_connect("localhost", "root", "", "ucycledata");
// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT email, pass from users where email=? AND pass=? LIMIT 1";
// To protect MySQL injection for Security purpose
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$stmt->bind_result($username, $password);
$stmt->store_result();
if($stmt->fetch()) //fetching the contents of the row {
$_SESSION['login_user'] = $username; // Initializing Session
header("location: profile.php"); // Redirecting To Profile Page
}
mysqli_close($conn); // Closing Connection
} else if (isset($_POST['signthemup'])){
    $email = $_POST['mail'];
    $username = $_POST['usr'];
    $phone = $_POST['phone'];
    $password = $_POST['passwd'];
    // mysqli_connect() function opens a new connection to the MySQL server.
    $conn = mysqli_connect("localhost", "root", "", "ucycledata");

    $sql = "SELECT * FROM users where email = $email";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Email already in use... Please choose a different one.";
    } else {      
        // SQL query to fetch information of registerd users and finds user match.   
        $query = "INSERT INTO `users`(`email`, `user`, `phone`, `pass`) VALUES (?,?,?,?)";
        //$stmt = $conn->prepare($query);
        $paramType = "ssss";
        $paramArray = array($email, $username, $phone, $password);
        $stmt = $conn->prepare($query);
        //$stmt-> bind_param($paramType, $paramArray);
        $stmt->bind_param("ssss", $email, $username, $phone, $password);
        $stmt-> execute();
        //$stmt->execute();
        //$stmt->bind_result($email, $username, $password);
        //$stmt->store_result();
        header("location: indexOR.php");
        echo "You are officially signed up!";
    }
}
?>