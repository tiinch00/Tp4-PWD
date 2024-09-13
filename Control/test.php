<?php
include_once '../Modelo/conector/BaseDatos.php';  // Asegúrate de que la clase BaseDatos esté correctamente incluida
include_once '../Modelo/Persona.php';

function mostrarMenu() {
    echo "\n=== MENU ===\n";
    echo "1. Insertar nueva persona\n";
    echo "2. Modificar persona\n";
    echo "3. Eliminar persona\n";
    echo "4. Buscar persona\n";
    echo "5. Listar personas\n";
    echo "6. Salir\n";
    echo "Elige una opción: ";
}

function insertarPersona() {
    $persona = new Persona();
    echo "Nro DNI: ";
    $nroDni = trim(fgets(STDIN));
    echo "Apellido: ";
    $apellido = trim(fgets(STDIN));
    echo "Nombre: ";
    $nombre = trim(fgets(STDIN));
    echo "Fecha de Nacimiento (YYYY-MM-DD): ";
    $fechaNac = trim(fgets(STDIN));
    echo "Teléfono: ";
    $telefono = trim(fgets(STDIN));
    echo "Domicilio: ";
    $domicilio = trim(fgets(STDIN));

    $persona->setear($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio);
    
    if ($persona->insertar()) {
        echo "Persona insertada correctamente.\n";
    } else {
        echo "Error al insertar persona: " . $persona->getmensajeoperacion() . "\n";
    }
}

function modificarPersona() {
    $persona = new Persona();
    echo "Ingrese el Nro DNI de la persona a modificar: ";
    $nroDni = trim(fgets(STDIN));

    if ($persona->buscar($nroDni)) {
        echo "Persona encontrada. Ingrese los nuevos valores.\n";
        echo "Nuevo Apellido (actual: " . $persona->getApellido() . "): ";
        $apellido = trim(fgets(STDIN));
        echo "Nuevo Nombre (actual: " . $persona->getNombre() . "): ";
        $nombre = trim(fgets(STDIN));
        echo "Nueva Fecha de Nacimiento (actual: " . $persona->getFechaNac() . "): ";
        $fechaNac = trim(fgets(STDIN));
        echo "Nuevo Teléfono (actual: " . $persona->getTelefono() . "): ";
        $telefono = trim(fgets(STDIN));
        echo "Nuevo Domicilio (actual: " . $persona->getDomicilio() . "): ";
        $domicilio = trim(fgets(STDIN));

        $persona->setear($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio);

        if ($persona->modificar()) {
            echo "Persona modificada correctamente.\n";
        } else {
            echo "Error al modificar persona: " . $persona->getmensajeoperacion() . "\n";
        }
    } else {
        echo "Persona no encontrada.\n";
    }
}

function eliminarPersona() {
    $persona = new Persona();
    echo "Ingrese el Nro DNI de la persona a eliminar: ";
    $nroDni = trim(fgets(STDIN));

    if ($persona->buscar($nroDni)) {
        if ($persona->eliminar()) {
            echo "Persona eliminada correctamente.\n";
        } else {
            echo "Error al eliminar persona: " . $persona->getmensajeoperacion() . "\n";
        }
    } else {
        echo "Persona no encontrada.\n";
    }
}

function buscarPersona() {
    $persona = new Persona();
    echo "Ingrese el Nro DNI de la persona a buscar: ";
    $nroDni = trim(fgets(STDIN));

    if ($persona->buscar($nroDni)) {
        echo $persona;
    } else {
        echo "Persona no encontrada.\n";
    }
}

function listarPersonas() {
    $persona = new Persona();
    $personas = $persona->listar();
    if ($personas) {
        foreach ($personas as $p) {
            echo $p . "\n";
        }
    } else {
        echo "No se encontraron personas.\n";
    }
}

do {
    mostrarMenu();
    $opcion = trim(fgets(STDIN));
    
    switch ($opcion) {
        case 1:
            insertarPersona();
            break;
        case 2:
            modificarPersona();
            break;
        case 3:
            eliminarPersona();
            break;
        case 4:
            buscarPersona();
            break;
        case 5:
            listarPersonas();
            break;
        case 6:
            echo "Saliendo...\n";
            break;
        default:
            echo "Opción no válida.\n";
    }
} while ($opcion != 6);

?>