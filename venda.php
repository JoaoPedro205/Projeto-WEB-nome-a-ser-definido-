<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Venda e Pagamento</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>JP Veiculos</h1>
    <?php include('menu.php'); ?>
    <form action="processa_venda.php" method="POST">
        <h2>Dados da Venda</h2>
        <label for="clienteVenda">ID do Cliente:</label>
        <input type="number" id="clienteVenda" name="clienteVenda" required>
        
        <label for="veiculoVenda">ID do Veículo:</label>
        <input type="number" id="veiculoVenda" name="veiculoVenda" required>
        
        <label for="dataVenda">Data da Venda:</label>
        <input type="date" id="dataVenda" name="dataVenda" required>

        <h2>Dados do Vendedor</h2>
        <label for="idVendedor">ID do Vendedor:</label>
        <input type="number" id="idVendedor" name="idVendedor" required>

        <label for="nomeVendedor">Nome do Vendedor:</label>
        <input type="text" id="nomeVendedor" name="nomeVendedor" required>
        
        <h2>Dados do Pagamento</h2>
        <label for="valorPagamento">Valor do Pagamento:</label>
        <input type="number" step="0.01" id="valorPagamento" name="valorPagamento" required>
        
        <label for="dataPagamento">Data do Pagamento:</label>
        <input type="date" id="dataPagamento" name="dataPagamento" required>

        <button type="submit">Finalizar Cadastro</button>
    </form>
</body>
</html>