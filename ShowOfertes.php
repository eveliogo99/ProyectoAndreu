<?php


$enlace = mysqli_connect("127.0.0.1:3306", "root", "", "borsadetreball");

if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL.2" . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
$query = "SELECT id,titol,id_empresa,brut,data_publi,descripcio,requisits,sou from ofertes_laborals limit 10";

if(isset($_GET['q'])){
  $param = $_GET['q'];
  if($param){
  $query = "SELECT id,titol,id_empresa,brut,data_publi,descripcio,requisits,sou from ofertes_laborals WHERE titol like \"%".$param."%\" or descripcio like \"%".$param."%\" limit 10";
}
  };



$result = mysqli_query($enlace,$query);
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

        <table>

          

            <?php while($row = mysqli_fetch_array($result)):;?>

              <tr>

             <td><?php echo $row[0];?></td>
             <td><?php echo $row[1];?></td>
             <td><?php echo $row[2];?></td>
             <td><?php echo $row[3];?></td>
             <td><?php echo $row[4];?></td>
             <td><?php echo $row[5];?></td>
             <td><?php echo $row[6];?></td>
             <td><?php echo $row[7];?></td>

             </tr>

            <?php endwhile;?>

          

        </table>


    </body>

</html>
