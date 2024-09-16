<?php
    include_once "../../configuracion.php";
    $datos = data_submitted();

    if (isset($datos['NroDni'])) {
        $dni = $datos['NroDni'];

        // Buscar los datos de la persona por DNI
        $objAbmPersona = new AbmPersona();
        $persona = $objAbmPersona->buscar($dni);

        // Verificar si se encontró la persona
        if (count($persona) > 0) {
            $persona = $persona[0]; // Obtener el primer resultado 
            // Mostrar los datos de la persona
            echo "<div align='center'>";
            echo "<h2 >Datos de la Persona</h2>";
            echo "<p><strong>DNI:</strong> " . $persona->getNroDni() . "</p>";
            echo "<p><strong>Nombre:</strong> " . $persona->getNombre() . " " . $persona->getApellido() . "</p>";
            echo "<p><strong>Fecha de Nacimiento:</strong> " . $persona->getFechaNac() . "</p>";
            echo "<p><strong>Teléfono:</strong> " . $persona->getTelefono() . "</p>";
            echo "<p><strong>Domicilio:</strong> " . $persona->getDomicilio() . "</p>";

            // Buscar los autos asociados a la persona
            $objAbmAuto = new AbmAuto();
            $autos = $objAbmAuto->buscar(['DniDuenio' => $dni]);

            if (count($autos) > 0) {
                echo "<h2>Autos Asociados</h2>";
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>Patente</th>";
                echo "<th>Marca</th>";
                echo "<th>Modelo</th>";
                echo "</tr>";
                
                // Mostrar los autos
                foreach ($autos as $auto) {
                    echo '<tr>';
                    echo '<td>' . $auto->getPatente() . '</td>';
                    echo '<td>' . $auto->getMarca() . '</td>';
                    echo '<td>' . $auto->getModelo() . '</td>';
                    echo '</tr>';
                }
                echo "</table>";
                echo "</div>";
            } else {
                echo "<p>No hay autos asociados con esta persona.</p>";
            }
        } else {
            echo "<p>No se encontró ninguna persona con el DNI proporcionado.</p>";
        }
    } else {
        echo "<p>No se proporcionó un DNI válido.</p>";
    }
    
    echo "<div align='center'><a href='../buscarAuto.php'>volver</a></div>";
?>