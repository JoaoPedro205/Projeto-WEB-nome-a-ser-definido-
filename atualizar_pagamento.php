<?php
include 'conexao.php'; // Conexão com o banco de dados

// Verifica se os dados necessários foram enviados
if (isset($_POST['id_pagamento'], $_POST['id_venda'], $_POST['valor_pagamento'], $_POST['data_pagamento'])) {
    // Coleta os dados do formulário
    $id_pagamento = $_POST['id_pagamento'];
    $id_venda = $_POST['id_venda'];
    $valor_pagamento = $_POST['valor_pagamento'];
    $data_pagamento = $_POST['data_pagamento'];

    // Atualiza o registro no banco de dados
    $sql = "UPDATE pagamentos 
            SET id_venda = ?, valor_pagamento = ?, data_pagamento = ? 
            WHERE id_pagamento = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("idsi", $id_venda, $valor_pagamento, $data_pagamento, $id_pagamento);

    if ($stmt->execute()) {
        header("Location: relatorios.php");
        exit();
    } else {
        echo "Erro ao atualizar o pagamento: " . $stmt->error;
    }

    // Fecha a conexão
    $stmt->close();
    $conn->close();
} else {
    echo "Dados incompletos para atualizar o pagamento.";
}
?>
