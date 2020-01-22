<!DOCTYPE html>
<html>
<body>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>

<script type="text/javascript">
$(document).ready(function() {	
    $('input[name=nomU]').on('blur', function(){
        $('#result-username').html('<img src="images/loader.gif" />').fadeOut(1000);

        var username = $(this).val();		
        var dataString = 'username='+username;

        $.ajax({
            type: "POST",
            url: "check_username_availablity.php",
            data: dataString,
            success: function(data) {
                $('#result-username').fadeIn(1000).html(data);
            }
        });
    }); 

    $('input[name=nomE]').on('blur', function(){

    	$('#result-empresa').html('<img src="images/loader.gif" />').fadeOut(1000);

        var username = $(this).val();		
        var dataString = 'username='+username;

        $.ajax({
            type: "POST",
            url: "check_empresa_availablity.php",
            data: dataString,
            success: function(data) {
                $('#result-empresa').fadeIn(1000).html(data);
            }
        });
    });

});    
</script>
	Selecciona el tipus de registre:<br>
	<input type="radio" name="tipoLogin" onclick="mostraUsu()"> Usuario<br>
  <input type="radio" name="tipoLogin"onclick="mostraEmpresa()"> Empresa<br>

<div id="usuario" style="display: none">
	<form action="" method="POST">
		<p>Nom de l´usuari:</p>
		<input type="text" name="nomU"></input>
		<div id="result-username"></div>
		<p>Contraseña:</p>
		<input type="password" name="passU"></input>
		<p>Nombre:</p>
		<input type="text" name="nombresU"></input>
		<p>Apellidos:</p>
		<input type="text" name="apellidosU"></input>
		<p>DNI:</p>
		<input type="text" name="dniU"></input>
		<!-- PONER CAMPO MUNICIPIOS PROVINVIAS -->
		<p>Titols:</p>
		<input type="text" name="titolsU"></input>
		<p>Experiencia laboral:</p>
		<input type="text" name="experienciaU"></input>
		<br>
		<input type="submit" value="Login" name="env"></input>
	</form>
	
</div>
<div id="empresa" style="display: none">
	<form action="" method="POST">
		<p>Nom de l´usuari:</p>
		<input type="text" name="nomE"></input>
		<div id="result-empresa"></div>
		<p>Contraseña:</p>
		<input type="password" name="passE"></input>
		<p>Nombre:</p>
		<input type="text" name="nombresE"></input>
		<p>Apellidos:</p>
		<input type="text" name="apellidosE"></input>
		<p>NFI:</p>
		<input type="text" name="nfiE"></input>
		<!-- PONER CAMPO MUNICIPIOS PROVINVIAS -->
		<p>Titols:</p>
		<input type="text" name="titolsE"></input>
		<p>Descripció empresa:</p>
		<input type="text" name="experienciaE"></input>
		<br>
		<input type="submit" value="Login" name="env2"></input>
	</form>
</div>
<p>El resultat:</p>
<script>
	usuario=document.getElementById("usuario");
	empresa=document.getElementById("empresa");
	function mostraUsu() {	
		usuario.style.display='block';
		empresa.style.display='none';
	}
	function mostraEmpresa() {
		usuario.style.display='none';
		empresa.style.display='block';
	}
</script>
<?php
$enlace = mysqli_connect("127.0.0.1:3306", "root", "", "borsadetreball");
//Login para usuario

if(isset($_POST['env'])){
	$usuU =$_POST['usuU'];
	$passU = $_POST['passU'];
	$nomU = $_POST['nomU'];
	$apellidosU = $_POST['apellidosU'];
	$dniU = $_POST['dniU'];
	$titolsU = $_POST['titolsU'];
	$experienciaU = $_POST['experienciaU'];
	if (!$enlace) {
	    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
	    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
	    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}else{
		$resultU = mysqli_query($enlace,"INSERT INTO `users` (`id`, `username`, `pass`, `nom`, `cognoms`, `DNI`, `Municipi`, `Estudis/Títols`, `Experiencia Laboral`) VALUES (NULL, '$usuU', '$passU', '$nomU', '$apellidosU', '$dniU', 'Barcelona', '$titolsU', '$experienciaU');");
		if(mysqli_affected_rows($enlace)>0){
			echo("Usuario Registrado correctamente como users"); 
		}else { 
			echo("user was found"); 
			   
			 }
		}
}

//Login para empresa
if(isset($_POST['env2'])){
	$usuE = $_POST['usuE'];
	$passE = $_POST['passE'];
	$nomE = $_POST['nomE'];
	$apellidosE = $_POST['apellidosE'];
	$nfiE = $_POST['nfiE'];
	$titolsE = $_POST['titolsE'];
	$experienciaE = $_POST['experienciaE'];
	if (!$enlace) {
	    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
	    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
	    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}else{
		$resultE = mysqli_query($enlace,"INSERT INTO `empreses` (`id`, `username`, `pass`, `nom`, `cognoms`, `NIF`, `Municipi`, `Descripció Empresa`) VALUES (NULL, '$usuE', '$passE', '$nomE', '$apellidosE', '$nfiE', '$titolsE', '$experienciaE')");
		if(mysqli_affected_rows($enlace)>0){
			echo("Usuari ".$usuE." registrat correctament en empresas"); 
		}else { 
			echo("user was found"); 
			   
			 }
		}
}
mysqli_close($enlace);
?>

</body>
</html>