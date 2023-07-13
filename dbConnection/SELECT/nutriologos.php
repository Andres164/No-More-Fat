<?php
function selectNutriologos($nombre) {
    require_once  realpath(dirname(__FILE__) . '/../coneccion.php');
    $conn = getConeccion('no_more_fat_db');
    $sql = 'SELECT * FROM nutriologos WHERE nombre = ?';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $nombre);
    mysqli_stmt_execute($stmt);
    $nutriologo = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    return $nutriologo;
}
?>