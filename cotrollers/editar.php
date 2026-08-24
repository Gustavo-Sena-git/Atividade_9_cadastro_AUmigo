<?php
require_once "../config/conexao.php";

$id           = $_POST["id"] ?? '';
$nome         = trim($_POST["nome"] ?? '');
$idade        = $_POST["idade"] ?? '';
$animal       = $_POST["animal"] ?? '';
$animal_outro = ($animal == "outro") ? ($_POST["animal_outro"] ?? '') : null;
$raca         = trim($_POST["raca"] ?? '');
$sexo         = $_POST["sexo"] ?? '';
$porte        = $_POST["porte"] ?? '';
$usuario_id   = $_POST["usuario_id"] ?? '';

if (empty($id) || empty($nome) || empty($idade) || empty($animal) || empty($raca) || empty($sexo) || empty($porte) || empty($usuario_id)) {
    echo "Preencha todos os campos obrigatórios!";
    exit;
}

$sql = "UPDATE animal SET nome = ?, idade = ?, animal = ?, animal_outro = ?, raca = ?, sexo = ?, porte = ?, usuario_id = ? WHERE id = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("sisssssii", $nome, $idade, $animal, $animal_outro, $raca, $sexo, $porte, $usuario_id, $id);

if ($stmt->execute()) {
    header("Location: ../pages/listaAnimais.php");
    exit;
} else {
    echo "Erro ao atualizar animal: " . $stmt->error;
}

$stmt->close();
$conexao->close();
?>