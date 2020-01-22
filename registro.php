<!DOCTYPE html>
<html>
<body>
	Selecciona el tipus de registre:<br>
	<input type="radio" name="tipoLogin" onclick="mostraUsu()"> Usuario<br>
  <input type="radio" name="tipoLogin"onclick="mostraEmpresa()"> Empresa<br>

	<div id="usuario" style="display: none">
	<form action="" method="GET">
		<p>Nom de l´usuari:</p>
		<input type="text" name="nomU"></input>
		<p>Contraseña:</p>
		<input type="password" name="passU"></input>
		<p>Nombre:</p>
		<input type="text" name="nombresU"></input>
		<p>Apellidos:</p>
		<input type="text" name="apellidosU"></input>
		<p>DNI:</p>
		<input type="text" name="dniU"></input>
		<!-- PONER CAMPO MUNICIPIOS PROVINVIAS -->
		<p>Titols:</p>
		<input type="text" name="titolsU"></input>
		<p>Experiencia laboral:</p>
		<input type="text" name="experienciaU"></input>
		<br>
		<input type="submit" value="Login" name="env"></input>
	</form>
</div>
<div id="empresa" style="display: none">
	<form action="" method="GET">
		<p>Nom de l´usuari:</p>
		<input type="text" name="nomE"></input>
		<p>Contraseña:</p>
		<input type="password" name="passE"></input>
		<p>Nombre:</p>
		<input type="text" name="nombresE"></input>
		<p>Apellidos:</p>
		<input type="text" name="apellidosE"></input>
		<p>NFI:</p>
		<input type="text" name="nfiE"></input>
		<!-- PONER CAMPO MUNICIPIOS PROVINVIAS -->
		<p>Titols:</p>
		<input type="text" name="titolsE"></input>
		<p>Descripció empresa:</p>
		<input type="text" name="experienciaE"></input>
		<br>
		<input type="submit" value="Login" name="env2"></input>
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
$usuU = $_GET['usuU'];
$passU = $_GET['passU'];
$nomU = $_GET['nomU'];
$apellidosU = $_GET['apellidosU'];
$dniU = $_GET['dniU'];
$titolsU = $_GET['titolsU'];
$experienciaU = $_GET['experienciaU'];

$usuE = $_GET['usuE'];
$passE = $_GET['passE'];
$nomE = $_GET['nomE'];
$apellidosE = $_GET['apellidosE'];
$nfiE = $_GET['nfiE'];
$titolsE = $_GET['titolsE'];
$experienciaE = $_GET['experienciaE'];

$enlace = mysqli_connect("127.0.0.1:3306", "root", "", "borsadetreball");
//Login para usuario

if(isset($_GET['env'])){
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
		echo("user was found"); 
		   
		 }
	}
}

//Login para empresa
if(isset($_GET['env2'])){
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
		echo("user was found"); 
		   
		 }
	}
}
mysqli_close($enlace);
?>

</body>
</html>