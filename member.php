<?php
include 'connect.php';
session_start();

if ($_SESSION['username']){
	$username = $_SESSION['username'];
	$query = "SELECT isAdmin FROM users WHERE username = '$username'";
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	echo "<p>Welcome, ".$_SESSION['username']."!</p>";
	if($row['isAdmin'] == '1'){
		echo "<p><a href='admin.php'>Manage users</a></p>";
	}
}
else
	die("You must be logged in!");

?>
<head>
<title>Summer Camp</title>
</head>
<body>
<table width='100%'>
<tr>
<td>
<p align="center">
<font size="4" color="#FFFFFFF" face="Times New Roman"><a href="home.php"> Home</a>
<font size="4" color="#FFFFFFF" face="Times New Roman"><a href="movie.php"> Salaam Dunk - The Movie</a>
<font size="4" color="#FFFFFFF" face="Times New Roman"><a href="events.php">Events</a>
<font size="4" color="#FFFFFFF" face="Times New Roman"><a href="donate.php">Make a donation</a>
<font size="4" color="#FFFFFFF" face="Times New Roman"><a href="volunteer.php">Volunteer</a>
<font size="4" color="#FFFFFFF" face="Times New Roman"><a href="apply.php"> Apply</a>
<?php
	if(isset($_SESSION['username']))
		echo '<font size="4" color="#FFFFFFF" face="Times New Roman"><a href="logout.php"> Logout</a>';
?> 
</td>
</tr>
</table>
</body>
</p>

<body bgcolor="#C0C0C0">
<br>
<hr width="50%">

<b><font size="6" color="#FFFFFF" face="Times New Roman" ><p align="center">Salaam - Peace - Hewa - Sulh</p></font></b>
<p align="center"><img src="new.jpg" width="400" height="300" alt="Halabcha">


</body>
</html>

