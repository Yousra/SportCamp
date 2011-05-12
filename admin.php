<?php
	include 'connect.php';
	session_start();
	$username = $_SESSION['username'];
	$query = "SELECT isAdmin FROM users WHERE username = '$username'";
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	if($row['isAdmin'] == '0'){
		die('Only admins can view this page... <a href="member.php">back</a>');
	}
	if(isset($_GET['username'])){
		if($_GET['username'] != $_SESSION['username']){
			$username = $_GET['username'];
			$query = "SELECT isAdmin FROM users WHERE username = '$username'";
			$result = mysql_query($query);
			$row = mysql_fetch_assoc($result);
			$newVal = ($row['isAdmin'] == '1')?'0':'1';
			$query = "UPDATE users SET isAdmin = $newVal WHERE username = '$username'";
			$result = mysql_query($query);
		}
	}
?>

<html>
<head>
<title>Admin</title>
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
<br />
<br />
<table border=1 align="center" style='text-align:center'>
<tr><th>Username</th><th>Admin Status</th></tr>
<?php
	$query = "SELECT username,isAdmin FROM users";
	$result = mysql_query($query);
	while($row = mysql_fetch_assoc($result)){
		$username = $row['username'];
		$isAdmin = ($row['isAdmin']=='1')?"yes":"no";
		if($username != $_SESSION['username'])
			echo "<tr><td>$username</td> <td><a href='admin.php?username=$username'>$isAdmin</a></td></tr>";
	}
?>
</table>
</body>
</html>