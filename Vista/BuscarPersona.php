<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Buscar Persona</title>
</head>
<body>
    <div class="container vh-100 d-flex flex-column justify-content-center align-items-center">
        <h3 class="mb-4">Ingrese el DNI de la persona a buscar</h3>
        <form action="Action/accionBuscarPersona.php" method="POST" class="text-center">
            <div class="mb-3">
                <label for="NroDni" class="form-label">Documento:</label>
                <input type="text" id="NroDni" name="NroDni" class="form-control" style="width: 300px;">
            </div>
            <input type="hidden" id="accion" name="accion" value="buscar">
            <input type="submit" value="Enviar" class="btn btn-primary">
        </form>
    </div>
</body>
</html>