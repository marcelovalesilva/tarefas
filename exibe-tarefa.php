<?php 
require_once './controller-inserir.php';
require_once './ajudantes.php';
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/estilo.css" >
    <title>Lista de Tarefas</title>
</head>
<body>
    
    <?php
        //validaÁ„o se a tarefa foi excluida.
        if(isset($_GET['excluido'])){
            $excluido = $_GET['excluido'];
            if($excluido){
                echo "<p><strong>Tarefa removida com sucesso.</strong></p>";
            } else {
                echo "<p><strong>Tarefa nao pode ser removida.</strong></p>";
            }
        }
        
        if(isset($_GET['inserido'])){
            $inserido = $_GET['inserido'];
            if($inserido){
                echo "<p><strong>Tarefa inserida com sucesso.</strong></p>";
            }
        }
        
        if(isset($_GET['alterada'])){
            $alterada = $_GET['alterada'];
            if($alterada){
                echo "<p><strong>Tarefa atualizada com sucesso.</strong></p>";
            }
        }
    ?>
    
    <h2>Lista de Tarefas</h2>
    
    <table>
        <tr>
            <th>Tarefa</th>
            <th>Descri√ß√£o</th>
            <th>Prazo</th>
            <th>Prioridade</th>
            <th>Concluida</th>
            <th>Op√ßoes</th>
        </tr>
        
        <?php
        //busca as tarefas no banco para exibi-las
        $lista_tarefas = buscar_tarefas($conexao); 
        ?>
        
        <?php foreach ($lista_tarefas as $tarefa): ?>
        <tr>
            <td><?=$tarefa['nome']?></td>
            <td><?=$tarefa['descricao']?></td>
            <td><?php echo traduz_data_para_exibir($tarefa['prazo']); ?></td>
            <td><?php echo traduz_prioridade($tarefa['prioridade']); ?></td>
            <td><?php echo traduz_concluida($tarefa['concluida']); ?></td>
            <td>
                <button><a href="editar-tarefa.php?id=<?= $tarefa['id']; ?>">
                    Editar
                </a></button>
                <button><a href="remover-tarefa.php?id=<?= $tarefa['id']; ?>">
                    Remover
                </a></button>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
        
    <p><a href="index.php">Voltar</a></p>
        
    </body>
</html>
