<?php

function traduz_prioridade($codigo){
    $prioridade;
    
    switch ($codigo) {
        case 1:
            $prioridade = "Baixa";
            break;
        case 2:
            $prioridade = "Media";
            break;;
        case 3:
            $prioridade = "Alta";
            break;
    }
    
    return $prioridade;
}

//converte a dat digitada no formulário para o formato mysql
function traduz_data_para_banco($dataForm){
    if($dataForm == ""){
        return "";
    }
    
    $dados = explode("/", $dataForm);

    $data_mysql = "{$dados[2]}-{$dados[1]}-{$dados[0]}";
    
    return $data_mysql;
}

function traduz_data_para_exibir($dataBanco){
    if(($dataBanco == "") || ($dataBanco == "0000-00-00")){
        return "";
    }
    
    $dados = explode("-", $dataBanco);
    
    $data_exibir = "{$dados[2]}/{$dados[1]}/{$dados[0]}";
    
    return $data_exibir;
}


function traduz_concluida($prioridade){
    
    $result;
    
    if($prioridade == 1){
        $result = "sim";
    }else if($prioridade == 0){
        $result = "nao";
    }else{
        $result = "prioridade indefinida";
    }
    
    return $result;
}

//verifica se o campo do nome da tarefa foi preenchido 
//de forma que a informação só poderá ser enviada via 'POST'
function tem_post(){
    if (count($_POST) > 0){
        return true;
    }
    return false;
}