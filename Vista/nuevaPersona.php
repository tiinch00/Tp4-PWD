<?php

/**– Crear una página “NuevaPersona.php” que contenga un formulario que permita solicitar todos
los datos de una persona. Estos datos serán enviados a una página “accionNuevaPersona.php” que cargue
un nuevo registro en la tabla persona de la base de datos. Se debe mostrar un mensaje que indique si se
pudo o no cargar los datos de la persona. Utilizar css y validaciones javaScript cuando crea conveniente.
 */
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Nueva Persona</title>
 </head>
 <body>
    <div class="conteiner"  align="center">
        <form action="Action/accionNuevaPersona.php" method="post">
            <label for="NroDni">Numero Documento:</label>
            <input type="text" id="NroDni" name="NroDni" placeholder="Ingrese numero Documento" required><br>
            <label for="Apellido">Apellido:</label>
            <input type="text" id="Apellido" name="Apellido" placeholder="Ingrese su apellido" required><br>
            <label for="Nombre">Nombre:</label>
            <input type="text" name="Nombre" id="Nombre" placeholder="Ingrese su nombre" required><br>
            <label for="fechaNac">Fecha Nacimiento:</label>
            <input type="date" name="fechaNac" id="fechaNac" placeholder="Ingrese su fecha Nacimiento" required><br>
            <label for="Telefono">Telefono:</label>
            <input type="text" name="Telefono" id="Telefono" placeholder="Ingrese su telefono" required><br>
            <label for="Domicilio">Domicilio:</label>
            <input type="text" name="Domicilio" id="Domicilio" placeholder="Ingrese su domicilio"><br>
            <input type="hidden" name="accion" id="accion" value="nuevo">
            <input type="submit" value="Enviar">
            
        </form>
    </div>
    
 </body>
 </html>