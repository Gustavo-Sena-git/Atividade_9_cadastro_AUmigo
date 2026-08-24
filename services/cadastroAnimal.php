<?php

require_once "../config/conexao.php";

$nome  = $_POST["nome"];
$idade = $_POST["idade"];
$animal = $_POST["animal"];
$animal_outro = ($animal == "outro") ? $_POST["animal_outro"] : null;
$raca  = $_POST["raca"];
$sexo  = $_POST["sexo"];
$porte = $_POST["porte"];
$usuario_id = $_POST["usuario_id"];

if ($nome == "" || $idade == "" || $animal == "" || $raca == "" || $sexo == "" || $porte == "" || $usuario_id == "") {
    echo "Preencha todos os campos";
    exit();
}

if ($animal == "outro" && ($animal_outro == "" || $animal_outro === null)) {
    echo "Especifique o tipo do animal";
    exit();
}

$sql = "INSERT INTO animal (nome, idade, animal, animal_outro, raca, sexo, porte, usuario_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conexao->prepare($sql);

if (!$stmt) {
    die("Erro ao preparar a query: " . $conexao->error);
}

$stmt->bind_param("sisssssi", $nome, $idade, $animal, $animal_outro, $raca, $sexo, $porte, $usuario_id);

if ($stmt->execute()) {
    header("Location: ../pages/indexCliente.php");
    exit();
} else {
    echo "Erro de cadastro com banco: " . $stmt->error;
}

$stmt->close();
$conexao->close();
?>