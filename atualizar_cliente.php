<?php
include 'conexao.php'; // Conexão com o banco de dados

// Verifica se os dados foram enviados
if (isset($_POST['id_cliente'], $_POST['nome_cliente'], $_POST['email_cliente'], $_POST['telefone_cliente'])) {
    $id_cliente = $_POST['id_cliente'];
    $nome_cliente = $_POST['nome_cliente'];
    $email_cliente = $_POST['email_cliente'];
    $telefone_cliente = $_POST['telefone_cliente'];

    // Atualiza os dados do cliente
    $sql = "UPDATE clientes SET nome_cliente = ?, email_cliente = ?, telefone_cliente = ? WHERE id_cliente = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nome_cliente, $email_cliente, $telefone_cliente, $id_cliente);
    
    if ($stmt->execute()) {
        // Se a atualização for bem-sucedida, redireciona para relatorios.php
        header("Location: relatorios.php");
        exit(); // Importante para garantir que o redirecionamento aconteça
    } else {
        echo "Erro ao atualizar cliente: " . $stmt->error;
    }
} else {
    echo "Dados não recebidos corretamente.";
}

$conn->close();
?>
