<?php
session_start();
if(session_destroy()) // Destroying All Sessions {
header("Location: indexOr.php"); // Redirecting To Home Page
?>