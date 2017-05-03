<?php

require_once './banco.php';
require_once './ajudantes.php';

session_start();

if(isset($_POST['nome']) && $_POST['nome'] != ""){
    $tarefa = array();
    
    $tarefa['id'] = $_POST['id'];
    
    $tarefa['nome'] = $_POST['nome'];
    
    if(isset($_POST['descricao'])){
        $tarefa['descricao'] = $_POST['descricao'];
    } else {
        $tarefa['descricao'] = "";
    }
    
    if(isset($_POST['prazo'])){
        $tarefa['prazo'] = traduz_data_para_banco($_POST['prazo']);
    }else{
        $tarefa['prazo'] = "0000-00-00";
    }    
    
    $tarefa['prioridade'] = $_POST['prioridade'];
    
    if(isset($_POST['concluida'])){
        $tarefa['concluida'] = 1;
    }else{
        $tarefa['concluida'] = 0;
    }
    
    editar_tarefa($conexao, $tarefa);
    
}

header('Location: exibe-tarefa.php?alterada=true');
die();