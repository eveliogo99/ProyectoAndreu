<!DOCTYPE html>
<html>
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
<?php
if(isset($_POST['env']) && !empty($_POST['env'])) {
$titol = $_POST['titol'];
$descripcio = $_POST['descripcio'];
$requisits = $_POST['requisits'];
$sou = $_POST['sou'];
$brut = $_POST['brut'];
$env = $_POST['env'];
$errors = "";

function validaTitol($titol){
    if(trim($titol) == ''){
       return false;
    }else{
       return true;
    }
 }
 function validaDescripcio($descripcio){
    if(trim($descripcio)== ''){
       return false;
    }else{
       return true;
    }
 }
 function validaRequisits($requisits){
    if(trim($requisits) == ''){
       return false;
    }else{
       return true;
    }
 }
 function validaSou($sou){
    if(trim($sou)== ''){
       return false;
    }else{
       return true;
    }
 }
 function validaBrut($brut){
    if(trim($brut)== ''){
       return false;
    }else{
       return true;
    }
 }
//Por cada campo vacio se suma 1 a errors
 if (!validaTitol($titol)){
 	$errors + 1;
 }
  if (!validaRequisits($requisits)){
 	$errors + 1;
 }
  if (!validaDescripcio($descripcio)){
 	$errors + 1;
 }if (!validaSou($sou)){
 	$errors + 1;
 }
  if (!validaBrut($brut)){
 	$errors + 1;
 }
 $enlace = mysqli_connect("127.0.0.1:3306", "root", "", "borsadetreball");
//Si errors=0 quiere decir que ningun campo esta vacio y se realizara el insert
	if (!$enlace) {
	    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
	    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
	    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}else{
		$resultU = mysqli_query($enlace,"INSERT INTO ofertes_laborals (id,titol , descripcio , requisits , sou , brut ,data_publi) VALUES (NULL,'$titol' ,'$descripcio','$requisits', $sou,$brut,current_timestamp())");
		if(mysqli_affected_rows($resultU)<0){
			echo("Error al introduir les dades"); 
		}else { 
			echo("Oferta afegida"); 
			 }
		}
}
?>