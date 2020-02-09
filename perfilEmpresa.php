<?php
require('config.php');
session_start();
echo ($_SESSION['empresa']);
$empresa=$_SESSION['empresa'];
$resultU = mysqli_query($connexion,"SELECT *, (SELECT municipio from municipios WHERE id = Municipi ) AS Municipio FROM empreses WHERE username='$empresa'");
$fila = mysqli_fetch_array($resultU,MYSQLI_BOTH);
$result = mysqli_query($connexion,"SELECT id,provincia from provincias");
if(mysqli_num_rows($result)==0) echo("not records");



mysqli_close($connexion);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js">
</script>

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

<script type="text/javascript">
	//funció per mostrar municipis
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
			username.html("<input type='textarea' name='username' value='<?php echo $fila['username'] ?>'>");
			$("#presiona").html("Presiona Intro para Confirmar los cambios");

		});

		var nom_empresa = $("#nom");
		nom_empresa.dblclick(function(){
			nom_empresa.html("");
			nom_empresa.html("<input type='textarea' name='nom_empresa' value='<?php echo $fila['nom_empresa'] ?>'>");
			$("#presiona").html("Presiona Intro para Confirmar los cambios");
		});

		var nif = $("#nif");
		nif.dblclick(function(){
			nif.html("");
			nif.html("<input type='textarea' name='nif' value='<?php echo $fila['NIF'] ?>'>");
			$("#presiona").html("Presiona Intro para Confirmar los cambios");
		});



		//MUNICIPIO
		$("#municipios").hide();
		var municipi = $("#municipi");
		municipi.dblclick(function(){
			$("#municipio").html("");
			$("#municipios").show();
			
			
			$("#presiona").html("Presiona Intro para Confirmar los cambios");
		});



		var descripcio = $("#descripcio");
		descripcio.dblclick(function(){
			descripcio.html("");
			descripcio.html("<input type='textarea' name='descripcio' value='<?php echo $fila['descripcio'] ?>'>");
			$("#presiona").html("Presiona Intro para Confirmar los cambios");
		});

		var pass = $("#pass");
		pass.dblclick(function(){
			pass.html("");
			pass.html("<input type='password' name='pass' value='<?php echo $fila['pass'] ?>'>");
			$("#presiona").html("Presiona Intro para Confirmar los cambios");
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
	<div id="presiona">
		
	</div>
	</form>
	<p><a href="registroOfertas.php">Registra una oferta</a></p>
	<p><a href="script/logout.php">Tanca la sessio</a></p>
	<p><a href="index.php">Home</a></p>
</body>
</html>