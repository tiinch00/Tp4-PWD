<?php 
include_once "../configuracion.php";

$obj = new Persona();
$obj->setear('1234',' test objeto Tabla','', '', '', '');

if($obj->insertar()){
    echo "<br> El registro se inserto correctamente";
    verEstructura($obj);
}else 
    echo "<br>".$obj->getmensajeoperacion();

//$obj->setNroDni("12345");
$obj->setApellido("nuevo valor apellido para la variable instancia del objeto");
$obj->setNombre("nuevo valor nombre para la variable instancia del objeto");
$obj->setFechaNac("nuevo valor fecha de Nacimiento para la variable instancia del objeto");
$obj->setTelefono("nuevo valor telefono para la variable instancia del objeto");
$obj->setDomicilio("nuevo valor domicilio para la variable instancia del objeto");
    

if($obj->modificar()){
    echo "<br> El registro se actualizo correctamente";
    verEstructura($obj);
}else
        echo "<br>".$obj->getmensajeoperacion();

        
if($obj->eliminar())
     echo "<br> El registro se elimino correctamente";
else
    echo "<br>".$obj->getmensajeoperacion();

?>