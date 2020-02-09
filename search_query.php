 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<form method="POST" action="">
 		<input type="text" name="search">
 		<input type="submit" name="">
        <div id="ofertes"></div>
 	</form>
 </body>
 </html>
 
<?php
$enlace = mysqli_connect("127.0.0.1:3306", "root", "", "borsadetreball");

if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL.2" . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}


//construeixo la primera part de la consulta. Necessito id ofertes, titol, municipi (de l'empresa) i el salari
$query = 'SELECT o.id, o.titol, e.municipio, o.salari FROM ofertes_laborals o, empreses e ';

//a $_POST['search'] tinc l'string de consulta que ha omplert l'usuari a l'input de cerca d'ofertes
if(isset($_POST['search'])){
	//creo un array amb les paraules, separant l'string amb l'espai i eliminant els espais anteriors i posteriors (trim)
	$words = explode(' ', trim($_POST['search']));
	//inici del WHERE de la consulta
	$where = "WHERE o.id_empresa = e.id AND (";
	//array amb els camps on vull buscar els termes introduits a l'input de cerca
	$array_search = ['o.titol','o.descripcio','o.requisits'];

	//per a cada paraula de cerca...
	foreach ($words as $w_key => $paraula) {
		//si la paraula no es buida (per si l'usuari ha fet doble espai sense voler)...
		if($paraula != ''){
			//per a cada camp de cerca...
			foreach ($array_search as $a_key => $camp) {
				//concateno el camp a cercar amb la paraula introduida per l'usuari. % és el caracter "comodí" en sql
				$where .= $camp ." LIKE '%".$paraula."%'";
				//només afegeixo OR si no és l'últim element de $array_search
				if($a_key != count($array_search)-1){
					$where .= " OR ";
				}
			}
			//només afegeixo OR si no és l'últim element de $words
			if($w_key != count($words)-1){
				$where .= " OR ";
			}
		}
	}
	$where .= ")";
}

//concateno a la consulta totes les condicions generades a $where. a $query hi ha tota la consulta generada

$query .= $where;
echo ($query);
$result = mysqli_query($enlace,$query);

?>
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
