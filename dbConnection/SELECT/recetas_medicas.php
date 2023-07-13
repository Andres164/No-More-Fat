<?php

function obtenerLlaveAIActual() {
    require_once  realpath(dirname(__FILE__) . '/../coneccion.php');
    $conn = getConeccion('no_more_fat_db');
    $result = mysqli_query($conn, 'SELECT folio FROM recetas_medicas ORDER BY folio DESC LIMIT 1');
    mysqli_close($conn);
    return $result;
}

?>