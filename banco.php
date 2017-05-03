<?php

$servidor = '127.0.0.1';
$usuario = 'sistarefa';
$senha = 'X9ub5mL7HzKsGf8j';
$banco = 'tarefas';

//criação da conexão
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

//teste da conexão para detecção de falha
if(mysqli_connect_errno($conexao)){
    echo "<p>Problemas para conectar ao banco!</p>";
    die();
}

//retorna todas as tarefas salvas na tabela TAREFAS
function buscar_tarefas($conexao){
    
    $query = "SELECT * FROM tarefas";
    $result = mysqli_query($conexao, $query);
    $tarefas = array();
    
    while ($tarefa = mysqli_fetch_assoc($result)){
        $tarefas[] = $tarefa;
    }
     
    return $tarefas;
}

//insere uma nova tarefa no banco
function gravar_tarefa($conexao, $tarefa){
    $sqlGravar = "INSERT INTO tarefas (nome, descricao, prazo, prioridade, concluida) "
            . "VALUES ('{$tarefa['nome']}', '{$tarefa['descricao']}', '{$tarefa['prazo']}', {$tarefa['prioridade']}, {$tarefa['concluida']})";
    
    mysqli_query($conexao, $sqlGravar);
}

//busca no banco uma tafefa pelo seu 'ID'
function buscar_tarefa_por_id($conexao, $id){
    $query = 'SELECT * FROM tarefas WHERE id ='.$id;
    
    $resultado = mysqli_query($conexao, $query);

    return mysqli_fetch_assoc($resultado);
}

//edita uma tarefa previamente selecionada
function editar_tarefa($conexao, $tarefa){
    $sqlEditar = "UPDATE tarefas SET
                    nome = '{$tarefa['nome']}',
                    descricao = '{$tarefa['descricao']}',
                    prazo = '{$tarefa['prazo']}',
                    prioridade = {$tarefa['prioridade']},
                    concluida = {$tarefa['concluida']}
                 WHERE id={$tarefa['id']}";

    return mysqli_query($conexao, $sqlEditar);
}

//remove umregistro de tarefa do banco
function remover_tarefa($conexao, $id){
    $sqlRemover = "DELETE FROM tarefas WHERE id={$id}";
    
    mysqli_query($conexao, $sqlRemover);
    
}