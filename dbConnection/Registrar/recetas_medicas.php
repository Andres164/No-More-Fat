<?php

    function registrarReceta($nutrologo, $userName, $pesoActual, $fecha_final, $descripcion, $medicamentos, $alimentos) {
        require_once realpath(dirname(__FILE__) . '/../coneccion.php');
        $conn = getConeccion('no_more_fat_db');
        
        $sql = 'INSERT INTO recetas_medicas (id_nutriologo, nombre_usuario, peso_inicial, fecha_final, descripcion) VALUES (?, ?, ?, ?, ?)';
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'isdss', $nutrologo, $userName, $pesoActual, $fecha_final, $descripcion);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        if($medicamentos != null) {
            require_once realpath(dirname(__FILE__) . '/../SELECT/recetas_medicas.php');
            require_once realpath(dirname(__FILE__) . '/medicamentos_receta.php');
            $folio_receta = mysqli_fetch_array(obtenerLlaveAIActual())['folio'];
            foreach($medicamentos as $medicamento) {
                registrarMedicamentos_receta($medicamento, $folio_receta);
            }
        }
        if($alimentos != null) {
            require_once realpath(dirname(__FILE__) . '/../SELECT/recetas_medicas.php');
            require_once realpath(dirname(__FILE__) . '/alimentos_receta.php');
            $folio_receta = mysqli_fetch_array(obtenerLlaveAIActual())['folio'];
            foreach($alimentos as $alimento) {
                registrarAlimentos_receta($alimento, $folio_receta);
            }
        }
        mysqli_close($conn);
    }
?>