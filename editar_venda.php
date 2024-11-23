<?php
include 'conexao.php';

// Verifica se o ID da venda foi enviado
if (isset($_POST['id_venda'])) {
    $id_venda = $_POST['id_venda'];

    // Consulta os dados da venda
    $sql = "SELECT v.id_venda, v.id_cliente, c.nome_cliente, v.id_veiculo, ve.modelo, ve.marca, v.id_vendedor, vd.nome_vendedor, v.data_venda
            FROM vendas v
            JOIN clientes c ON v.id_cliente = c.id_cliente
            JOIN veiculos ve ON v.id_veiculo = ve.id_veiculo
            JOIN vendedores vd ON v.id_vendedor = vd.id_vendedor
            WHERE v.id_venda = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_venda);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se a venda existe
    if ($result->num_rows > 0) {
        $venda = $result->fetch_assoc();
    } else {
        echo "Venda não encontrada.";
        exit();
    }
} else {
    echo "ID da venda não informado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Venda</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Editar Venda</h1>
    <form method="POST" action="atualizar_venda.php">
        <input type="hidden" name="id_venda" value="<?= $venda['id_venda']; ?>">
        
        <label for="id_cliente">Cliente:</label>
        <select name="id_cliente" required>
            <?php
            // Lista todos os clientes para seleção
            $clientes = $conn->query("SELECT id_cliente, nome_cliente FROM clientes");
            while ($cliente = $clientes->fetch_assoc()) {
                $selected = $cliente['id_cliente'] == $venda['id_cliente'] ? 'selected' : '';
                echo "<option value='{$cliente['id_cliente']}' $selected>{$cliente['nome_cliente']}</option>";
            }
            ?>
        </select><br><br>

        <label for="id_veiculo">Veículo:</label>
        <select name="id_veiculo" required>
            <?php
            // Lista todos os veículos para seleção
            $veiculos = $conn->query("SELECT id_veiculo, modelo, marca, ano FROM veiculos");
            while ($veiculo = $veiculos->fetch_assoc()) {
                $selected = $veiculo['id_veiculo'] == $venda['id_veiculo'] ? 'selected' : '';
                echo "<option value='{$veiculo['id_veiculo']}' $selected>{$veiculo['modelo']} ({$veiculo['marca']}, {$veiculo['ano']})</option>";
            }
            ?>
        </select><br><br>

        <label for="id_vendedor">Vendedor:</label>
        <select name="id_vendedor" required>
            <?php
            // Lista todos os vendedores para seleção
            $vendedores = $conn->query("SELECT id_vendedor, nome_vendedor FROM vendedores");
            while ($vendedor = $vendedores->fetch_assoc()) {
                $selected = $vendedor['id_vendedor'] == $venda['id_vendedor'] ? 'selected' : '';
                echo "<option value='{$vendedor['id_vendedor']}' $selected>{$vendedor['nome_vendedor']}</option>";
            }
            ?>
        </select><br><br>

        <label for="data_venda">Data da Venda:</label>
        <input type="date" name="data_venda" value="<?= $venda['data_venda']; ?>" required><br><br>

        <button type="submit">Salvar Alterações</button>
    </form>
</body>
</html>
