<?php

function getConeccion($DB) {
    $server = 'localhost';
    $user = 'root';
    if ( $coneccion = mysqli_connect($server, $user, NULL, $DB) ) {
        return $coneccion;
    }
    else
        return NULL;
}

?>