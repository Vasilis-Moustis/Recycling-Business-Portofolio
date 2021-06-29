<?php
include('session.php');
if (!isset($_SESSION['login_user'])) {
    header("location: indexOr.php"); // Redirecting To Home Page
}
?>
<html>

<head>
    <meta charset="utf-8">
    <title>Welcome Page</title>
    <link rel="stylesheet" href="css/design.css" />
</head>

<body onload="RenderDate()">
    <div id="container">
        <div id="header">
            <div class="logo" style="padding: 0; padding-right: 600px;">
                <img src="image/Symbol.png" style="border-radius: 50%; width: 100px; height: 100px; margin-top: 5%; object-fit: cover; object-position: 0 -1px;">
            </div> 
            <h1 style="position:fixed; top:30px; margin-left:300px"> My Agenda </h1>
        </div>
        <div id="content">
            <div id="left-side">
                <h3>Menu</h3>
                <ul>
                    <br>
                    <li><a class="selected" href="profile.php">My Profile</a></li>
                    <br>
                    <li><a class="selected" href="contactPage.php">My Contacts</a></li>
                    <br>
                    <li><a class="selected" href="localcontacts.php">My in-App Contacts</a></li>
                    <br>
                    <hr><br>
                    <li><a class="selected" href="eventpage.php">My Events</a></li>
                    <br>
                    <hr><br>
                    <li><a class="selected" href="mymessages.php">My Messages</a></li>
                    <br>
                    <li><a class="selected" href="message.html">Send Message</a></li>
                    <br>
                </ul>
                <br>
                <br>
                <p id="selected_day"></p>
            </div>
            <div id="main">
                <h3>Calendar</h3>
                <div class="month">
                    <div class="prev" onclick="moveDate('prev')">
                        <span>&#10094</span>
                    </div>
                    <div>
                        <h2 id="month"></h2>
                        <p id="year_str"></p>
                    </div>
                    <div class="next" onclick="moveDate('next')">
                        <span>&#10095</span>
                    </div>
                </div>
                <div class="weekends">
                    <div>Sun</div>
                    <div>Mon</div>
                    <div>Tue</div>
                    <div>Wed</div>
                    <div>Thu</div>
                    <div>Fri</div>
                    <div>Sat</div>
                </div>
                <div class="days" onclick="meetingDay()">
                </div>
            </div>
        </div>
        <div id="footer">
            <br>
            <hr>
            Copyright &copy; 2021 Team Unipi
        </div>
    </div>
    <script src="js/calendar.js"></script>
</body>

</html>