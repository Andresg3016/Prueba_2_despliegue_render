<?php

date_default_timezone_set('America/Bogota');
$hoy = date("Y-m-d H:i:s");  

require 'vendor/autoload.php'; // Cargar Composer

    $cliente = new MongoDB\Client("mongodb+srv://andresg3016_db_user:9zGxNgOxqJHtKICk@cluster0.cngc6uf.mongodb.net/?appName=Cluster0");
    $db = $cliente->prueba;	// Nombre de BD
    $coleccion = $db->gustos;	//Nombre de la coleccion	
    $resultado = $coleccion->insertOne([
        "apellidos" => $_POST["apellidos"],
        "nombres" => $_POST["nombres"],
        "color" => $_POST["color"],
        "comida" => $_POST["comida"],
        "pelicula" => $_POST["pelicula"],
        "registro" => $hoy
    ]);
    echo "<center><h3 style='border:1px solid green;background-color:rgb(64,145,108);color:white;padding:1%;'>Documento insertado con ID: " . $resultado->getInsertedId() . "</h3></center>";
    
header("Refresh: 3; url=registros.php"); // Redirige a la tabla después de 3 segundos
echo "<center><p>Redirigiendo a la lista de registros...</p></center>";

?>
