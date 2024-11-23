<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Veículo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>JP Veiculos</h1>
    <?php include('menu.php'); ?>
    <form action="processa_veiculo.php" method="POST">
        <h2>Dados do Veículo</h2>
        <label for="modeloVeiculo">Modelo do Veículo:</label>
        <input type="text" id="modeloVeiculo" name="modeloVeiculo" required>
        
        <label for="marcaVeiculo">Marca:</label>
        <input type="text" id="marcaVeiculo" name="marcaVeiculo" required>
        
        <label for="anoVeiculo">Ano:</label>
        <input type="text" id="anoVeiculo" name="anoVeiculo" required>
        
        <label for="precoVeiculo">Preço:</label>
        <input type="number" id="precoVeiculo" name="precoVeiculo" required>

        <button type="submit">Próximo: Cadastro de Venda</button>
    </form>
</body>
</html>