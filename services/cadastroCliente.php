<?php

require_once "../config/conexao.php";

$nome = $_POST["nome"];
$telefone = $_POST["telefone"];
$CPF = $_POST["cpf"];

if($nome == "" || $telefone == "" || $CPF == ""){
    echo "preencha todos os campos";
}

$sql = "insert into cliente (nome, telefone, cpf) values (?, ?, ?)";

 $stmt = $conexao->prepare($sql);

$stmt->bind_param("sss", $nome, $telefone, $CPF);

if($stmt->execute()){
    header("Location:../pages/indexCliente.php");
    exit();
}else{
    echo "Erro de cadastro  com banco: ". $stmt->error;
}

$stmt->close();
$conexao->close();
?>