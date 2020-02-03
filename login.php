<!DOCTYPE html>
<html>
<body>
	<form action="" method="GET">
		Login usuario:
		<p>Nom de l´usuari:</p>
		<input type="text" name="login"></input>
		<p>Password:</p>
		<input type="password" name="password"></input>
		<br/>
		<input type="submit" value="Login" name="env"></input>
	</form>
<?php
session_start();
$enlace = mysqli_connect("127.0.0.1:3306", "root", "", "borsadetreball");
//Login para usuario

if(isset($_GET['env'])){
	$user = $_GET['login'];
	$pass = $_GET['password'];
if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}else{
	$resultU = mysqli_query($enlace,"SELECT * FROM users WHERE username='".$user."' and pass='".$pass."'");
	if(mysqli_num_rows($resultU)==0){
		echo("No s´ha trobat l´usuari"); 
	}else { 
		header('Location: PerfilUsuario.php');
		$_SESSION['usuario'] = $user;
		exit;
		}
	}
}

//Login para empresa
if(isset($_GET['env'])){
	$user = $_GET['login'];
	$pass = $_GET['password'];
if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}else{
	$resultE = mysqli_query($enlace,"SELECT * FROM empreses WHERE username='".$user."' and pass='".$pass."'");
	if(mysqli_num_rows($resultE)==0){
		echo("No s´ha trobat l´empresa"); 
	}else { 
		header('Location: perfilEmpresa.php');
		$_SESSION['empresa'] = $user;
		exit; 
		 }
	}
}
mysqli_close($enlace);
?>
</body>
</html>
