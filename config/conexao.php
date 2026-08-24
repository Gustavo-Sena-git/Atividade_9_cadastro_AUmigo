<?php

$conexao = new mysqli("localhost", "root", "root", "atividade_cadastro_aumigo_gs");

if ($conexao->connect_error){
    die("Erro na conexão com o banco: ". $conexao->connect_error);
}

$conexao->set_charset("utf8");

?>