<?php
include 'conexao.php'; // Conexão com o banco de dados

if (isset($_POST['id_veiculo'])) {
    $id_veiculo = $_POST['id_veiculo'];

    // Exclui o cliente baseado no ID
    $sql = "DELETE FROM veiculos WHERE id_veiculo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_veiculo);
    $stmt->execute();

    // Redireciona para o relatório após a exclusão
    header("Location: relatorios.php");
    exit();
} else {
    echo "ID do veiculo não informado.";
}
?>