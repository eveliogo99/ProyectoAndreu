<?php
require('config.php');
session_start();
echo ($_SESSION['usuario']);
$user=$_SESSION['usuario'];
$resultU = mysqli_query($connexion,"SELECT *, (SELECT municipio from municipios WHERE id = Municipi ) AS Municipio FROM users WHERE username='$user'");
$fila = mysqli_fetch_array($resultU,MYSQLI_BOTH);
echo ("- Nombre: ".$fila['nom']."<br/> ");
mysqli_close($connexion);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<?php


$enlace = mysqli_connect("127.0.0.1:3306", "root", "", "borsadetreball");

if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL.2" . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

$result = mysqli_query($enlace,"SELECT id,provincia from provincias");
if(mysqli_num_rows($result)==0) echo("not records");



mysqli_close($enlace);


?>

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
function showMunicipi(str) {
	  var xhttp;    

	  if (str == "") {
	    document.getElementById("secondSelect").innerHTML = "";
	    return;
	}


	  xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	      document.getElementById("secondSelect").innerHTML = this.responseText;
	    }
	  };
	  xhttp.open("GET", "SelectMunicipi.php?q="+str, true);
	  xhttp.send();
}
	
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


	//MUNICIPIO
	$("#municipios").hide();
	var municipi = $("#municipi");
	municipi.dblclick(function(){
		$("#municipio").html("");
		$("#municipios").show();		
		$("#presiona").html("Presiona Intro para Confirmar los cambios");
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
				Nombre de Pila 
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
				<div id ="municipios">
					<select  onchange="showMunicipi(this.value)">
			            <option>
			                
			            </option>
			            <?php while($row = mysqli_fetch_array($result)):;?>

			            <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>

			            <?php endwhile;?>

			        </select>
			        <div id="secondSelect">
           
        			</div>
				</div>
				
				<div id ="municipio">
					<input  type='hidden' name='taskOption' value='<?php echo $fila['Municipi'] ?>'>
					<?php echo $fila['Municipio'] ?>
				</div>
			</td>
			<td id="contra">
				<input type='hidden' name='pass' value='<?php echo $fila['pass'] ?>'>
				<?php echo $fila['pass'] ?>
			</td>
		</tr>
		
		
	</table>
	</form>

		<p><a href="script/logout.php">Tanca la sessio</a></p>
		<p><a href="index.php">Home</a></p>
</body>


</html>