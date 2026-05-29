<?php

date_default_timezone_set('America/Bogota');
$hoy = date("Y-m-d H:i:s");  

require 'vendor/autoload.php'; // Cargar Composer

// VALIDACIÓN: Solo procesar si el usuario envió el formulario por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $cliente = new MongoDB\Client("mongodb+srv://andresg3016_db_user:9zGxNgOxqJHtKICk@cluster0.cngc6uf.mongodb.net/?appName=Cluster0");
    $db = $cliente->prueba; // Nombre de BD
    $coleccion = $db->gustos;   // Nombre de la coleccion    
    
    $resultado = $coleccion->insertOne([
        "apellidos" => $_POST["apellidos"] ?? '',
        "nombres" => $_POST["nombres"] ?? '',
        "color" => $_POST["color"] ?? '',
        "comida" => $_POST["comida"] ?? '',
        "pelicula" => $_POST["pelicula"] ?? '',
        "registro" => $hoy
    ]);
    
    // Estilo bonito para el mensaje de éxito usando el CSS nuevo
    echo "<div style='background-color: #2d6a4f; color: white; text-align: center; padding: 15px; font-family: sans-serif; font-weight: bold;'>";
    echo "¡Documento insertado con éxito! ID: " . $resultado->getInsertedId();
    echo "</div>";
    
    // Redirigir a la tabla de registros automáticamente después de 2 segundos
    header("Refresh: 2; url=registros.php");
    echo "<center style='font-family: sans-serif; margin-top: 20px;'>Redirigiendo a la lista de registros...</center>";
    exit(); // Detiene la ejecución para que haga la redirección limpia

} else {
    // Si alguien intenta entrar a logica.php directamente sin enviar el formulario, lo mandamos al index
    header("Location: index.html");
    exit();
}
?>