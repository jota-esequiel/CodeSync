<?php 
/**
 * 23.07.2024 
 * Arquivo de funcionalidade padrão do sistema.
 * 
 * @author João Vitor Esequiel Vieira
 */





/**
 * 23.07.2024
 * @param string $host -> String que aloca o hostServer 
 * @param string $bd   -> String que aloca o nome do BD acessível
 * @param string $user -> String que aloca o usuário do BD
 * @param string $pass -> String que seta uma senha de acesso ao BD
 * @author João Vitor Esequiel Vieira
 */
if (function_exists('bdConnect')) {
    function bdConnect() {
        $host = 'localhost';
        $bd   = 'codesync';
        $user = 'root';
        $pass = '';

        try {
            $strPdo = new PDO("mysql:host=$host;dbname=$bd", $user, $pass);
            $strPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $strPdo;
        } catch (PDOException $PDO) {
            die ("Aconteceu algum problema ao se conectar com o banco de dados " . $bd . " " . $PDO->getMessage());
        }
    }
}
?>