<?php
    
    function registrarAlimentos_receta($id_alimento, $folio_receta) {
        require_once realpath(dirname(__FILE__) . '/../coneccion.php');
        $conn = getConeccion('no_more_fat_db');

        $sql = 'INSERT INTO alimentos_receta (id_alimento, folio_receta) VALUES (?, ?)';
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'ii', $id_alimento, $folio_receta);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
?>