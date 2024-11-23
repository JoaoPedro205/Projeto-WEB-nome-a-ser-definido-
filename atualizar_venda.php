<?php
include 'conexao.php';

// Verifica se os dados foram enviados
if (isset($_POST['id_venda'], $_POST['id_cliente'], $_POST['id_veiculo'], $_POST['id_vendedor'], $_POST['data_venda'])) {
    $id_venda = $_POST['id_venda'];
    $id_cliente = $_POST['id_cliente'];
    $id_veiculo = $_POST['id_veiculo'];
    $id_vendedor = $_POST['id_vendedor'];
    $data_venda = $_POST['data_venda'];

    // Atualiza os dados da venda
    $sql = "UPDATE vendas 
            SET id_cliente = ?, id_veiculo = ?, id_vendedor = ?, data_venda = ?
            WHERE id_venda = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiisi", $id_cliente, $id_veiculo, $id_vendedor, $data_venda, $id_venda);

    if ($stmt->execute()) {
        header("Location: relatorios.php");
        exit();
    } else {
        echo "Erro ao atualizar a venda: " . $stmt->error;
    }

    // Fecha a conexão
    $stmt->close();
    $conn->close();
} else {
    echo "Dados incompletos para atualizar a venda.";
}
?>
