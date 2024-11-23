<?php
include 'conexao.php'; // Conexão com o banco de dados

if (isset($_POST['id_cliente'])) {
    $id_cliente = $_POST['id_cliente'];

    // Exclui o cliente baseado no ID
    $sql = "DELETE FROM clientes WHERE id_cliente = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_cliente);
    $stmt->execute();

    // Redireciona para o relatório após a exclusão
    header("Location: relatorios.php");
    exit();
} else {
    echo "ID do cliente não informado.";
}
?>
