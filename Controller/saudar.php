<?php
include '../Controller/Component/HoldComponent.php';
$strPdo = '';
$dados = [
    'LIVCOD' => $POST['LIVCOD'],
];
$valores = [
    'LIVCOD' => 3,
];

echo update($strPdo, 'UPDATE', 'LIV010', $dados, $valores)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Olá, esse é o meu primeiro código em php</p>
</body>
</html>