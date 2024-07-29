<?php 

function sql001() {

$strQuery =  " SELECT 
                    CARNOME, 
                    CARANO,
                    MARNOME AS CARMARCA,
                    CASE CARMODELO
                        WHEN '1' THEN 'Carro Normal'
                    END CARMODELO
                    FROM CAR010 CAR
                    LEFT JOIN MAR010 MAR
                        ON MAR.MARCOD = CAR.MARCOD 
            ";
    return $strQuery;
}

?>