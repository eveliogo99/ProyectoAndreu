<!DOCTYPE html>
<html>
<body>
	Quien eres?<br>
	<input type="radio" name="tipoLogin" onclick="mostraUsu()"> Usuario<br>
  <input type="radio" name="tipoLogin"onclick="mostraEmpresa()"> Empresa<br>

	<div id="usuario" style="display: none">
	<form action="" method="GET">
		Login usuario:
		<p>Nom de l´usuari:</p>
		<input type="text" name="loginU"></input>
		<p>Password:</p>
		<input type="password" name="passwordU"></input>
		<br/>
		<input type="submit" value="Login" name="env"></input>
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
	<input type="submit" value="Login" name="env"></input>

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
//$userE = $_GET['loginE'];
//$passE = $_GET['passwordE'];
$enlace = mysqli_connect("127.0.0.1:3306", "root", "", "borsadetreball");
if(isset($_GET['env'])){
if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}else{
	$resultU = mysqli_query($enlace,"SELECT * FROM users WHERE username='".$userU."' and pass='".$passU."'");
	if(mysqli_num_rows($resultU)==0){
		echo("No s´ha trobat l´usuari"); 
	}else { 
		echo("user was found"); 
		   
		 }
	}
}
//Login para usuario

//Login para empresa
/*$resultE = mysqli_query($enlace,"SELECT * FROM 'empresa' WHERE username='$userE' and pass='$passE'");
if(mysqli_num_rows($resultE)==0) echo("No s´ha trobat el nom de la empresa"); 
else { echo("user was found"); 
	   
	 }*/
mysqli_close($enlace);
?>


</body>
</html>
