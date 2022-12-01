<?php

function registrarCita($nutriologo, $nombre_usuario) {
    require_once  realpath(dirname(__FILE__) . '/../coneccion.php');
    $conn = getConeccion('no_more_fat_db');

    $sql = 'INSERT INTO citas (id_nutriologo, nombre_usuario, fecha_vencimiento) VALUES (?, ?, ?)';
    $stmt = mysqli_prepare($conn, $sql);
    $diaHoy = date('Y-m-d');
    $fecha_vencimiento =  ( date('Y-m-d', strtotime($diaHoy . ' + 7 days')) );
    mysqli_stmt_bind_param($stmt, 'iss', $nutriologo, $nombre_usuario, $fecha_vencimiento);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

?>