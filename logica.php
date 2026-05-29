<?php

date_default_timezone_set('America/Bogota');
$hoy = date("Y-m-d H:i:s");  

require 'vendor/autoload.php'; // Cargar Composer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $cliente = new MongoDB\Client("mongodb+srv://andresg3016_db_user:9zGxNgOxqJHtKICk@cluster0.cngc6uf.mongodb.net/?appName=Cluster0");
    $db = $cliente->prueba; 
    $coleccion = $db->gustos;   
    
    $resultado = $coleccion->insertOne([
        "apellidos" => $_POST["apellidos"] ?? '',
        "nombres" => $_POST["nombres"] ?? '',
        "color" => $_POST["color"] ?? '',
        "comida" => $_POST["comida"] ?? '',
        "pelicula" => $_POST["pelicula"] ?? '',
        "registro" => $hoy
    ]);
    
    // 1. Pintamos el aviso bonito en pantalla
    echo "<div style='background-color: #2d6a4f; color: white; text-align: center; padding: 15px; font-family: sans-serif; font-weight: bold;'>";
    echo "¡Documento insertado con éxito! ID: " . $resultado->getInsertedId();
    echo "</div>";
    
    echo "<center style='font-family: sans-serif; margin-top: 20px;'>Redirigiendo a la lista de registros...</center>";
    
    // 2. Quitamos el 'header()' problemático y usamos JavaScript para la redirección (espera 2 segundos)
    echo "<script>
            setTimeout(function() {
                window.location.href = 'registros.php';
            }, 2000);
          </script>";
          
    exit(); 

} else {
    header("Location: index.html");
    exit();
}
?>