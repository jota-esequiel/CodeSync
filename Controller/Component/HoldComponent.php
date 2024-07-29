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


function execQuery($strQuery) {
    try {
        $strPdo = bdConnect();    
        $strStmt = $strPdo->prepare($strQuery);

        if (!$strStmt) {
            die("Erro ao preparar a consulta ao banco de dados!");
        }

        $strStmt->execute();
        $strResult = $strStmt->fetchAll(PDO::FETCH_ASSOC);

        return $strResult;
        
    } catch (PDOException $error) {
        die("Erro ao executar à consulta ao banco de dados! " . $error->getMessage());
    } 
}


///////////////////////////////////////////////////////////////


// function insertUsers(PDO $pdo, $operation, $table, array $values) {
//     if ($operation !== 'INSERT') {
//         throw new InvalidArgumentException('Operação não suportada.');
//     }
    
//     // Cria a parte de campos e valores da consulta SQL
//     $fields = implode(', ', array_keys($values));
//     $placeholders = ':' . implode(', :', array_keys($values));
    
//     // Monta a consulta SQL
//     $sql = "INSERT INTO $table ($fields) VALUES ($placeholders)";
    
//     try {
//         $stmt = $pdo->prepare($sql);
        
//         // Associa os valores aos parâmetros
//         foreach ($values as $key => $value) {
//             $stmt->bindValue(":$key", $value);
//         }
        
//         return $stmt->execute();
//     } catch (PDOException $e) {
//         echo 'Erro ao inserir: ' . $e->getMessage();
//         return false;
//     }
// }


////////////////////////////////////////////////////////////////

/**
 * 28.07.2024
 * @param string strPdo -> Prepara o INSERT.
 * @param string operaction -> Compara se o parâmetro passado é um INSERT.
 * @param string bdTable -> Tabela na qual será feito o INSERT.
 * @param array cmps -> Um array com as informações do campos a serem inseridos.
 * @author João Vitor
 */
function insert($strPdo, $operation, $bdTable, $cmps = []) {
    if ($operation !== 'INSERT') {
        throw new InvalidArgumentException('Acredito que não seja uma inserção! Verifique se está tentando fazer um INSERT!');
    }

    $cmpsValue = implode(', ', array_keys($cmps));
    $bindValue = ':' . implode(', :', array_keys($cmps));

    $strSQL = "INSERT INTO $bdTable ($cmpsValue) VALUES ($bindValue)";

        try {
            $strStmt = $strPdo->prepare($strSQL);

            foreach ($cmps as $keys => $cmpsKey) {
                $strStmt->bindValue(":$keys", $cmpsKey);
            }

        return $strStmt->execute();

        } catch (PDOException $error) {
            echo 'Aconteceu algum problema ao INSERIR os dados no banco de dados! ' . $error->getMessage();
        return false;
    }
}


function dateFormat($dateFormat) {
    if (strpos($dateFormat, "-") !== false) {
        $dateArray = explode('-', $dateFormat);
        if (count($dateArray) == 3) {
            return $dateArray[2] . '/' . $dateArray[1] . '/' . $dateArray[0];
        }
    }
    return $dateFormat;
}


/**
 * 25.07.2024
 * @param int $date | Parâmetro inteiro que recebe a hora atual e verifica se é "Bom dia", "Boa tarde" ou "Boa noite"
 * @author João Vitor
 */
function saudar() {
    date_default_timezone_set('America/Sao_Paulo');

    $hour = (int)date('H');

    if ($hour > 0 && $hour < 12) {
        return "Bom dia!";
    } elseif ($hour > 12 && $hour < 18) {
        return "Boa tarde!";
    } else {
        return "Boa noite!";
    }
}



/**
 * Função para atualizar registros no banco de dados.
 *
 * @param PDO $strPdo Objeto PDO para conexão com o banco de dados.
 * @param string $operation Tipo de operação (deve ser 'UPDATE').
 * @param string $bdTable Nome da tabela onde o registro será atualizado.
 * @param array $cmps Associativo de campos e valores para atualizar.
 * @param array $bindValue Associativo de campos e valores para a condição WHERE.
 * @return bool Retorna true se a atualização foi bem-sucedida, caso contrário false.
 * @throws InvalidArgumentException Se o tipo de operação não for 'UPDATE'.
 */
function update($strPdo, $operation, $bdTable, $cmps = [], $bindValue = []) {
    if($operation !== 'UPDATE') {
        throw new InvalidArgumentException('A ação chamada não é um UPDATE!');
    }

    if(empty($cmps) || empty($bindValue)) {
        throw new InvalidArgumentException('É necessário fornecer os campos para a atualização de dados!');
    }

    $setParts = [];
    foreach ($cmps as $key => $keyValues) {
        $setParts[] = "$key = :$key";
    }
    $setClause = implode(', ', $setParts);

    $whereParts = [];
    foreach ($cmps as $key => $keyValues) {
        $whereParts[] = "$key = :$key";
    }
    $whereClause = implode(' AND ', $whereParts);

    $strSQL = "UPDATE $bdTable SET $setClause WHERE $whereClause";

    try {
        $strStmt = $strPdo->prepare($strSQL);

        foreach ($cmps as $key => $keyValues) {
            $strStmt->bindValue(":$key", $keyValues);
        }

        foreach ($bindValue as $key => $keyValues) {
            $strStmt->bindValue(":$key", $keyValues);
        }

        return $strStmt->execute();

    } catch (PDOException $error) {
        echo 'Aconteceu algo ao atualizar os dados! ' . $error->getMessage();
        return false;
    }
}
?>  