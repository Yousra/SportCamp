<?php
	include 'connect.php';
	session_start();
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$query = "SELECT eventTitle FROM events WHERE eventID = $id";
		$row = mysql_fetch_assoc(mysql_query($query));
		$eventTitle = $row['eventTitle'];
	}else{
		header('Location: events.php');
	}
	if(isset($_POST['comment'])){
		$eventid = $_GET['id'];
		$comment = $_POST['comment'];
		$username = $_SESSION['username'];
		$query = "SELECT id FROM users WHERE username = '$username'";
		$row = mysql_fetch_assoc(mysql_query($query));
		$userid = $row['id'];
		$query = "INSERT INTO comments VALUES ('','$comment',$userid,$eventid,NOW())";
		mysql_query($query);
	}
?>

<html>
<head>
<title><?=$eventTitle?></title></head>
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
<br /> <br />
<div align="center" width='60%' style='text-align:left'>
	<?php
		$query = "SELECT eventText,dateCreated,userID FROM events WHERE eventID = $id";
		$row = mysql_fetch_assoc(mysql_query($query));
		$dateCreated = $row['dateCreated'];
		$eventUserID = $row['userID'];
		echo '<b>'.$eventTitle.'</b><br /><br />';
		$eventText = str_replace("\n","<br />",$row['eventText']);
		echo $eventText;
		$query = "SELECT username FROM users WHERE id=$eventUserID";
		$row = mysql_fetch_assoc(mysql_query($query));
		$eventUsername = $row['username'];
		echo '<br /><br />Event created by: '.$eventUsername;
		echo '<br />'.$dateCreated;
		echo '<h2>Comments</h2>';
	?>
		<form action="showEvent.php?id=<?=$_GET['id']?>" method="POST">
			<textarea name="comment" row='8' cols = '50'>Add your comment here...</textarea><br />
			<input type='submit' />
		</form>
	<?php
		$query = 'SELECT commentText,userid,dateCreated FROM comments WHERE eventid = '.$_GET['id'];
		$result = mysql_query($query);
		echo '<br />';
		while($row = mysql_fetch_assoc($result)){
			$commentText = str_replace("\n","<br />",$row['commentText']);
			echo $commentText;
			echo '<br />';
			$dateCreated = $row['dateCreated'];
			$query = 'SELECT username FROM users WHERE id = '.$row['userid'];
			$row = mysql_fetch_assoc(mysql_query($query));
			$commentUsername = $row['username'];
			echo 'by '.$commentUsername.' at '.$dateCreated;
			echo '<br /><br />';
		}
	?>
</div>
<p><a href="events.php">Back to events...</a> </p>
</body>
</html>