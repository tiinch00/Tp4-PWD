<?php
include_once '../configuracion.php';

// Crea un objeto Persona válido
$duenio = new Persona();
$duenio->setear('35312171', 'Apellido', 'Nombre', '2000-01-01', '1234567890', 'Domicilio');

// Crea un objeto Auto con un objeto Persona válido
$obj = new Auto();
$obj->setear('ABC123', 'MarcaTest', 99, $duenio);

// Insertar
if ($obj->insertar()) {
    echo "<br> El registro se insertó correctamente";
    verEstructura($obj);
} else {
    echo "<br>" . $obj->getmensajeoperacion();
}

// Modificar
//$obj->setPatente("ABC123");
$obj->setMarca("MarcaModificada");
$obj->setModelo(456465);

if ($obj->modificar()) {
    echo "<br> El registro se actualizó correctamente";
    verEstructura($obj);
} else {
    echo "<br>" . $obj->getmensajeoperacion();
}

// Eliminar
if ($obj->eliminar()) {
    echo "<br> El registro se eliminó correctamente";
} else {
    echo "<br>" . $obj->getmensajeoperacion();
}
?>