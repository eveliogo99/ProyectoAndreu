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
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
	var username = $("#username");
	username.dblclick(function(){
		username.html("");
		username.html("<input type='textarea' name='user' value='<?php echo $fila['username'] ?>'>");
	});

	var nom = $("#nom");
	nom.dblclick(function(){
		nom.html("");
		nom.html("<input type='textarea' name='nom' value='<?php echo $fila['nom'] ?>'>");
	});

	var cognoms = $("#cognoms");
	cognoms.dblclick(function(){
		cognoms.html("");
		cognoms.html("<input type='textarea' name='cognoms' value='<?php echo $fila['cognoms'] ?>'>");
	});

	var dni = $("#dni");
	dni.dblclick(function(){
		dni.html("<input type='textarea' name='dni' value='<?php echo $fila['DNI'] ?>'>");
	});

	var titols = $("#titols");
	titols.dblclick(function(){
		titols.html("<input type='textarea' name='estudis' value='<?php echo $fila['Estudis/Títols'] ?>'>");
	});

	var experiencia = $("#experiencia");
	experiencia.dblclick(function(){
		experiencia.html("<input type='textarea' name='experiencia' value='<?php echo $fila['Experiencia Laboral'] ?>'>");
	});
	var municipi = $("#municipi");
	municipi.dblclick(function(){
		municipi.html("<input type='textarea' name='municipi' value='<?php echo $fila['Municipi'] ?>'>");
	});
	var contra = $("#contra");
	contra.dblclick(function(){
		contra.html("<input type='password' name='pass' value='<?php echo $fila['pass'] ?>'>");
	});

	$(document).on('keypress',function(e) {
	    if(e.which == 13) {
	    	$( "form#formulario" ).submit();
	    }
	});
}); 
</script>
<body>
	<form action="script/actualitza.php" method="GET" id="formulario" name="env">
	<table border=1 id="tabla" >
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
			<td id = 'username'>
				<input type='hidden' name='user' value='<?php echo $fila['username'] ?>'>
				<?php echo $fila['username'] ?>

			</td>
			<td id= 'nom'>
				<input type='hidden' name='nom' value='<?php echo $fila['nom'] ?>'>
				<?php echo $fila['nom'] ?>
			</td>
			<td id="cognoms">
				<input type='hidden' name='cognoms' value='<?php echo $fila['cognoms'] ?>'>
				<?php echo $fila['cognoms'] ?>
			</td >
			<td id="dni">
				<input type='hidden' name='dni' value='<?php echo $fila['DNI'] ?>'>
				<?php echo $fila['DNI'] ?>
			</td>
			<td id="titols">
				<input type='hidden' name='estudis' value='<?php echo $fila['Estudis/Títols'] ?>'>
				<?php echo $fila['Estudis/Títols'] ?>
			</td>
			<td id="experiencia">
				<input type='hidden' name='experiencia' value='<?php echo $fila['Experiencia Laboral'] ?>'>
				<?php echo $fila['Experiencia Laboral'] ?>
			</td>
			<td id="municipi">
				<input type='hidden' name='municipi' value='<?php echo $fila['Municipi'] ?>'>
				<?php echo $fila['Municipi'] ?>
			</td>
			<td id="contra">
				<input type='hidden' name='pass' value='<?php echo $fila['pass'] ?>'>
				<?php echo $fila['pass'] ?>
			</td>
		</tr>
		
		
	</table>
	</form>

		<a href="script/logout.php">Tanca la sessio</a>
</body>


</html>