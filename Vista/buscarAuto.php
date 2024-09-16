<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Auto</title>
</head>
<body>
    <div class="conteiner">
        <form action="Action/accionBuscarAuto.php" method="post">
            <label for="Patente">Ingrese patente</label>
            <input type="text" name="Patente" id="Patente" required>
            <input id="accion" name ="accion" value="buscarPatente" type="hidden">
            <input type="submit" value="Enviar">
        </form>
    </div>
    
</body>
</html>