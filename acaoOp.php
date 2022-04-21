
    <?php
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    require_once("classes/PF.class.php");
    require_once("classes/ContaCorrente.class.php");

    $op = isset($_POST['op']) ? $_POST['op'] : "";
    

    

       

        $pdo = Conexao::getInstance();
       // $consulta = $pdo->query("SELECT cc_saldo FROM conta_corrente WHERE cont_id = $cont_id");

            function op($valor){
                $op = isset($_POST['op']) ? $_POST['op'] : "";
                if ($op == "saque"){
                    $operacao = 1000 - $valor;
                    return $operacao;
            } else if ($op == "deposito"){
                    $operacao = 1000 + $valor;
                    return $operacao;
                    }        }
        



?>