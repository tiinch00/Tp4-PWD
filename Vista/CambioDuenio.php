



/**– Crear una página “CambioDuenio.php” que contenga un formulario en donde se solicite el
numero de patente de un auto y un numero de documento de una persona, estos datos deberán ser enviados
a una página “accionCambioDuenio.php” en donde se realice cambio del dueño del auto de la patente
ingresada en el formulario. Mostrar mensajes de error en caso de que el auto o la persona no se encuentren
cargados. Utilizar css y validaciones javaScript cuando crea conveniente.  */

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio Dueño</title>
</head>
<body>
    <div class="conteiner">
        <form action="Action/accionCambioDuenio.php" method="POST">
            <label for="Patente">Ingrese patente:</label><br>
            <input type="text" id="Patente" name="Patente" placeholder="Ingrese Patente" required><br>

            <label for="NroDni">Documento:</label><br>
            <input type="text" id="NroDni" name="NroDni" placeholder="Ingrese Documento" required><br>

            <input type="submit" value="Cambiar">
        </form>
    </div>
    
</body>
</html>