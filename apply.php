<?php
// the user fillout the form and then it displays it to him. on the admin page it displays a list 
//the poeple who filled out the from and when clicked displays the information.
include 'connect.php.';
$fullname= $_POST['fullname'];
$volunpar = $_POST['volunpar'];
$bio = $_POST['bio'];
$email = $_POST['email'];


$query = mysql_query("INSERT INTO apply VALUES ('','$fullname','volunpar','$bio','$email',)");

?>




<html>
<head>
<title> Apply </title>
<p align="center">
<font size="4" color="#FFFFFFF" face="Times New Roman"><a href="home.html"> Home</a>
<font size="4" color="#FFFFFFF" face="Times New Roman"><a href="register.html">Become a member!</a>
<br>
<p align="center">
<font size="4" color="#FFFFFFF" face="Times New Roman"><a href="movie.html"> Salaam Dunk - The Movie</a>
<font size="4" color="#FFFFFFF" face="Times New Roman"><a href="events.html">Events</a>
<font size="4" color="#FFFFFFF" face="Times New Roman"><a href="donate.html">Make a donation</a>
<font size="4" color="#FFFFFFF" face="Times New Roman"><a href="volunteer.html">Volunteer</a>
<font size="4" color="#FFFFFFF" face="Times New Roman"><a href="apply.html"> Apply</a>

</p>
<body bgcolor="#000000">
<br>
<hr width="50%">
</head>
</html>