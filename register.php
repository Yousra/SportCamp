<?php
include 'connect.php';

echo "<h1>Register</h1>";
$submit = $_POST['submit'];

$fullname = $_POST['fullname'];
$username = $_POST['username'];
$email= $_POST['email'];
$password= $_POST['password'];
$reenterpassword = $_POST['password_confirmation'];
$date = date("Y-m-d");


if ($submit)
{

if($fullname&&$username&&$email&&$password&&$reenterpassword)
{

	$password = md5($password);
	$reenterpassword = md5($reenterpassword);
	
	if($password==$reenterpassword)
	{	
		$query = "SELECT * FROM users WHERE username = '$username'";
		if(mysql_num_rows(mysql_query($query))){
			echo ("Username already exists!");
		}
		else{
			$query = "INSERT INTO users VALUES ('','$fullname','$username',0,'$email','$password','$date')";
			$result = mysql_query($query);
			if($result){	
				die("You have been registered! <a href='logintable.php'>Return to login page</a>");
			}else{
				echo ("<p>Error... could not register user!</p>");
			}
		}
	}
	else echo "Passwords don't match!";	
}
else
	echo "Please fill in all fields!";

}

?>

<html>
<p>
	<form action='register.php' method='POST'>
		<table> 
			<tr>
				<td>
				  Full name:
				</td>
				<td>
				<input type= 'text' name='fullname'>
				<td/>
			</tr>
<tr>
				<td>
				  Username:
				</td>
				<td>
				<input type= 'text' name='username'>
				<td/>
			</tr>
<tr>
				<td>
				  Email:
				</td>
				<td>
				<input type= 'text' name='email'>
				<td/>
			</tr>

<tr>
				<td>
				  Password:
				</td>
				<td>
				<input type= 'password' name='password'>
				<td/>
			</tr>
<tr>
				<td>
				  Re-enter password:
				</td>
				<td>
				<input type= 'password' name='password_confirmation'>
				<td/>
			</tr>

	</table>
	<p> 
	<input type = 'submit' name='submit'  value = 'Register'>


</form>




</html>


