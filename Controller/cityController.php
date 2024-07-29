<?php 

include '../Controller/Component/HoldComponent.php';
include '../Model/Entity/city.php';

$strPdo = bdConnect();
$strQuery = sql001();

$strStmt = $strPdo->prepare($strQuery);
$strStmt->execute();
$strResult = $strStmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Cidades</title>
</head>
<body>
    <table border = '1px'>
        <tr>
            <td>Cidade</td>
            <td>UF</td>
            <td>IBGE</td>
        </tr>

        <?php foreach ($strResult as $item) { ?>
            <tr>
                <td><?php echo $item['SZACIDADE'] ?></td>
                <td><?php echo $item['SZAUF'] ?></td>
                <td><?php echo $item['SZAIGBE'] ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>