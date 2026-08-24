<?php

$conexao = new mysqli("localhost", "root", "", "atividade9_cadastro_aumigo_Gs");

if ($conexao->connect_error){
    die("Erro na conexão com o banco: ". $conexao->connect_error);
}

$conexao->set_charset("utf8");

?>