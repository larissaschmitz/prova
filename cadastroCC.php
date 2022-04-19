<!DOCTYPE html>

<?php
    include_once "acaoCC.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $dados;
    if ($acao == 'editar'){
        $cc_numero = isset($_GET['cc_numero']) ? $_GET['cc_numero'] : "";
    if ($cc_numero > 0)
        $dados = buscarDados($cc_numero);
}
    $title = "Cadastro de conta corrente";
    $cc_saldo = isset($_POST['cc_saldo']) ? $_POST['cc_saldo'] : "";
    
//var_dump($dados);
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

<h3>Insira os dados</h3><hr>

        <form method="post" action="acaoCC.php">
        <div class="form-group col-lg-3">
        <p>ID</p>
                    <input readonly  type="text" name="cc_numero" id="cc_numero" class="form-control" value="<?php if ($acao == "editar") echo $dados['cc_numero']; else echo 0; ?>"><br>
        <p>Saldo</p>
                    <input name="cc_saldo" id="cc_saldo" type="text" required="true" class="form-control" value="<?php if ($acao == "editar") echo $dados['cc_saldo']; ?>" placeholder="Digite o saldo"><br>
                   

        <p> Insira a pessoa </p>
        <select name="cc_pf_id"  id="cc_pf_id" class="form-select">>
            <?php
                require_once("acaoCC.php");
                echo lista_pessoa(0);
            ?>
        </select>

<br>
       

    <p>Última alteração</p>
                    <input name="cc_dt_ultima_alteracao" id="cc_dt_ultima_alteracao" type="date" required="true" class="form-control" value="<?php if ($acao == "editar") echo $dados['cc_dt_ultima_alteracao']; ?>" placeholder="Digite a cidade"><br>
        
<br><br>

    <button name="acao" value="salvar" id="acao" type="submit" class="btn btn-outline-secondary">Salvar</button>

                            </div>
                </div>
           
    </form>
    

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>