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

    $('input[name=usuE]').on('blur', function(){

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

<?php

/*
$enlace1 = mysqli_connect("127.0.0.1:3306", "root", "", "borsadetreball");

if (!$enlace1) {
    echo "Error: No se pudo conectar a MySQL.2" . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

$result = mysqli_query($enlace1,"SELECT id,provincia from provincias");
if(mysqli_num_rows($result)==0) echo("not records");



mysqli_close($enlace1);
*/

?>

<script>

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
		<input type="text" name="usuE"></input>
		<div id="result-empresa"></div>
		<p>Contraseña:</p>
		<input type="password" name="passE"></input>
		<p>Nombre:</p>
		<input type="text" name="nomE"></input>
		<p>NFI:</p>
		<input type="text" name="nfiE"></input>
		<!-- PONER CAMPO MUNICIPIOS PROVINVIAS -->
		<p>Descripció empresa:</p>
		<input type="text" name="descripcioE"></input>
		<!--<p>Seleccciona Municipi:</p>
		 <select  onchange="showMunicipi(this.value)">
            <option>
                
            </option>
            <?php while($row = mysqli_fetch_array($result)):;?>

            <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>

            <?php endwhile;?>

        </select>
        <div id="secondSelect">
           
        </div>-->
		<input type="submit" value="Login" name="env2"></input>
	</form>

	<!--Jordi -->
       <?php 
           echo $_POST['taskOption'];?> 
        

		<!--Fin Jordi -->


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
$result = mysqli_query($enlace,"SELECT id,provincia from provincias");
if(mysqli_num_rows($result)==0) echo("not records");


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
			echo("usuario encontrado porfavor pon otro username"); 
			   
			 }
		}
}

//Login para empresa
if(isset($_POST['env2'])){
	$usuE = $_POST['usuE'];
	$passE = $_POST['passE'];
	$nomE = $_POST['nomE'];
	$nfiE = $_POST['nfiE'];
	$descripcioE = $_POST['descripcioE'];
	if (!$enlace) {
	    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
	    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
	    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}else{
		$resultE = mysqli_query($enlace,"INSERT INTO `empreses` (`id`, `username`, `pass`, `nom_empresa`, `NIF`, `Municipi`, `descripcio`) VALUES (NULL, '$usuE', '$passE', '$nomE', '$nfiE', 2, '$descripcioE')");
		if(mysqli_affected_rows($enlace)>0){
			echo("Usuari ".$usuE." registrat correctament en empresas"); 
		}else { 
			echo("usuario encontrado porfavor pon otro username"); 
			   
			 }
		}
		mysqli_close($enlace);
}

?>

</body>
<!--JORDIIIIIIIIIIIIIIIIIIIIII-->
<script>
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
</script>
</html>