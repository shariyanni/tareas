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
       
          if ($pdo) {
            //INSERT
            $sql = "INSERT INTO datos (nombre,Apellido_P,Apellido_M,Direccion,fechaNac,Telefono,Celular,lugarNac,pais,email,carrera) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            $stmt= $pdo->prepare($sql);
            $stmt->execute([$name,$ap_P,$ap_M,$direc,$nacimiento,$telf,$cel,$lugarNac,$pais,$correo,$carrera]);
            echo "<br><br><br><br>Inserción exitosa!<br><br><br><br>";
            $successMsg = "------------- INSCRIPCIÓN LISTA -------------<br><br>Datos: <br><br> 
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
        .center-content {
            text-align: center;
            margin: 0 auto;
            max-width: 600px;
            padding: 20px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <div class="center-content">
        <?php
            echo "<p>$successMsg</p>";
        ?>
    </div>
</body>
</html>
