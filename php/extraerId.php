<?php
    function extraerId($string) {
        $id = $string[0];
        for($i = 1; $i < strlen($string); $i++) {
            if($string[$i] != ' ')
                $id = $id . $string[$i];
            else
                break;
        }
        return (int)$id;
    }
?>