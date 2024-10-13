Crear una página “NuevoAuto.php” que contenga un formulario en el que se permita cargar
todos los datos de un auto (incluso su dueño). Estos datos serán enviados a una página
“accionNuevoAuto.php” que cargue un nuevo registro en la tabla auto de la base de datos. 
Se debe chequear antes que la persona dueña del auto ya se encuentre cargada en la base de datos,
de no ser así mostrar un link a la página que permite carga una nueva persona. 
Se debe mostrar un mensaje que indique si se pudo o no cargar los datos Utilizar css y validaciones
javaScript cuando crea conveniente. Recordar usar la capa de
control antes generada, no se puede acceder directamente a las clases del ORM.

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Nuevo Auto</title>
</head>
<body>
    <div class="conteiner" align="center">
        <form action="Action/accionNuevoAuto.php" method="post">
            <label for="Patente">Patente:</label><br>
            <input type="text" name="Patente" id="Patente" placeholder="Ingrese la  patente" required><br>

            <label for="Marca">Marca:</label><br>
            <input type="text" name="Marca" id="Marca" placeholder="Ingrese la  Marca" required><br>

            <label for="Modelo">Modelo:</label><br>
            <input type="text" name="Modelo" id="Modelo" placeholder="Ingrese el Modelo" required><br>

            <label for="DniDuenio">Dni Dueño:</label><br>
            <input type="text" name="DniDuenio" id="DniDuenio" placeholder="Ingrese dni protietario" required><br>
            <input type="hidden" id="accion" name="accion" value="nuevo">

            <input type="submit" value="Enviar">
        </form>
    </div>
    
</body>
</html>


