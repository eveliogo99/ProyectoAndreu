<?php
	require('config.php');
	session_start();
	
	echo $_SESSION['usuario'];
	$user=$_SESSION['usuario'];	
	$username= $_GET['user'];
	$dni=$_GET['dni'];
	$nom=$_GET['nom'];
	$cognoms=$_GET['cognoms'];
	$estudis=$_GET['estudis'];
	$experiencia=$_GET['experiencia'];
	$municipi=$_GET['municipi'];
	$passw=$_GET['pass'];
	$sql = "UPDATE users SET username='$username', DNI = '$dni', nom = '$nom', cognoms = '$cognoms', `Estudis/Títols` = '$estudis', `Experiencia Laboral`='$experiencia', municipi='$municipi', pass = '$passw'  WHERE username = '$user'";
	 if ($connexion->query($sql) === TRUE) {
	  echo "OK";      
	 }else {
	  echo "ERROR";
	 }
	 mysqli_close($connexion);
	 $_SESSION['usuario']=$username;
	 echo  $_SESSION['usuario'];
	 //header('Location: ../PerfilUsuario.php');
?>