<?php
require_once './banco.php';

$id = $_GET['id'];

if(remover_tarefa($conexao, $id)){
    header('Location: exibe-tarefa.php?excluido=true');
} else {
    header('Location: exibe-tarefa.php?excluido=false');
}





