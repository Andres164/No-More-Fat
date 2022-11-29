<?php

function registrarPaciente($usuario) {
    require_once  realpath(dirname(__FILE__) . '/../coneccion.php');
    $conn = getConeccion('no_more_fat_db');

    $sql = 'INSERT INTO pacientes VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ssssssss', $usuario['nombre_usuario'], $usuario['password'], $usuario['email'], $usuario['nombre'], $usuario['apellidos'], $usuario['direccion'], $usuario['estado'], $usuario['codigo_postal']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

?>