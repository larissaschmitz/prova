
    <?php
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    require_once("classes/PF.class.php");
    require_once("classes/ContaCorrente.class.php");


    
    function op($valor){
        $pdo = Conexao::getInstance();
        $cc_numero = isset($_POST['cc_numero']) ? $_POST['cc_numero'] : 0;
        
        $consulta = $pdo->query("SELECT cc_saldo FROM conta_corrent
                        WHERE cc_numero = '$cc_numero%'");
               
               $valor = isset($_POST['valor']) ? $_POST['valor'] : "";
               $op = isset($_POST['op']) ? $_POST['op'] : "";                
               $hoje = date("y/m/d");
               while ($item = $consulta->fetch(PDO::FETCH_ASSOC)) { 
                   
                if ($op == "saque"){
                    if ($item['cc_saldo'] >= $valor){  
                        $conta = $item['cc_saldo']  - $valor;
                        $stmt = $pdo->prepare("UPDATE `prova`.`conta_corrent` SET `cc_saldo` = :cc_saldo, `cc_dt_ultima_alteracao` = :cc_dt_ultima_alteracao WHERE (`cc_numero` = :cc_numero);");
                        $stmt->bindValue(':cc_saldo', $conta, PDO::PARAM_STR);
                        $stmt->bindValue(':cc_numero', $cc_numero, PDO::PARAM_STR);
                        $stmt->bindValue(':cc_dt_ultima_alteracao', $hoje, PDO::PARAM_STR);

                        return $stmt->execute();
                        return $conta;
                    } else {
                echo "Saldo Insuficiente";
            } } else if ($op == "deposito"){
                    $conta = $item['cc_saldo']  + $valor;
                    $stmt = $pdo->prepare("UPDATE `prova`.`conta_corrent` SET `cc_saldo` = :cc_saldo, `cc_dt_ultima_alteracao` = :cc_dt_ultima_alteracao  WHERE (`cc_numero` = :cc_numero);");
                    $stmt->bindValue(':cc_saldo', $conta, PDO::PARAM_STR);
                    $stmt->bindValue(':cc_numero', $cc_numero, PDO::PARAM_STR);
                    $stmt->bindValue(':cc_dt_ultima_alteracao', $hoje, PDO::PARAM_STR);
                    return $stmt->execute();
                    return $conta;
                    }        
                }  
            }  
            
          


            
                
           
?>