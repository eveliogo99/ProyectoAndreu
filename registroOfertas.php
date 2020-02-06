<!DOCTYPE html>
<html>
<?php
session_start();
echo ($_SESSION['empresa']);
$empresa=$_SESSION['empresa'];

?>



<body>
	<form action="" method="POST">
		Registra una oferta :
		<p>Titol de l´oferta:</p>
		<input type="text" name="titol"required></input>
		<p>Descripció:</p>
		<input type="text" name="descripcio"required></input>
		<p>Requisits:</p>
		<input type="text" name="requisits"required></input>
		<p>Sou:</p>
		<input type="text" name="sou"required></input>
		<p>Brut:</p>
		<input type="text" name="brut"required></input>
		<br/>
		
		<input type="submit" value="Login" name="env"></input>
	</form>



	<input type="button" class="button_active" onclick="location.href='script/logout.php';" value="logout" />
<?php
if(isset($_POST['env']) && !empty($_POST['env'])) {
$titol = $_POST['titol'];
$descripcio = $_POST['descripcio'];
$requisits = $_POST['requisits'];
$sou = $_POST['sou'];
$brut = $_POST['brut'];
$env = $_POST['env'];
$errors = "";

$enlace = mysqli_connect("127.0.0.1:3306", "root", "", "borsadetreball");
	if (!$enlace) {
	    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
	    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
	    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}else{
		$resultU = mysqli_query($enlace,"INSERT INTO ofertes_laborals (id, id_empresa, titol , descripcio , requisits , sou , brut ,data_publi) VALUES (NULL,(SELECT id from empreses where username = '$empresa'),'$titol' ,'$descripcio','$requisits', $sou,$brut,current_timestamp())");
		if(mysqli_affected_rows($resultU)<0){
			echo("Error al introduir les dades"); 
		}else { 
			echo("Oferta afegida"); 
			 }
		}


}
?>