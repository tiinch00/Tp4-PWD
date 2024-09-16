<?php 
include_once '../../configuracion.php';
$datos = data_submitted();
//verEstructura($datos);
$resp = false;
$objAbmAuto = new AbmAuto();
//$mensaje = "";
//$arrayDatos= [];
if (isset($datos['accion'])){
    if($datos['accion']=='editar'){
        if($objAbmAuto->modificacion($datos)){
            $resp = true;
        }
    }
    if($datos['accion']=='borrar'){
        if($objAbmAuto->baja($datos)){
            $resp =true;
        }
        
    }
    if($datos['accion']=='nuevo'){
        if($objAbmAuto->alta($datos)){
            $resp =true;
        }
        
    }
    if ($datos['accion'] == 'buscarPatente') {
        if ($objAbmAuto->buscar($datos)) { // busca
            $resp = true;
        }
    }
    if($resp){
        $mensaje = "La accion ".$datos['accion']." se realizo correctamente.";
    }else {
        $mensaje = "La accion ".$datos['accion']." no pudo concretarse.";
    }

   $arrayDatos = $objAbmAuto->buscar($datos);
    
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
    <p>
        <?php
        echo "<h2 align='center'>" . $mensaje . "</h2>";
        ?>
    </p>

<div>
    <p>
        <?php
        if (count($arrayDatos)>0){

            echo "<table border='1' align='center'>";
            echo "<tr>";
            echo "<th>Pantente</th>";
            echo "<th>Marca</th>";
            echo "<th>Modelo</th>";
            echo "<th>Dni Dueño</th>";
            echo "</tr>";
            
            foreach ($arrayDatos as $dato) {

                echo '<tr><td style="width:100px;"  align="center">' . $dato->getPatente() . '</td>';

                echo '<td style="width:100px;" align="center">' . $dato->getMarca() . '</td>';

                echo '<td style="width:100px;" align="center">' . $dato->getModelo() . '</td>';

                echo '<td style="width:100px;" align="center">' . $dato->getObjDniDuenio()->getNroDni() . '</td>';

                echo "</tr>";
            }

            echo "</table>";

        } else {
            echo "<div align='center'>No tiene un auto asociado</div>";
        }
        ?>
    </p>
</div>



    

   <div align="center"><a href="../buscarAuto.php">volver</a></div>
</body>
</html>