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
