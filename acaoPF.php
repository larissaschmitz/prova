<?php

    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    require_once ("classes/PF.class.php");

    
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $pf_id = isset($_GET['pf_id']) ? $_GET['pf_id'] : 0;
        $pf = new PF("", "", "", "");
        $resultado = $pf->excluir($pf_id);
            header("location:indexPF.php");
    }
    

    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $pf_id = isset($_POST['pf_id']) ? $_POST['pf_id'] : "";
        if ($pf_id == 0){

            $pf = new PF("", $_POST['pf_cpf'], $_POST['pf_nome'], $_POST['pf_dt_nascimento']);
            
            $resultado = $pf->inserir();
            header("location:indexPF.php");
        }
        else
            
            $pf = new PF($_POST['pf_id'], $_POST['pf_cpf'], $_POST['pf_nome'], $_POST['pf_dt_nascimento']);
            $resultado = $pf->editar($pf_id);
            header("location:indexPF.php");        
    }

//Consultar dados
function buscarDados($pf_id){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM pessoa_fisica WHERE pf_id = $pf_id");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['pf_id'] = $linha['pf_id'];
        $dados['pf_cpf'] = $linha['pf_cpf'];
        $dados['pf_nome'] = $linha['pf_nome'];
        $dados['pf_dt_nascimento'] = $linha['pf_dt_nascimento'];

    }
    //var_dump($dados);
    return $dados;
}
    
?>