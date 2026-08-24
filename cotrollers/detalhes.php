<?php
require_once "../config/conexao.php";

$id = $_GET["id"] ?? '';

if (empty($id)) {
    echo "ID inválido.";
    exit;
}

$sql = "SELECT * FROM cliente WHERE id = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$clienteDados = $result->fetch_assoc();

if (!$clienteDados) {
    echo "Cliente não encontrado.";
    exit;
}
?>

<h2>Detalhes do Dono</h2>
<p><strong>Nome:</strong> <?= htmlspecialchars($clienteDados['nome']) ?></p>
<p><strong>Telefone:</strong> <?= htmlspecialchars($clienteDados['telefone']) ?></p>
<p><strong>CPF:</strong> <?= htmlspecialchars($clienteDados['cpf']) ?></p>
<a href="../pages/indexCliente.php">Voltar</a>