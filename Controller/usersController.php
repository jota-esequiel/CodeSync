<?php 
include '../Controller/Component/HoldComponent.php';
include '../Model/Entity/users.php';

$strQuery = sql001();
$execQuery = execQuery($strQuery);
$item = [];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query dos Usuários</title>
</head>
<body>
    <table border="1px">
        <tr>
            <td>USUÁRIO</td>
            <td>CPF</td>
            <td>DATA DE NASCIMENTO</td>
            <td>EMAIL</td>
            <td>SEXO</td>
            <td>TIPO DE USUÁRIO</td>
            <td>STATUS</td>
            <td>CIDADE</td>
        </tr>

    <?php foreach ($execQuery as $item) { ?>
        <tr>
            <td><?php echo $item['QI2NOME'] ?></td>
            <td><?php echo $item['QI2CPF'] ?></td>
            <td><?php echo $item['QI2DTNASC'] ?></td>
            <td><?php echo $item['QI2EMAIL'] ?></td>
            <td><?php echo $item['QI2SEXO'] ?></td>
            <td><?php echo $item['QI2TIPO'] ?></td>
            <td><?php echo $item['QI2ATIVO'] ?></td>
            <td><?php echo $item['QI2CIDADE'] ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>