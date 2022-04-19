<!DOCTYPE html>
<?php
    include_once "acaoPF.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $dados;
    if ($acao == 'editar'){
        $pf_id = isset($_GET['pf_id']) ? $_GET['pf_id'] : "";
    if ($pf_id > 0)
        $dados = buscarDados($pf_id);
}
    $title = "Cadastro de pessoa física";
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
        <h3>Insira os dados</h3><hr>
                <form method="post" action="acaoPF.php">
                <div class="form-group col-lg-3">

                <p>ID</p>
                    <input readonly  type="text" name="pf_id" id="pf_id" class="form-control" value="<?php if ($acao == "editar") echo $dados['pf_id']; else echo 0; ?>"><br>

                <p>CPF</p>
                    <input name="pf_cpf" id="pf_cpf" type="number" required="true" class="form-control" value="<?php if ($acao == "editar") echo $dados['pf_cpf']; ?>" placeholder="Digite o CPF"><br>         
                <p>Nome</p>
                    <input name="pf_nome" id="pf_nome" type="text" required="true" class="form-control" value="<?php if ($acao == "editar") echo $dados['pf_nome']; ?>" placeholder="Digite o nome"><br>
                <p>Data de Nascimento</p>
                    <input name="pf_dt_nascimento" id="pf_dt_nascimento" type="date" required="true" class="form-control" value="<?php if ($acao == "editar") echo $dados['pf_dt_nascimento']; ?>" placeholder="Digite a data de nascimento"><br>
                    
                    <button name="acao" value="salvar" id="acao" type="submit" class="btn btn-outline-secondary">Salvar</button>
                        </div>
            </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>