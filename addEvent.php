<?php
	session_start();
	include 'connect.php';
	if(!isset($_SESSION['username'])){
		header('Location: home.php'); // ?
	}else{
		$username = $_SESSION['username'];
		$query = "SELECT id FROM users WHERE username = '".$username."'";
		$result = mysql_query($query);
		$row = mysql_fetch_assoc($result);
		$userid = $row['id'];
	}
	if(isset($_POST['eventTitle'])){ // ?
		$query = "INSERT INTO events VALUES ('',\"".$_POST['eventTitle'].
					"\",\"".$_POST['eventText']."\",NOW(),".$userid.",'')";
		if($result = mysql_query($query)){
			die('Successfully added event... <a href="events.php">back to events</a>');
		}else{
			echo 'Error';
		}
	}
?>
<html>
<head>
<title> Events </title>
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
<br>
<hr width="50%">
</head>
<body>
	<form method="POST" action="addEvent.php">
	<table >
	<tr><td>Event title:</td><td><input name="eventTitle" type="text" /></td></tr>
	<tr><td valign="top">Event description:</td><td><textarea name="eventText" rows="8" cols = "50"> </textarea></td></tr>
	<tr><td> </td><td><input type="submit" /></td></tr>
	</table>
	</form>
</body>
</html>