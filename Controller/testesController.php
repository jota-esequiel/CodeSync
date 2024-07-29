<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = [
        'LIVCOD' => $POST['LIVCOD'],

    ];
}

    $strPdo = bdConnect();
    insert($strPdo, 'INSERT', 'LIV010', $dados);

?>