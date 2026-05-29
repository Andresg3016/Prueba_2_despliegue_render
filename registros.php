<?php
require 'vendor/autoload.php'; 

$cliente = new MongoDB\Client("mongodb+srv://andresg3016_db_user:9zGxNgOxqJHtKICk@cluster0.cngc6uf.mongodb.net/?appName=Cluster0");
$db = $cliente->prueba; 
$coleccion = $db->gustos;
$registros = $coleccion->find();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Tabla de Registros</title>
    <style>
        body {
            background-color: #f4f7f6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            padding-top: 40px;
            padding-bottom: 40px;
        }
        .table-container {
            background: #ffffff;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
        }
        .main-title {
            color: #2d6a4f;
            font-weight: 700;
            margin-bottom: 0;
        }
        .btn-register {
            background-color: #52b788;
            border: none;
            color: white;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }
        .btn-register:hover {
            background-color: #2d6a4f;
            color: white;
        }
        .table {
            margin-top: 10px;
            border-collapse: separate;
            border-spacing: 0;
        }
        /* Redondear esquinas de la tabla */
        .table thead th:first-child { border-top-left-radius: 10px; }
        .table thead th:last-child { border-top-right-radius: 10px; }
        
        .table-dark-custom {
            background-color: #2d6a4f !important;
            color: white !important;
            border: none;
        }
        .table-dark-custom th {
            padding: 15px;
            font-weight: 600;
            font-size: 15px;
        }
        .table tbody td {
            padding: 14px;
            vertical-align: middle;
            color: #4a5568;
            font-size: 15px;
            border-bottom: 1px solid #e2e8f0;
        }
        /* Efecto al pasar el mouse por la fila */
        .table tbody tr:hover {
            background-color: #f1f5f9;
            transition: background-color 0.2s ease;
        }
        .badge-date {
            background-color: #e2e8f0;
            color: #4a5568;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 500;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="table-container">
            
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
                <h2 class="main-title">Lista de Gustos por Aprendiz</h2>
                <a href="index.html" class="btn btn-register">← Nuevo Registro</a>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="table-dark-custom">
                            <th>Apellidos</th>
                            <th>Nombres</th>
                            <th>Color Favorito</th>
                            <th>Comida Favorita</th>
                            <th>Cine y Literatura</th>
                            <th>Fecha Registro</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($registros as $documento) {
                            echo "<tr>";
                            echo "<td class='fw-semibold'>" . htmlspecialchars($documento['apellidos'] ?? '') . "</td>";
                            echo "<td>" . htmlspecialchars($documento['nombres'] ?? '') . "</td>";
                            echo "<td>" . htmlspecialchars($documento['color'] ?? '') . "</td>";
                            echo "<td>" . htmlspecialchars($documento['comida'] ?? '') . "</td>";
                            echo "<td>" . htmlspecialchars($documento['pelicula'] ?? '') . "</td>";
                            echo "<td><span class='badge-date'>" . htmlspecialchars($documento['registro'] ?? '') . "</span></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</body>
</html>