<?php
require_once './banco.php';
require_once './ajudantes.php';

session_start();

$tem_erros = false;
$erros_validacao = array();

        if(tem_post()){
            
            $tarefa = array();
            
            if(isset($_POST['nome']) && strlen($_POST['nome']) > 0){
                $tarefa['nome'] = $_POST['nome'];
            }else{
                $tem_erros = true;
                $erros_validacao['nome'] = 'O nome da tarefa � obrigat�rio!';
            }
            
            if(isset($_POST['descricao'])){
                $tarefa['descricao'] = $_POST['descricao'];
            } else {
                $tarefa['descricao'] = "";
            }
            
            if(isset($_POST['prazo'])){
                $tarefa['prazo'] = traduz_data_para_banco($_POST['prazo']);
            } else {
                $tarefa['prazo'] = "";
            }
            
            $tarefa['prioridade'] = $_POST['prioridade'];
            
            if(isset($_POST['concluida'])){
                $tarefa['concluida'] = 1;
            } else {
                $tarefa['concluida'] = 0;
            }
         
            if(!$tem_erros){
                gravar_tarefa($conexao, $tarefa);
                header('Location: exibe-tarefa.php?inserido=true');
                die();
            } else {
                header('Location: tarefa-template.php');
            }
               
            //criação de uma SESSION que recebe é um array.
            //$_SESSION['lista_tarefas'][] = $tarefa;
     
            /*usado quando os dados eram armazenaos em sessões
            if(isset($_SESSION['lista_tarefas'])){
                $lista_tarefas = $_SESSION['lista_tarefas'];
            }else{
                $lista_tarefas = array();
            }
            */
            
           
        }

            
            
