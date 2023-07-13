<?php
function selectMedicamentos() {
    require_once  realpath(dirname(__FILE__) . '/../coneccion.php');
    $conn = getConeccion('no_more_fat_db');
    $sql = 'SELECT * FROM medicamentos';
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}
?>