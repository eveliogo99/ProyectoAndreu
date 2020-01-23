<?php
require('config.php');
session_start();
echo ($_SESSION['usuario']);
$user=$_SESSION['usuario'];
$resultU = mysqli_query($connexion,"SELECT * FROM users WHERE username='$user'");
$fila = mysqli_fetch_array($resultU,MYSQLI_BOTH);
echo ("- Nombre: ".$fila['nom']."<br/> ");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table border=1>
		<tr>
			<td>
				Username
			</td>
			<td>
				Nombre
			</td>
			<td>
				Apellido
			</td>
			<td>
				DNI
			</td>
			<td>
				Estudis/titols
			</td>
			<td>
				Experiencia Laboral
			</td>
			<td>
				Municipi
			</td>
			<td>
				Contraseña
			</td>
		</tr>
		<tr>
			<td>
				<input type="text" name="" value='<?php echo $fila['username'] ?>'>

			</td>
			<td>
				<input type="text" name="" value='<?php echo $fila['nom'] ?>'>
			</td>
			<td>
				<input type="text" name="" value='<?php echo $fila['cognoms'] ?>'>
			</td>
			<td>
				<input type="text" name="" value='<?php echo $fila['DNI'] ?>'>
			</td>
			<td>
				<input type="text" name="" value='<?php echo $fila['Estudis/Títols'] ?>'>
			</td>
			<td>
				<input type="text" name="" value='<?php echo $fila['Experiencia Laboral'] ?>'>
			</td>
			<td>
				<input type="text" name="" value='<?php echo $fila['Municipi'] ?>'>
			</td>
			<td>
				<input type="password" name="" value='<?php echo $fila['pass'] ?>'>
			</td>
		</tr>
	</table>
</body>
</html>