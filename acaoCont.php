<?php

    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    require_once ("classes/Contatos.class.php");
    require_once("classes/PF.class.php");


    
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $cont_id = isset($_GET['cont_id']) ? $_GET['cont_id'] : 0;
        $contatos = new Contatos("", "", "", "");
        $resultado = $contatos->excluir($cont_id);
            header("location:indexCont.php");
    }
    


    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $cont_id = isset($_POST['cont_id']) ? $_POST['cont_id'] : "";
        if ($cont_id == 0){

            $contatos = new Contatos("", $_POST['cont_tipo'], $_POST['cont_descricao'], $_POST['cont_pf_id']);
            
            $resultado = $contatos->inserir();
            header("location:indexCont.php");
        }
        else
            
            $contatos = new Contatos($_POST['cont_id'], $_POST['cont_tipo'], $_POST['cont_descricao'], $_POST['cont_pf_id']);
            $resultado = $contatos->editar($cont_id);
            header("location:indexCont.php");        
    }

    

//Consultar dados
    function buscarDados($cont_id){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM contatos WHERE cont_id = $cont_id");
        $dados = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['cont_id'] = $linha['cont_id'];
            $dados['cont_tipo'] = $linha['cont_tipo'];
            $dados['cont_descricao'] = $linha['cont_descricao'];
            $dados['cont_pf_id'] = $linha['cont_pf_id'];

        }
        //var_dump($dados);
        return $dados;
    }

    function exibir($chave, $dados){
        foreach($dados as $linha){
            $str .= "<option value='".$linha[$chave[0]]."'>".$linha[$chave[1]]."</option>";
        }
        return $str;
    }


    function lista_pessoa($id){
        $pessoa = new PF("","","","");
        $lista = $pessoa->buscar($id);
        return exibir(array('pf_id', 'pf_nome'), $lista);

    }

?>