<?php 
/**
 * Arquivo que retona Query das categorias
 */


function sql001() {
    $strQuery = "SELECT 
                    Z69CAT,
                    CASE Z69STATUS
                        WHEN 'S' THEN 'Ativo'
                        WHEN 'N' THEN 'Inativo'
                    END Z69STATUS
                    FROM Z69010
                ";
    return $strQuery;
}
?>