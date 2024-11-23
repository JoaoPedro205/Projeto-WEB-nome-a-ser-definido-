<?php
include 'conexao.php'; // Conexão com o banco de dados

// Verifica se o ID foi enviado
if (isset($_POST['id_veiculo'])) {
    $id_veiculo = $_POST['id_veiculo'];

    // Consulta os dados do veículo com base no ID
    $sql = "SELECT * FROM veiculos WHERE id_veiculo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_veiculo);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se o veículo existe
    if ($result->num_rows > 0) {
        $veiculo = $result->fetch_assoc();
    } else {
        echo "Veículo não encontrado.";
        exit();
    }
} else {
    echo "ID do veículo não informado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Veículo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Editar Veículo</h1>
    <form method="POST" action="atualizar_veiculo.php">
        <input type="hidden" name="id_veiculo" value="<?= $veiculo['id_veiculo']; ?>">
        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" value="<?= $veiculo['modelo']; ?>" required><br><br>
        
        <label for="marca">Marca:</label>
        <input type="text" name="marca" value="<?= $veiculo['marca']; ?>" required><br><br>
        
        <label for="ano">Ano:</label>
        <input type="text" name="ano" value="<?= $veiculo['ano']; ?>" required><br><br>

        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
