<?php 

include '../Controller/Component/HoldComponent.php';
include '../Model/Entity/livros.php';

$strQuery = sql010();
$execQuery = execQuery($strQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query dos Livros</title>
</head>
<body>
    <table border = "1px">
        <tr>
            <td>LIVRO</td>
            <td>DESCRIÇÃO</td>
            <td>PREÇO</td>
            <td>GÊNERO</td>
        </tr>

        <?php foreach ($execQuery as $item) { ?>
            <tr>
                <td><?php echo $item['LIVNOME'] ?></td>
                <td><?php echo $item['LIVPRICE'] ?></td>
                <td><?php echo $item['LIVDESC'] ?></td>
                <td><?php echo $item['GENNOME'] ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>