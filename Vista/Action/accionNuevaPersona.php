<?php

include_once "../../configuracion.php";

$datos = data_submitted();
$objPersona = new AbmPersona();

/**if(iseet($datos["NroDni"])){
    $objPersona->cargar($datos);
    $resp = true;

}*/

/**if($datos['accion']=='nuevo'){
    if($objPersona->alta($datos)){
        $resp =true;
    }
    if($resp){
        $mensaje = "La accion ".$datos['accion']." se realizo correctamente.";
    }else {
        $mensaje = "La accion ".$datos['accion']." no pudo concretarse.";
    }
}*/

$mensaje = "";

if (isset($datos['accion']) && $datos['accion'] == 'nuevo') {
    if ($objPersona->alta($datos)) {
        $mensaje = "La accion ".$datos['accion']." se realizo correctamente.";
    } else {
        $mensaje = "La accion ".$datos['accion']." no pudo concretarse.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="mensaje">
        <h2>Resultado</h2>
        <p><?php echo $mensaje; ?></p>
        <a href="../nuevaPersona.php">Volver</a>
    </div>
    
</body>
</html>
    