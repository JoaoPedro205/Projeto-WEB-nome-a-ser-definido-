<?php
include 'conexao.php'; // Conexão com o banco de dados

// Verifica se os dados foram enviados
if (isset($_POST['id_veiculo'], $_POST['modelo'], $_POST['marca'], $_POST['ano'])) {
    $id_veiculo = $_POST['id_veiculo'];
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $ano = $_POST['ano'];

    // Atualiza os dados do veículo
    $sql = "UPDATE veiculos SET modelo = ?, marca = ?, ano = ? WHERE id_veiculo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $modelo, $marca, $ano, $id_veiculo);
    
    if ($stmt->execute()) {
        // Redireciona para relatorios_veiculos.php após a atualização
        header("Location: relatorios.php");
        exit();
    } else {
        echo "Erro ao atualizar veículo: " . $stmt->error;
    }
} else {
    echo "Dados não recebidos corretamente.";
}

$conn->close();
?>
