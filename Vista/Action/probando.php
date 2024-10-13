<?php



function guardarComentario() {
    $comentario = $_POST['comentario'];

    // Aquí se podría procesar el comentario, filtrarlo o validarlo.

    // Incluye la funcionalidad de Commentics
    include $_SERVER['DOCUMENT_ROOT'] . '/comentarios/comments/frontend/index.php';

    // Redirigir a la página de comentarios o mostrar el comentario
    header('Location: /ruta_para_ver_comentarios');
}