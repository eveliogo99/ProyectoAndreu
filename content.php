<!DOCTYPE html>
<html>
<body>
	Quien eres?<br>
	<input type="radio" name="tipoLogin" onclick="mostraUsu()"> Usuario<br>
  <input type="radio" name="tipoLogin"onclick="mostraEmpresa()"> Empresa<br>

	<div id="usuario" style="display: none">
	<form action="">
		Login usuario:
	<p>Nom de l´usuari:</p>
	<input type="text" name="loginU"></input>
	<p>Password:</p>
	<input type="password" name="passwordU"></input>
<br/>
	<input type="submit" value="Login"></input>
</form>
</div>
<div id="empresa" style="display: none">
<form action="">
	Login empresa:
	<p>Nom de l´empresa:</p>
	<input type="text" name="loginE"></input>
	<p>Password:</p>
	<input type="password" name="passwordE"></input>
<br/>
	<input type="submit" value="Login"></input>

</form>
</div>
<p>El resultat:</p>
<script>
	usuario=document.getElementById("usuario");
	empresa=document.getElementById("empresa");
	function mostraUsu() {	
		usuario.style.display='block';
		empresa.style.display='none';
	}
	function mostraEmpresa() {
		usuario.style.display='none';
		empresa.style.display='block';
	}
</script>
<?php
$userU = $_GET['loginU'];
$passU = $_GET['passwordU'];
$userE = $_GET['loginE'];
$passE = $_GET['passwordE'];
$enlace = mysqli_connect("127.0.0.1:3306", "jordi", "patata", "phplogin");
if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
//Login para usuario
$resultU = mysqli_query($enlace,"SELECT * FROM 'usuarios' WHERE Name='$userU' and Password='$passU'");
if(mysqli_num_rows($resultU)==0) echo("No s´ha trobat l´usuari"); 
else { echo("user was found"); 
	   
	 }
//Login para empresa
$resultE = mysqli_query($enlace,"SELECT * FROM 'empresa' WHERE Name='$userE' and Password='$passE'");
if(mysqli_num_rows($resultE)==0) echo("No s´ha trobat el nom de la empresa"); 
else { echo("user was found"); 
	   
	 }
mysqli_close($enlace);
?>


</body>
</html>