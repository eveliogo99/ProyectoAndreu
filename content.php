<!DOCTYPE html>
<html>
<body>
<form action="">
	<p>Username:</p>
	<input type="text" name="login"></input>
	<p>Password:</p>
	<input type="password" name="password"></input>
<br/>
	<input type="submit" value="Login"></input>

</form>

<p>El resultat:</p>

<?php
$user = $_GET['login'];
$pass = $_GET['password'];



$enlace = mysqli_connect("127.0.0.1:3306", "jordi", "patata", "phplogin");

if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
$result = mysqli_query($enlace,"SELECT * FROM `users` WHERE Name='$user' and Password='$pass'");
if(mysqli_num_rows($result)==0) echo("user was not found"); 

else { echo("user was found"); 
	   
	 }



mysqli_close($enlace);
?>


</body>
</html>
