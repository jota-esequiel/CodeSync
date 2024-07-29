<?php 
include '../Controller/Component/HoldComponent.php';

$strPdo = bdConnect();
$strQuery = "SELECT
                AF8NOME, 
                AF8DESC,
                AF8VALOR,
                Z69CAT AS AF8CATEGORIA
                FROM AF8010 AF8
                LEFT JOIN Z69010 Z69
                    ON Z69.Z69COD = AF8.Z69COD
            ";

$strStmt = $strPdo->prepare($strQuery);
$strStmt->execute();
$strResult = $strStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query dos Produtos</title>
</head>
<body>
    <table border = '1px'>
        <tr>
            <td>PRODUTO</td>
            <td>DESCRIÇÃO</td>
            <td>VALOR</td>
            <td>CATEGORIA</td>
        </tr>

        <?php foreach ($strResult as $item) { ?>
            <tr>
                <td><?php echo $item['AF8NOME'] ?></td>
                <td><?php echo $item['AF8DESC'] ?></td>
                <td><?php echo $item['AF8VALOR'] ?></td>
                <td><?php echo $item['AF8CATEGORIA'] ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>