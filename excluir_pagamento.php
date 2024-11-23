<?php
include 'conexao.php'; // Conexão com o banco de dados

if (isset($_POST['id_pagamento'])) {
    $id_pagamento = $_POST['id_pagamento'];

    // Exclui o cliente baseado no ID
    $sql = "DELETE FROM pagamentos WHERE id_pagamento = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_pagamento);
    $stmt->execute();

    // Redireciona para o relatório após a exclusão
    header("Location: relatorios.php");
    exit();
} else {
    echo "ID do pagamento não informado.";
}
?>