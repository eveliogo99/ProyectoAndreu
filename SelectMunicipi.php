<?php


$enlace = mysqli_connect("127.0.0.1:3306", "root", "", "borsadetreball");

if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL.2" . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
$cueri = "SELECT id,municipio from municipios WHERE provincia_id = " . $_GET['q'];

$result = mysqli_query($enlace,$cueri);
if(mysqli_num_rows($result)==0) echo("not records");



mysqli_close($enlace);





?>



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
        <form action="registro.php" method='POST'>
            <select name="taskOption" id= 'municipi'>

                <?php while($row = mysqli_fetch_array($result)):;?>

                <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>

                <?php endwhile;?>
            </select>
         <input type="submit" name="">>
        </form>
        <script type="text/javascript">
            function hola(){
            var x = document.getElementById("municipi").value;
            console.log(x);    
        }
        </script>
        <!-- Method Two -->

    </body>

</html>
