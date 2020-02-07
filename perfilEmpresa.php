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
			username.html("<input type='textarea' name='username' value='<?php echo $fila['username'] ?>'>");
		});

		var nom_empresa = $("#nom");
		nom_empresa.dblclick(function(){
			nom_empresa.html("");
			nom_empresa.html("<input type='textarea' name='nom_empresa' value='<?php echo $fila['nom_empresa'] ?>'>");
		});

		var nif = $("#nif");
		nif.dblclick(function(){
			nif.html("");
			nif.html("<input type='textarea' name='nif' value='<?php echo $fila['NIF'] ?>'>");
		});
		var municipi = $("#municipi");
		municipi.dblclick(function(){
			municipi.html("");
			municipi.html("<input type='textarea' name='municipi' value='<?php echo $fila['Municipi'] ?>'>");
		});
		var descripcio = $("#descripcio");
		descripcio.dblclick(function(){
			descripcio.html("");
			descripcio.html("<input type='textarea' name='descripcio' value='<?php echo $fila['descripcio'] ?>'>");
		});

		var pass = $("#pass");
		pass.dblclick(function(){
			pass.html("");
			pass.html("<input type='password' name='pass' value='<?php echo $fila['pass'] ?>'>");
		});

		$(document).on('keypress',function(e) {
		    if(e.which == 13) {
		    	$( "form#formulario" ).submit();
		    }
		});
	});
</script>
<body>
	<form method="POST" id="formulario" action="script/actualitzaEmpresa.php" >
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
				<input type='hidden' name='username' value='<?php echo $fila['username'] ?>'>
				<?php echo $fila['username'] ?>
			</td>
			<td id='nom'>
				<input type='hidden' name='nom_empresa' value='<?php echo $fila['nom_empresa'] ?>'>
				<?php echo $fila['nom_empresa'] ?>
			</td>			
			<td id='nif'>
				<input type='hidden' name='nif' value='<?php echo $fila['NIF'] ?>'>
				<?php echo $fila['NIF'] ?>
			</td>
			<td id='municipi'>
				<input type='hidden' name='municipi' value='<?php echo $fila['Municipi'] ?>'>
				<?php echo $fila['Municipi'] ?>
			</td>
			<td id='descripcio'>
				<input type='hidden' name='descripcio' value='<?php echo $fila['descripcio'] ?>'>
				<?php echo $fila['descripcio'] ?>
			</td>
			<td id='pass'>
				<input type='hidden' name='pass' value='<?php echo $fila['pass'] ?>'>
				<?php echo $fila['pass'] ?>
			</td>
		</tr>
	</table>
	</form>
	<p><a href="registroOfertas.php">Registra una oferta</a></p>
	<p><a href="script/logout.php">Tanca la sessio</a></p>
	<p><a href="index.php">Home</a></p>
</body>
</html>