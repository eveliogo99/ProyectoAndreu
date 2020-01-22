<?php 
require('config.php');
sleep(1);
if (isset($_POST)) {
    $username = (string)$_POST['username'];
    
    $result = $connexion->query(
        'SELECT * FROM users WHERE username = "'.strtolower($username).'"'
    );
    
    if ($result->num_rows > 0) {
        echo '<div class="alert alert-success"><strong>Enhorabuena!</strong> Usuario disponible.</div>';
    } else {
    	echo '<div class="alert alert-danger"><strong>Oh no!</strong> Nombre de usuario no disponible.</div>';
    }
}