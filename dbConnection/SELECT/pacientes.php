<?php
function selectPacientes($email) {
    require_once  realpath(dirname(__FILE__) . '/../coneccion.php');
    $conn = getConeccion('no_more_fat_db');
    $sql = 'SELECT * FROM pacientes WHERE email = ?';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $usuario = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    return $usuario;
}
?>