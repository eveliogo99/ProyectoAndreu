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
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js">
</script>
<script type="text/javascript">
	$(document).ready(function () {
		var username = $("#username");
		username.dblclick(function(){
			username.html("");
			username.html("<input type='textarea' name='user' value='<?php echo $fila['username'] ?>'>");
		});

		var nom_empresa = $("#nom");
		nom_empresa.dblclick(function(){
			nom_empresa.html("");
			nom_empresa.html("<input type='textarea' name='nom_empresa' value='<?php echo $fila['nom_empresa'] ?>'>");
		});
	});
</script>
<body>
	<form method="POST">
	<table border=1>
		<tr>
			<td>
				LoginEmpresa
			</td>
			<td>
				Nom Empresa
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
			<td>
				Contrasenya
			</td>
		</tr>
		<tr>
			<td id ='username'>
				<?php echo $fila['username'] ?>
			</td>
			<td id='nom'>
				<?php echo $fila['nom_empresa'] ?>
			</td>			
			<td id='nif'>
				<input type="text" name="" value='<?php echo $fila['NIF'] ?>'>
			</td>
			<td id='municipi'>
				<input type="text" name="" value='<?php echo $fila['Municipi'] ?>'>
			</td>
			<td id='descripcio'>
				<input type="text" name="" value='<?php echo $fila['descripcio'] ?>'>
			</td>
			<td id='pass'>
				<input type="password" name="" value='<?php echo $fila['pass'] ?>'>
			</td>
		</tr>
	</table>
	</form>
	<a href="registroOfertas.php">Registra una oferta</a>
</body>
</html>