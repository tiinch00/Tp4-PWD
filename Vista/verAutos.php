<?php
    include_once "../configuracion.php";
    $objAbmAuto = new AbmAuto();
    $listaAutos = $objAbmAuto->buscar(null);
?>

<?php
//include_once "Estructura/Header.php";
?>
    <h3 align="center">Lista de Autos</h3>
    <table border="1" align="center">

        <?php        
        //print_r($listaAutos);

        echo "<tr>";
        echo "<th>Patente</th>";
        echo "<th>Marca</th>";
        echo "<th>Modelo</th>";
        echo "<th>Apellido</th>";
        echo "<th>Nombre</th>";
        echo "</tr>";

        if (count($listaAutos) > 0) {

            for ($i = 0; $i < count($listaAutos); $i++) {
                
                echo '<tr><td style="width:100px;">' . $listaAutos[$i]->getPatente() . '</td>';
                echo '<td style="width:100px;">' . $listaAutos[$i]->getMarca() . '</td>';
                echo '<td style="width:100px;">' . $listaAutos[$i]->getModelo() . '</td>';
                echo '<td style="width:100px;">' . $listaAutos[$i]->getObjDniDuenio()->getApellido() . '</td>';
                echo '<td style="width:100px;">' . $listaAutos[$i]->getObjDniDuenio()->getNombre() . '</td>';
                echo '</tr>';

            }
        } else {
            echo "<div>no hay autos cargados</div>";
        }
        
        
        ?>
    </table>

<?php
//include_once "Estructura/Footer.php";
?>