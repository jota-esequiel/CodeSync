<?php 

include '../Controller/Component/HoldComponent.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = [
        'LIVNOME'  => $_POST['LIVNOME'],
        'LIVPRICE' => $_POST['LIVPRICE'],
        'LIVDESC'  => $_POST['LIVDESC'],
        'GENCOD'   => $_POST['GENCOD']
    ];

    try {
        $strPdo = bdConnect();

        if (insert($strPdo, 'INSERT', 'LIV010', $dados)) {
            echo 'Livro cadastrado com sucesso!';
        } else {
            echo 'Falha ao cadastrar o livro.';
        }
    } catch (Exception $e) {
        echo 'Erro: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Livro</title>
</head>
<body>
    <h1>Cadastro de Livro</h1>
    <form method="POST">
        <label for="LIVNOME">Nome:</label>
        <input type="text" id="LIVNOME" name="LIVNOME" required>
        <br>

        <label for="LIVPRICE">Preço:</label>
        <input type="number" step="0.01" id="LIVPRICE" name="LIVPRICE" required>
        <br>

        <label for="LIVDESC">Descrição:</label>
        <textarea id="LIVDESC" name="LIVDESC" rows="4" cols="50" required></textarea>
        <br>

        <label for="GENCOD">Gênero:</label>
        <select id="GENCOD" name="GENCOD" required>
            <option value="">Selecione um gênero</option>
            <?php
            // Conectar ao banco de dados
            $strPdo = bdConnect();

            // Executar a consulta para buscar gêneros
            $sql = 'SELECT * FROM GEN010';
            try {
                $stmt = $strPdo->query($sql);
                $generos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if ($generos) {
                    foreach ($generos as $genero) {
                        echo '<option value="' . htmlspecialchars($genero['GENCOD']) . '">'
                            . htmlspecialchars($genero['GENNOME']) . '</option>';
                    }
                } else {
                    echo '<option value="">Nenhum gênero disponível</option>';
                }
            } catch (PDOException $e) {
                echo '<option value="">Erro ao carregar gêneros</option>';
                echo '<p>Erro: ' . $e->getMessage() . '</p>';
            }
            ?>
        </select>
        <br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>



