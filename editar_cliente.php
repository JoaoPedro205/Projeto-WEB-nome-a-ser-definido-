<?php
include 'conexao.php'; // Conexão com o banco de dados

// Verifica se o ID foi enviado
if (isset($_POST['id_cliente'])) {
    $id_cliente = $_POST['id_cliente'];

    // Consulta os dados do cliente com base no ID
    $sql = "SELECT * FROM clientes WHERE id_cliente = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_cliente);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se o cliente existe
    if ($result->num_rows > 0) {
        $cliente = $result->fetch_assoc();
    } else {
        echo "Cliente não encontrado.";
        exit();
    }
} else {
    echo "ID do cliente não informado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Editar Cliente</h1>
    <form method="POST" action="atualizar_cliente.php">
        <input type="hidden" name="id_cliente" value="<?= $cliente['id_cliente']; ?>">
        <label for="nome_cliente">Nome:</label>
        <input type="text" name="nome_cliente" value="<?= $cliente['nome_cliente']; ?>" required><br><br>
        
        <label for="email_cliente">Email:</label>
        <input type="email" name="email_cliente" value="<?= $cliente['email_cliente']; ?>" required><br><br>
        
        <label for="telefone_cliente">Telefone:</label>
        <input type="text" name="telefone_cliente" value="<?= $cliente['telefone_cliente']; ?>" required><br><br>

        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
