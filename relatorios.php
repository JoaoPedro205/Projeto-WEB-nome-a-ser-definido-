<?php
include 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>JP Veiculos</h1>
        <?php include('menu.php'); ?>

        <!-- Relatório de Clientes -->
        <h2>Relatório de Clientes</h2>
        <table border="1" cellpadding="10">
            <tr>
                <th>ID Cliente</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
            <?php
            $sql_clientes = "SELECT id_cliente, nome_cliente, email_cliente, telefone_cliente FROM clientes";
            $result_clientes = $conn->query($sql_clientes);
            if ($result_clientes && $result_clientes->num_rows > 0) {
                while($row = $result_clientes->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id_cliente']}</td>
                            <td>{$row['nome_cliente']}</td>
                            <td>{$row['email_cliente']}</td>
                            <td>{$row['telefone_cliente']}</td>
                            <td>
                                <form style='display:inline;' method='POST' action='editar_cliente.php'>
                                    <input type='hidden' name='id_cliente' value='{$row['id_cliente']}'>
                                    <button type='submit'>Editar</button>
                                </form>
                                <form style='display:inline;' method='POST' action='excluir_cliente.php'>
                                    <input type='hidden' name='id_cliente' value='{$row['id_cliente']}'>
                                    <button type='submit' onclick='return confirm(\"Deseja realmente excluir?\");'>Excluir</button>
                                </form>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Nenhum cliente encontrado.</td></tr>";
            }
            ?>
        </table>

        <!-- Relatório de Veículos -->
        <h2>Relatório de Veículos</h2>
        <table border="1" cellpadding="10">
            <tr>
                <th>ID Veículo</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Ano</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
            <?php
            $sql_veiculos = "SELECT id_veiculo, modelo, marca, ano, preco FROM veiculos";
            $result_veiculos = $conn->query($sql_veiculos);
            if ($result_veiculos && $result_veiculos->num_rows > 0) {
                while($row = $result_veiculos->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id_veiculo']}</td>
                            <td>{$row['modelo']}</td>
                            <td>{$row['marca']}</td>
                            <td>{$row['ano']}</td>
                            <td>{$row['preco']}</td>
                            <td>
                                <form style='display:inline;' method='POST' action='editar_veiculo.php'>
                                    <input type='hidden' name='id_veiculo' value='{$row['id_veiculo']}'>
                                    <button type='submit'>Editar</button>
                                </form>
                                <form style='display:inline;' method='POST' action='excluir_veiculo.php'>
                                    <input type='hidden' name='id_veiculo' value='{$row['id_veiculo']}'>
                                    <button type='submit' onclick='return confirm(\"Deseja realmente excluir?\");'>Excluir</button>
                                </form>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nenhum veículo encontrado.</td></tr>";
            }
            ?>
        </table>

        <!-- Relatório de Vendas -->
        <h2>Relatório de Vendas</h2>
        <table border="1" cellpadding="10">
            <tr>
                <th>ID Venda</th>
                <th>Cliente</th>
                <th>Veículo</th>
                <th>ID Vendedor</th>
                <th>Vendedor</th>
                <th>Data da Venda</th>
                <th>Ações</th>
            </tr>
            <?php
            $sql_vendas = "SELECT v.id_venda, c.nome_cliente, ve.modelo, ve.marca, ve.ano, vd.id_vendedor, vd.nome_vendedor, v.data_venda
                           FROM vendas v
                           JOIN clientes c ON v.id_cliente = c.id_cliente
                           JOIN veiculos ve ON v.id_veiculo = ve.id_veiculo
                           JOIN vendedores vd ON v.id_vendedor = vd.id_vendedor";
            $result_vendas = $conn->query($sql_vendas);
            if ($result_vendas && $result_vendas->num_rows > 0) {
                while($row = $result_vendas->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id_venda']}</td>
                            <td>{$row['nome_cliente']}</td>
                            <td>{$row['modelo']} ({$row['marca']}, {$row['ano']})</td>
                            <td>{$row['id_vendedor']}</td>
                            <td>{$row['nome_vendedor']}</td>
                            <td>{$row['data_venda']}</td>
                            <td>
                                <form style='display:inline;' method='POST' action='editar_venda.php'>
                                    <input type='hidden' name='id_venda' value='{$row['id_venda']}'>
                                    <button type='submit'>Editar</button>
                                </form>
                                <form style='display:inline;' method='POST' action='excluir_venda.php'>
                                    <input type='hidden' name='id_venda' value='{$row['id_venda']}'>
                                    <button type='submit' onclick='return confirm(\"Deseja realmente excluir?\");'>Excluir</button>
                                </form>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Nenhuma venda encontrada.</td></tr>";
            }
            ?>
        </table>

        <!-- Relatório de Pagamentos -->
        <h2>Relatório de Pagamentos</h2>
        <table border="1" cellpadding="10">
            <tr>
                <th>ID Pagamento</th>
                <th>ID Venda</th>
                <th>Valor</th>
                <th>Data do Pagamento</th>
                <th>Ações</th>
            </tr>
            <?php
            $sql_pagamentos = "SELECT p.id_pagamento, p.id_venda, p.valor_pagamento, p.data_pagamento
                               FROM pagamentos p
                               JOIN vendas v ON p.id_venda = v.id_venda";
            $result_pagamentos = $conn->query($sql_pagamentos);
            if ($result_pagamentos && $result_pagamentos->num_rows > 0) {
                while($row = $result_pagamentos->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id_pagamento']}</td>
                            <td>{$row['id_venda']}</td>
                            <td>{$row['valor_pagamento']}</td>
                            <td>{$row['data_pagamento']}</td>
                            <td>
                                <form style='display:inline;' method='POST' action='editar_pagamento.php'>
                                    <input type='hidden' name='id_pagamento' value='{$row['id_pagamento']}'>
                                    <button type='submit'>Editar</button>
                                </form>
                                <form style='display:inline;' method='POST' action='excluir_pagamento.php'>
                                    <input type='hidden' name='id_pagamento' value='{$row['id_pagamento']}'>
                                    <button type='submit' onclick='return confirm(\"Deseja realmente excluir?\");'>Excluir</button>
                                </form>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Nenhum pagamento encontrado.</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
