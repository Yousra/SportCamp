<?php
include "connect.php";
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if($username&&$password)
{
	$query = mysql_query("SELECT * FROM users WHERE username='$username' ");
	$numrows = mysql_num_rows($query);
	if ($numrows!=0)
	{
		$row = mysql_fetch_assoc($query);
		$dbusername = $row['username'];
		$dbpassword = $row['password'];
		if ($username==$dbusername && md5($password)==$dbpassword)
		{
			$_SESSION['username']=$username;
			header('Location: member.php');
		}
		else
			echo "incorrect password";
} 
else
	die ("The user doesn't exist!");
}
else 
die ("Please enter a username and a password");

?>



