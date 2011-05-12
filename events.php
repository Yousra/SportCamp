<?php
	include 'connect.php';
	session_start();
	// if the user is logged in then set the username variable
	if (isset($_SESSION['username'])){
		$username = $_SESSION['username'];
	}		
	// shows the events
	function showEvents(){
		$query = "SELECT eventID,eventTitle,dateCreated FROM events";
		$result = mysql_query($query);
		while($row = mysql_fetch_assoc($result)){
			$eventID = $row['eventID'];
			$eventTitle = $row['eventTitle'];
			$dateCreated = $row['dateCreated'];
			echo '<p><a href="showEvent.php?id='.$eventID.'">'.$eventTitle.'</a> '.$dateCreated.'</p>';
		}
	}
?>
<head>
<title> Events </title>
<p align="center">
<table width='100%'>
<tr>
<td>
<p align="center">
<font size="4" color="#FFFFFFF" face="Times New Roman"><a href="home.php"> Home</a>
<font size="4" color="#FFFFFFF" face="Times New Roman"><a href="movie.php"> Salaam Dunk - The Movie</a>
<font size="4" color="#FFFFFFF" face="Times New Roman"><a href="events.php">Events</a>
<font size="4" color="#FFFFFFF" face="Times New Roman"><a href="donate.php">Make a donation</a>
<font size="4" color="#FFFFFFF" face="Times New Roman"><a href="volunteer.php">Volunteer</a>
<font size="4" color="#FFFFFFF" face="Times New Roman"><a href="apply.php">Apply</a>
<?php
	if(isset($username))
		echo '<font size="4" color="#FFFFFFF" face="Times New Roman"><a href="logout.php"> Logout</a>';
?>
</td>
</tr>
</table>
<br>
<hr width="50%">
</head>

<body bgcolor="#FFFFFF">
<?php
	$query = "SELECT isAdmin FROM users WHERE username = '$username'";
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	if($row['isAdmin'] == '1'){
		echo "<p>Welcome admin!</p>";
		showEvents();
		echo '<a href="addEvent.php">Add a new event</a>';
	}else{
		echo "<p>Welcome $username</p>";
		showEvents();
	}
?>
</body>