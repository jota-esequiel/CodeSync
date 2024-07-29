<?php 

/**
 * Arquivo de Query's para as cidades
 */

function sql001() {
    $strQuery = "SELECT 
                    SZACIDADE,
                    SZAUF,
                    SZAIGBE
                    FROM SZA010
                ";
    return $strQuery;
}

?>