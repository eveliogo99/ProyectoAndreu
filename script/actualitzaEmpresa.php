<?php
	require('config.php');
	session_start();
	
	echo $_SESSION['empresa'];
	$user=$_SESSION['empresa'];	
	$username= $_POST['username'];
	$nif=$_POST['nif'];
	$nom_empresa=$_POST['nom_empresa'];
	$descripcio=$_POST['descripcio'];
	$pass=$_POST['pass'];
	$municipi=$_POST['taskOption'];
	$passw=$_POST['pass'];
	$sql = "UPDATE empreses SET username='$username', NIF = '$nif', nom_empresa = '$nom_empresa', descripcio = '$descripcio', `pass` = '$pass', `Municipi`='$municipi'  WHERE username = '$username'";
	 if ($connexion->query($sql) === TRUE) {
	  echo "OK";      
	 }else {
	  echo "ERROR";
	 }
	 mysqli_close($connexion);
	 $_SESSION['empresa']=$username;
	 echo  $_SESSION['empresa'];
	 header('Location: ../PerfilEmpresa.php');
?>