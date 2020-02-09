<?php


$enlace = mysqli_connect("127.0.0.1:3306", "root", "", "borsadetreball");

if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL.2" . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
$query = "SELECT o.titol,(SELECT municipio from municipios m where m.id=(SELECT Municipi from empreses e where e.id=o.id_empresa)),o.brut,o.sou, o.id, o.descripcio, o.requisits from ofertes_laborals o  group by o.id order by o.data_publi DESC limit 10 ";

if(isset($_GET['q'])){
  $param = $_GET['q'];
  if($param){
  //$query = "SELECT o.titol,m.Municipio,o.brut,o.sou from ofertes_laborals o, empreses e, municipios m WHERE o.id_empresa=e.id  AND o.titol like \"%".$param."%\" or o.descripcio like \"%".$param."%\"or o.requisits like \"%".$param."%\" group by o.id order by o.data_publi desc limit 10 ";
    $query = "SELECT o.titol,(SELECT municipio from municipios m where m.id=(SELECT Municipi from empreses e where e.id=o.id_empresa)),o.brut,o.sou, o.id, o.descripcio, o.requisits from ofertes_laborals o WHERE o.titol like \"%".$param."%\" or o.descripcio like \"%".$param."%\"or o.requisits like \"%".$param."%\" group by o.id order by o.data_publi DESC limit 10 ";
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
        <link href="css/popup.css" rel="stylesheet" type="text/css">
        <title> PHP SELECT OPTIONS FROM DATABASE </title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>

        <table>

          <tr>
              <td>Titol</td>
              <td>Municipio</td>
              <td>Salario bruto</td>
              <td>Salario neto</td>
              <td>Informació adicional</td>
          </tr>

            <?php while($row = mysqli_fetch_array($result)):;?>

              <tr>

             <td><?php echo $row[0];?></td>
             <td><?php echo $row[1];?></td>
             <td><?php echo $row[2];?>€</td>
             <td><?php echo $row[3];?>€</td>
             <td>
                <div class="box">
                    <a class="button" href="#<?php echo $row[4];?>">Info</a>
                </div>

                <div id="<?php echo $row[4];?>" class="overlay">
                    <div class="popup">
                        <h2>Información de la oferta:</h2>
                        <a class="close" href="#">&times;</a>
                        <div class="content">
                            <h2>Título de la oferta:</h2>
                            <?php echo $row[0];?>
                             <h2>Descripción de la oferta:</h2>
                            <?php echo $row[5];?>
                            <h2>Requisitos de la oferta:</h2>
                            <?php echo $row[6];?>
                            <h2>Municipi de la oferta:</h2>
                            <?php echo $row[1];?>
                            <h2>Salario bruto</h2>
                            <?php echo $row[2];?>€
                            <h2>Salario neto</h2>
                            <?php echo $row[3];?>€
                        </div>
                    </div>
            </td>
             </tr>
            <?php endwhile;?>

          

        </table>


    </body>

</html>
