<?php

session_start();

require_once './banco.php';
require_once './ajudantes.php';

$id = $_GET['id'];

$tarefa = buscar_tarefa_por_id($conexao, $_GET['id']);

if(isset($_GET['nome']) && $_GET['nome'] != ''){
    
}

?>

<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/estilo.css" >
    <title>Editar Tarefas</title>
</head>
<body>

    <h2>Editar Tarefas</h2>
    <form action="controller-editar.php" method="post">
            <input type="hidden" name="id" value="<?=$tarefa['id'];?>">
            <fieldset>
                <legend>Editar Tarefa</legend>
                <label for="nome">
                    Tarefa:
                    <input type="text" name="nome" value="<?=$tarefa['nome'];?>"> 
                </label>
        
                <label for="descricao">
                    Descrição (Opcional):
                    <textarea name="descricao"><?=$tarefa['descricao'];?></textarea>
                </label>
                
                <label for="pazo">
                    Prazo (Opcional):
                    <input type="text" name="prazo" value="<?=traduz_data_para_exibir($tarefa['prazo']);?>">
                </label>
                
                <fieldset>
                    <legend>Prioridade:</legend>
                    <label for="prioridade">
                        <input type="radio" name="prioridade" value="1" 
                            <?php echo ($tarefa['prioridade'] == 1) ? 'checked' : ''; ?> />
                        Baixa
                        
                        <input type="radio" name="prioridade" value="2"
                            <?php echo ($tarefa['prioridade'] == 2) ? 'checked' : ''; ?> />
                        Média
                        
                        <input type="radio" name="prioridade" value="3"
                            <?php echo ($tarefa['prioridade'] == 3) ? 'checked' : ''; ?> />
                        Alta
                    </label>
                </fieldset> 
                
                <label for="concluida">
                    Tarefa Concluída:
                    <input type="checkbox" name="concluida" value="1"
                       <?php echo ($tarefa['concluida']) ? 'checked' : ''; ?> />
                </label>
                
                <input type="submit" value="Salvar">
            </fieldset>
        </form>
        
    <p><a href="exibe-tarefa.php">Voltar</a></p>
    
</body>
</html>