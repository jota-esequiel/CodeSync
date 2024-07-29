<?php 
include '../Controller/Component/HoldComponent.php';
include '../Model/Entity/category.php';

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
    <title>Consulta de Categorias</title>
</head>
<body>
    <?php echo saudar()?>

    <table border = '1px'>
        <tr>
            <td>Categoria</td>
            <td>Status</td>
        </tr>

        <?php foreach ($strResult as $item) { ?>
            <tr>
                <td><?php echo $item['Z69CAT'] ?></td>
                <td><?php echo $item['Z69STATUS'] ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>