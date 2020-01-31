<?php
require('config.php');
session_start();
echo ($_SESSION['empresa']);
$empresa=$_SESSION['empresa'];
$resultU = mysqli_query($connexion,"SELECT * FROM empreses WHERE username='$empresa'");
$fila = mysqli_fetch_array($resultU,MYSQLI_BOTH);
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
				Id
			</td>
			<td>
				Username
			</td>
			<td>
				Pass
			</td>
			<td>
				nom
			</td>
			<td>
				cognoms
			</td>
			<td>
				NIF
			</td>
			<td>
				Municipi
			</td>
			<td>
				Descripció Empresa
			</td>
		</tr>
		<tr>
			<td>
				<input type="text" name="" value='<?php echo $fila['id'] ?>'>

			</td>
			<td>
				<input type="text" name="" value='<?php echo $fila['username'] ?>'>
			</td>
			<td>
				<input type="text" name="" value='<?php echo $fila['pass'] ?>'>
			</td>
			<td>
				<input type="text" name="" value='<?php echo $fila['nom'] ?>'>
			</td>
			<td>
				<input type="text" name="" value='<?php echo $fila['cognoms'] ?>'>
			</td>
			<td>
				<input type="text" name="" value='<?php echo $fila['NIF'] ?>'>
			</td>
			<td>
				<input type="text" name="" value='<?php echo $fila['Municipi'] ?>'>
			</td>
			<td>
				<input type="password" name="" value='<?php echo $fila['Descripció Empresa'] ?>'>
			</td>
		</tr>
	</table>
	<a href="registroOfertas.php">Registra una oferta</a>
</body>
</html>