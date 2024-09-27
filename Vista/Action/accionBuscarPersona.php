<?php


include_once '../../configuracion.php';

$datos = data_submitted();

verEstructura($datos);

$objPersona = new AbmPersona();
$persona = $objPersona->buscar($datos);

verEstructura($persona);



$mensaje = "";
$resp = false;

if (isset($datos['accion'])){
    if ($datos['accion'] == 'buscar') {
        if ($objPersona->existePersona($datos)) { // busca

            $persona = $objPersona->buscar($datos);  
            
        }
    }
    if($resp){
        $mensaje = "La accion ".$datos['accion']." se realizo correctamente.";
    }else {
        $mensaje = "La accion ".$datos['accion']." no pudo concretarse.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <p>
            <?php if ($persona){

                

            }?>
        </p>
    </div>
    
</body>
</html>