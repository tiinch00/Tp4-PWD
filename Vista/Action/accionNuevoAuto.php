<?php

include_once "../../configuracion.php";

$datos = data_submitted();
$objAuto = new AbmAuto();
$objPersona = new AbmPersona();

$mensaje = "";
$resp = false;

if (isset($datos['accion']) && $datos['accion'] == 'nuevo') {
    // Verificar si la persona dueña del auto ya está registrada en la base de datos
    if ($objPersona->existePersona($datos)) {
        // Si la persona existe, intentar cargar el auto
        if ($objAuto->alta($datos)) {
            $resp = true;
        }
    } 
}

// Mensaje según el resultado de la operación
if ($resp) {
    $mensaje = "La acción 'Agregar Auto' se realizó correctamente.";
} else {
    $mensaje = "La persona dueña del auto no está registrada. ¿Desea cargarla?";
    $mensaje .= "<div><a href='../nuevaPersona.php'>Cargar Nueva Persona</a></div>";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <!-- Vincular Bootstrap para estilizar mejor -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column justify-content-center align-items-center vh-100">
    <div class="container text-center">
        <h2><?php echo $mensaje; ?></h2>
        <div>
            <a href="../nuevoAuto.php" class="btn btn-primary">Volver</a>
        </div>
    </div>
</body>
</html>