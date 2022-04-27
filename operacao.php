<!DOCTYPE html>
<?php
    include_once "acaoOp.php";
    require_once("utils.php");

    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $dados;
    if ($acao == 'editar'){
        $pf_id = isset($_GET['pf_id']) ? $_GET['pf_id'] : "";
    if ($pf_id > 0)
        $dados = buscarDados($pf_id);
}
    $title = "Operação de Saque / Depósito";
    $valor = isset($_POST['valor']) ? $_POST['valor'] : "";
    $cc_numero = isset($_POST['cc_numero']) ? $_POST['cc_numero'] : 0;

    $op = isset($_POST['op']) ? $_POST['op'] : "";

// var_dump($dados);
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <div class="container-fluid">
    <br>
        <h3>Operação Saque / Deposito</h3><hr>
                <form method="post" action="">
                <div class="form-group col-lg-3">

                <p>Pessoa:</p>
                <select name="cont_pf_id" id="cont_pf_id" class="form-select">
                    <?php
                         echo lista_pessoa(0);
                         ?>
                </select>
                
                <p>Conta Corrente:</p>
                <select name="cc_numero" id="cc_numero" class="form-select">
                    <?php
                        $pessoa = isset($_POST['pf_id']) ? $_POST['pf_id']:0;
                        echo lista_Conta($pessoa);
                        ?>
                </select>
                <br>
                <p>Operação:</p>
                <input type="radio" id="saque" name="op" value="saque" <?php if($op == 'saque') echo 'checked';?>>Saque
                <input type="radio" id="deposito" name="op" value="deposito" <?php if($op == 'deposito') echo 'checked';?>>Depósito
                <br><br>

                <p>Valor</p>
                <input name="valor" id="valor" type="number" required="true" class="form-control" value="<?php echo $valor;?>" placeholder="Digite o valor"><br>

                <button name="acao" value="salvar" id="acao" type="submit" class="btn btn-outline-secondary">Salvar</button>
</div>
    <?php
         require_once('acaoOp.php');
          op($valor);

        

         
    ?>

    

            </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>