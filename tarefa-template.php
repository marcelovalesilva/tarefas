<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/estilo.css">
        <title>Gerenciador de Tarefas</title>
    </head>
    <body>
        <h2>Cadastro de Tarefas</h2>
        <form action="exibe-tarefa.php" method="post">
            <fieldset>
                <legend>Nova Tarefa</legend>
                <label for="nome">
                    Tarefa:
                    <input type="text" name="nome">
                </label>
        
                <label for="descricao">
                    Descrição (Opcional):
                    <textarea name="descricao"></textarea>
                </label>
                
                <label for="pazo">
                    Prazo (Opcional):
                    <input type="text" name="prazo">
                </label>
                
                <fieldset>
                    <legend>Prioridade:</legend>
                    <label for="prioridade">
                        <input type="radio" name="prioridade" value="1" checked >
                        Baixa
                        
                        <input type="radio" name="prioridade" value="2" >
                        Média
                        
                        <input type="radio" name="prioridade" value="3">
                        Alta
                    </label>
                </fieldset> 
                
                <label for="concluida">
                    Tarefa Concluída:
                    <input type="checkbox" name="concluida" value="1">
                </label>
                
                <input type="submit" value="Cadastrar">
            </fieldset>
        </form>
            
        
        <p><a href="index.php">Voltar</a></p>
        
    
    </body>
</html>

