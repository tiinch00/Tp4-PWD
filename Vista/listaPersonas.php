<?php

/**Crear una página "listaPersonas.php" que muestre un listado con las personas que se
encuentran cargadas y un link a otra página “autosPersona.php” que recibe un dni de una persona y muestra
los datos de la persona y un listado de los autos que tiene asociados. Recordar usar la capa de control antes
generada, no se puede acceder directamente a las clases del ORM */


    include_once "../configuracion.php";
    $objAbmAuto = new AbmPersona();
    $listaPersonas = $objAbmAuto->buscar(null);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Listar personas</title>
</head>

<body>
    <h2 align="center">Lista de Personas</h2>

    <table border="1" align="center">

        <?php        
//print_r($listaPersonas);

echo "<tr>";
echo "<th>NroDoc</th>";
echo "<th>Apellido</th>";
echo "<th>Nombre</th>";
echo "<th>FechaNac</th>";
echo "<th>Telefono</th>";
echo "<th>Domicilio</th>";
echo "<th>Autos Asociados</th>";
echo "</tr>";

if (count($listaPersonas) > 0) {

    for ($i = 0; $i < count($listaPersonas); $i++) {
        
        echo '<tr><td style="width:100px;">' . $listaPersonas[$i]->getNroDni() . '</td>';
        echo '<td style="width:100px;">' . $listaPersonas[$i]->getApellido() . '</td>';
        echo '<td style="width:100px;">' . $listaPersonas[$i]->getNombre() . '</td>';
        echo '<td style="width:100px;">' . $listaPersonas[$i]->getFechaNac() . '</td>';
        echo '<td style="width:100px;">' . $listaPersonas[$i]->getTelefono() . '</td>';
        echo '<td style="width:100px;">' . $listaPersonas[$i]->getDomicilio() . '</td>';
        echo '<td><a href="Action/autosPersona.php?NroDni=' . $listaPersonas[$i]->getNroDni() . '">Ver Autos</a></td>';
        echo '</tr>';

    }
} else {
    echo "<tr><td colspan='5'>No hay autos cargados</td></tr>";
}


?>
    </table>



</body>

</html>