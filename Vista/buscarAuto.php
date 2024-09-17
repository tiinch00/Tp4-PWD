<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Buscar Auto</title>
</head>
<body>
    <div class="conteiner"  align="center">
        <form action="Action/accionBuscarAuto.php" method="post">
            <label for="Patente">Ingrese patente</label>
            <input type="text" name="Patente" id="Patente" required>
            <input id="accion" name ="accion" value="buscarPatente" type="hidden">
            <input type="submit" value="Enviar">
        </form>
    </div>
    
</body>
</html>