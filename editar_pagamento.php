<?php
include 'conexao.php'; // Conexão com o banco de dados

// Verifica se o ID foi enviado
if (isset($_POST['id_pagamento'])) {
    $id_pagamento = $_POST['id_pagamento'];

    // Consulta os dados do pagamento com base no ID
    $sql = "SELECT * FROM pagamentos WHERE id_pagamento = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_pagamento);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se o pagamento existe
    if ($result->num_rows > 0) {
        $pagamento = $result->fetch_assoc();
    } else {
        echo "Pagamento não encontrado.";
        exit();
    }
} else {
    echo "ID do pagamento não informado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pagamento</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Editar Pagamento</h1>
    <form method="POST" action="atualizar_pagamento.php">
        <input type="hidden" name="id_pagamento" value="<?= $pagamento['id_pagamento']; ?>">
        <label for="id_venda">ID Venda:</label>
        <input type="text" name="id_venda" value="<?= $pagamento['id_venda']; ?>" required><br><br>
        
        <label for="valor_pagamento">Valor:</label>
        <input type="text" name="valor_pagamento" value="<?= $pagamento['valor_pagamento']; ?>" required><br><br>
        
        <label for="data_pagamento">Data do Pagamento:</label>
        <input type="date" name="data_pagamento" value="<?= $pagamento['data_pagamento']; ?>" required><br><br>

        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
