<?php 
include '../Model/Entity/carros.php';
include '../Controller/Component/HoldComponent.php';

$strQuery = sql001();
$execQuery = execQuery($strQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query dos Carros</title>
</head>
<body>
    <table border = '1px'>
        <tr>
            <td>CARRO</td>
            <td>ANO DE LANÇAMENTO</td>
            <td>MARCA</td>
            <td>MODELO</td>
        </tr>

        <?php foreach ($execQuery as $item) { ?>
            <tr>
                <td><?php echo $item['CARNOME'] ?></td>
                <td><?php echo dateFormat($item['CARANO']) ?></td>
                <td><?php echo $item['CARMARCA'] ?></td>
                <td><?php echo $item['CARMODELO'] ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>