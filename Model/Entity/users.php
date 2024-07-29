<?php 
/**
 * Model
 */


function sql001() {
    $strQuery = "SELECT 	
                    QI2NOME, 
                    QI2CPF, 
                    QI2DTNASC,
                    QI2EMAIL,
                    CASE QI2SEXO
                        WHEN 'M' THEN 'Masculino'
                        WHEN 'F' THEN 'Feminino'
                    END QI2SEXO,
                    CASE QI2TIPO
                        WHEN 'A' THEN 'Administrador'
                        WHEN 'C' THEN 'Cliente'
                    END QI2TIPO,
                    CASE QI2ATIVO
                        WHEN 'S' THEN 'Ativo'
                        WHEN 'N' THEN 'Inativo'
                    END QI2ATIVO,
                    SZACIDADE AS QI2CIDADE
                    FROM QI2010 QI2
                    LEFT JOIN SZA010 SZA
                        ON SZA.SZACOD = QI2.SZACOD
                    WHERE 1=1 
                ";
    return $strQuery;
}
?>