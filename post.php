<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['nombre'];
    $ap_P = $_POST['Apellido_P'];
    $ap_M = $_POST['Apellido_M'];
    $direc = $_POST['Direccion'];
    $nacimiento = $_POST['fechaNac'];
    $telf = $_POST['Telefono'];
    $cel = $_POST['Celular'];
    $lugarNac = $_POST['lugarNac']; 
    $pais = $_POST['pais']; 
    $correo = $_POST['Correo'];
    $carrera = $_POST['carrera']; 
   
          //  DATABASE SETTINGS 
          define("DB_HOST", "localhost");
          define("DB_NAME", "formulario");
          define("DB_CHARSET", "utf8mb4");
          define("DB_USER", "root");
          define("DB_PASSWORD", "");
          define("DB_PORT", 3307);
       
          //  CONNECT TO DATABASE
          $pdo = new PDO(
            "mysql:host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_NAME.";charset=".DB_CHARSET, 
            DB_USER, DB_PASSWORD, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
            // Consulta para obtener los datos de la base de datos
            $sql = "SELECT * FROM datos";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
       
          if ($pdo) {
            //INSERT
            $sql = "INSERT INTO datos (nombre,Apellido_P,Apellido_M,Direccion,fechaNac,Telefono,Celular,lugarNac,pais,email,carrera) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            $stmt= $pdo->prepare($sql);
            $stmt->execute([$name,$ap_P,$ap_M,$direc,$nacimiento,$telf,$cel,$lugarNac,$pais,$correo,$carrera]);
            $successMsg = "<br><br>------------- INSCRIPCIÓN LISTA -------------<br><br>Datos: <br><br> 
            Nombres: $name <br><br> 
            Apellido Paterno: $ap_P <br><br> 
            Apellido Materno: $ap_M <br><br>
            Dirección: $direc <br><br>
            Fecha de Nacimiento: $nacimiento <br><br>
            Teléfono Fijo: $telf <br><br>
            Teléfono Móvil: $cel <br><br>
            Lugar de nacimiento:  $lugarNac <br><br>
            País: $pais  <br><br>
            Correo electrónico: $correo <br><br>
            Carrera: $carrera <br><br>
            ";
          }

        
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarjeta de Presentación</title>
    <style>
          body {
            background-color: #F7D7E8; /* Color de fondo rosado */
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        
        .center-content {
            text-align: center;
            margin: 20px auto;
            max-width: 800px;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #E6C1DE; /* Color de fondo rosado claro */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Sombra suave */
            border-radius: 10px;
        }
        
        h2 {
            color: #8A2BE2; /* Color morado intenso */
            margin-top: 0;
            padding-top: 10px;
        }
        
        .data-table {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #B0E0E6; /* Color azul claro */
            border-radius: 10px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        
        th {
            background-color: #FFB6C1; /* Color rosado claro */
        }
        
        td {
            background-color: #B0E0E6; /* Color azul claro */
        }
        
        p {
            color: #6A1B9A; /* Color morado oscuro */
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="center-content">
        <?php
            echo "<p>$successMsg</p>";
        ?>
    </div>
    <div class="data-table">
        <?php
        // Mostrar la tabla con los datos
        if (!empty($datos)) {
            echo "<h2>Datos Anteriores</h2>";
            echo "<table>";
            echo "<tr>";
            echo "<th>Nombres</th>";
            echo "<th>Apellido Paterno</th>";
            echo "<th>Apellido Materno</th>";
            echo "<th>Dirección</th>";
            echo "<th>Fecha de Nacimiento</th>";
            echo "<th>Teléfono Fijo</th>";
            echo "<th>Teléfono Móvil</th>";
            echo "<th>Lugar de Nacimiento</th>";
            echo "<th>País</th>";
            echo "<th>Correo Electrónico</th>";
            echo "<th>Carrera</th>";
            echo "</tr>";

            foreach ($datos as $dato) {
                echo "<tr>";
                echo "<td>{$dato['nombre']}</td>";
                echo "<td>{$dato['Apellido_P']}</td>";
                echo "<td>{$dato['Apellido_M']}</td>";
                echo "<td>{$dato['Direccion']}</td>";
                echo "<td>{$dato['fechaNac']}</td>";
                echo "<td>{$dato['Telefono']}</td>";
                echo "<td>{$dato['Celular']}</td>";
                echo "<td>{$dato['lugarNac']}</td>";
                echo "<td>{$dato['pais']}</td>";
                echo "<td>{$dato['email']}</td>";
                echo "<td>{$dato['carrera']}</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No hay datos disponibles.</p>";
        }
        ?>
    </div>
</body>
</html>
