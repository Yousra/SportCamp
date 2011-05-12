<?php
	session_start();
?>	
<html>
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
<?php
	if(isset($_GET['lout'])){
		echo '<p>You have successfully logged out!</p>';
	}
	if(!isset($_SESSION['username'])){
	?>
		<table align="right" width='40%'>
		<tr>
		<td>
		<form action='login.php' method='POST'>
		<font size="4" color="#0000FF" face="Times New Roman">Username:<input type='text'; font-family: Times New Roman; font-weight: bold" name='username'><br>
		<font size="4" color="#0000FF" face="Times New Roman">Password: <input type='password' STYLE="color: #000000; font-family: Times New Roman; font-weight:bold" name='password'><br>
		<input type='submit' value='Log in' >
		</form>
		<form action='register.php' method='POST'>
		<input type='submit' value='Register' >
		</form> <p>
		</td>
		</tr>
		
		</table>
	<?php
	}
	?>
<br>
<br>
<br>
<br>
<br>
<br>
<body bgcolor="#C0C0C0">
<br>
<hr width="50%">

<b><font size="6" color="#FFFFFF" face="Times New Roman" ><p align="center">Salaam - Peace - Hewa - Sulh</p></font></b>
<p align="center"><img src="new.jpg" width="400" height="300" alt="Halabcha">


</body>
</html>



