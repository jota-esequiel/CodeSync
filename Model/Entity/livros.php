<?php 

function sql010() {
    $strQuery = "SELECT 
                    LIVNOME, 
                    LIVPRICE,
                    LIVDESC,
                    GENNOME
                    FROM LIV010 LIV
                    LEFT JOIN GEN010 GEN
                        ON GEN.GENCOD = LIV.GENCOD
                ";
    return $strQuery;
}

?>