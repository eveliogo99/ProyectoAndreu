<html>
<head>
	<title>Página Principal</title>
</head>
<?php
session_start();
if (isset($_SESSION['usuario'])) {
	// Sesión de usuario definada
	echo ($_SESSION['usuario']);
	echo('<p><a href="script/logout.php">Tanca la sessio</a></p>');
	echo ('<p><a href="PerfilUsuario.php">Perfil de Usuario</a></p>');
	echo('<iframe src="BuscadorOfertas.php" width="1000" height="1000"> </iframe>');
}elseif (isset($_SESSION['empresa'])) {
	// Sesión de empresa definada
	echo 'Hola empresa '.$_SESSION['empresa'];
	echo('<p><a href="script/logout.php">Tanca la sessio</a></p>');
	echo ('<p><a href="perfilEmpresa.php">Perfil de Empresas</a></p>');
	echo('<iframe src="BuscadorOfertas.php" width="1000" height="500"> </iframe>');
}else{
	// Ninguna sesión definida
	echo "registrate por favoh";

?>
<body>
	<p>
		<a href="login.php">login</a>
	</p>
	<p>
		<a href="registro.php">registro</a>
	</p>
</body>
</html>
<?php
}

?>