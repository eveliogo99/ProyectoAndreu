<?php


$enlace = mysqli_connect("127.0.0.1:3307", "jordi", "patata", "borsadetreball");

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




<!--required , include-->
<!DOCTYPE html>

<html>

    <head>

        <title> PHP SELECT OPTIONS FROM DATABASE </title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>

        <!--Method One-->

        <select onchange="showMunicipi(this.value)">
            <option>
                
            </option>
            <?php while($row = mysqli_fetch_array($result)):;?>

            <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>

            <?php endwhile;?>

        </select>
        
        <div id="secondSelect">
            
        </div>


    </body>

</html>
