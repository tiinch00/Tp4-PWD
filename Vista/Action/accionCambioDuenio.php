<?php

include_once "../../configuracion.php";

$datos = data_submitted();

$objAuto = new AbmAuto();
$objPersona = new AbmPersona();

$mensaje = "";
$auto = null;
$autoArray = null;

if(isset($datos['Patente'])&& isset($datos['NroDni'])){

    $dni= $datos['NroDni'];
    $patente = $datos['Patente'];

 if ($objPersona->existePersona($datos)){

     if($objAuto->existeAuto($datos)){



     $personas = $objPersona->buscar($datos);

     $autos = $objAuto->buscar($datos);

     //verEstructura($autos);
     //exit;
     if (!empty($autos)) {
        foreach ($autos as $auto) {

                $dniDuenio = $auto->getObjDniDuenio()->getNroDni();

                if ($dniDuenio==$dni){

                    $mensaje = "El auto ya pertenece a esa persona.";
                    break;
                }else {
                    foreach($personas as $persona){
                    $arrayAuto = [
                        "Patente" => $auto->getPatente(),
                        "Marca" => $auto->getMarca(),
                        "Modelo" => $auto->getModelo(),
                        "DniDuenio" => $persona,
                    ];
                }
                }
            }  
            
        }  if (!$mensaje) {
            

            if (!$objAuto->modificacion($arrayAuto)) {
                $auto = null;
            }
    }
     } else {
        $mensaje = "No existe tal auto";
     }
 } else{
    $mensaje = "No existe tal Persona";
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
    <p><?php if($mensaje==null){
        echo "Cambio Exitoso";
    }; ?></p>
    
</body>
</html>





