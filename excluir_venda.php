<?php
include 'conexao.php'; // Conexão com o banco de dados

if (isset($_POST['id_venda'])) {
    $id_venda = $_POST['id_venda'];

    // Exclui o cliente baseado no ID
    $sql = "DELETE FROM vendas WHERE id_venda = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_venda);
    $stmt->execute();

    // Redireciona para o relatório após a exclusão
    header("Location: relatorios.php");
    exit();
} else {
    echo "ID da venda não informado.";
}
?>