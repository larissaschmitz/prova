<!DOCTYPE html>

<?php
    include_once "acaoCont.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $dados;
    if ($acao == 'editar'){
        $cont_id = isset($_GET['cont_id']) ? $_GET['cont_id'] : "";
    if ($cont_id > 0)
        $dados = buscarDados($cont_id);
}
    $title = "Cadastro de contatos";

    
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

        <form method="post" action="acaoCont.php">
        <div class="form-group col-lg-3">
        <p>ID</p>
                <input readonly  type="text" name="cont_id" id="cont_id" class="form-control" value="<?php if ($acao == "editar") echo $dados['cont_id']; else echo 0; ?>"><br>
        <p>Tipo</p>
                <input name="cont_tipo" id="cont_tipo" type="text" required="true" class="form-control" value="<?php if ($acao == "editar") echo $dados['cont_tipo']; ?>" placeholder="Digite o tipo"><br>
        <p>Descrição</p>
                <input name="cont_descricao" id="cont_descricao" type="text" required="true" class="form-control" value="<?php if ($acao == "editar") echo $dados['cont_descricao']; ?>" placeholder="Digite a descrição"><br> 
        <p>Insira a pessoa</p>
        <select name="cont_pf_id" id="cont_pf_id" class="form-select">
            <?php
                require_once("utils.php");
                echo lista_pessoa(0);
            ?>
        </select>
<br><br>

<button name="acao" value="salvar" id="acao" type="submit" class="btn btn-outline-secondary">Salvar</button>

    </div>
    </div>
    </form>
    

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>