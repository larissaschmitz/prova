<?php
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    require_once ("classes/Contatos.class.php");
    require_once("classes/PF.class.php");

    function exibir($chave, $dados){
        $str = 0;
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

    function exibirCC($chave, $dados){
        $str = 0;
        foreach($dados as $linha){
            $str .= "<option value='".$linha[$chave[0]]."'>".$linha[$chave[1]]."</option>";
        }
        return $str;
    }

    function lista_conta($id){
        try{
        $conta = new ContaCorrente("","","","");
    }catch(Exception $e){
        echo "Erro: ".$e->getMessage();
    }
        $lista = $conta->buscarCC($id);
        return exibirCC(array('cc_numero', 'cc_numero'), $lista);

    }
?>