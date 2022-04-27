<!DOCTYPE html>
<?php 
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    $title = "Consulta de contatos";
    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
    $busca = isset($_POST['busca']) ? $_POST['busca'] : 1;
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
    
    <script>
        function excluirRegistro(url){
            if (confirm("Confirma Exclusão?"))
                location.href = url;
        }
    </script>

    
</head>
<body>

    

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Contatos</a>

        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="cadastroCont.php">Cadastrar contato</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="indexPF.php">Pessoa Física</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="indexCC.php">Conta corrente</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="operacao.php">Operação</a>
            </li>
            <ul>
        </div>
        </div>
    </nav>

    <div class="container-fluid">
<br><br><br>
    <form method="post">

                    <div class="form-group col-lg-3">
                    <h3>Procurar contato</h3>
                    <input type="text" name="procurar" id="procurar" size="50" class="form-control" placeholder="Insira o que deseja consultar"
                value="<?php echo $procurar;?>"> <br>
                <button name="acao" id="acao" type="submit"  class="btn btn-outline-info">Procurar</button>

                <br><br>

        <p> Ordernar e pesquisar por:</p><br>
        <form method="post" action="">
                <input type="radio" name="busca" value="1" class="form-check-input" <?php if ($busca == "1") echo "checked" ?>> Id<br>
                <input type="radio" name="busca" value="2" class="form-check-input" <?php if ($busca == "2") echo "checked" ?>> Tipo<br>
                <input type="radio" name="busca" value="3" class="form-check-input" <?php if ($busca == "3") echo "checked" ?>> Pessoa Física<br>

    </div>

    <br><br>
    </form>

    <table class="table table-hover">
            <tr><td><b>ID</b></td>
                <td><b>Tipo</b></td>
                <td><b>Descrição</b></td>
                <td><b>Pessoa Física</b></td>
                <td><b>Editar</b></td>
                <td><b>Excluir</b></td>
            </tr> 

            
    <?php
        $pdo = Conexao::getInstance(); 

        if($busca == 1){
            $consulta = $pdo->query("SELECT * FROM pessoa_fisica, contatos 
                                WHERE contatos.cont_id LIKE '$procurar%' 
                                AND pessoa_fisica.pf_id = contatos.cont_pf_id
                                ORDER BY contatos.cont_id");}

        else if($busca == 2){
            $consulta = $pdo->query("SELECT * FROM pessoa_fisica, contatos 
                                WHERE contatos.cont_tipo LIKE '$procurar%' 
                                AND pessoa_fisica.pf_id = contatos.cont_pf_id
                                ORDER BY contatos.cont_tipo");}

        else if($busca == 3){
            $consulta = $pdo->query("SELECT * FROM pessoa_fisica, contatos  
                                WHERE pessoa_fisica.pf_nome LIKE '$procurar%'
                                AND pessoa_fisica.pf_id = contatos.cont_pf_id
                                ORDER BY pessoa_fisica.pf_nome");}


    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {   
        
        ?>
        <tr><td><?php echo $linha['cont_id'];?></td>
            <td><?php echo $linha['cont_tipo'];?></td>
            <td><?php echo $linha['cont_descricao'];?></td>
            <td><?php echo $linha['pf_nome'];?></td>
            <td><a href='cadastroCont.php?acao=editar&cont_id=<?php echo $linha['cont_id'];?>'> <img src="img/edit.svg" style="width: 1.8vw;"></a></td>
            <td><?php echo " <a href=javascript:excluirRegistro('acaoCont.php?acao=excluir&cont_id={$linha['cont_id']}')>";?><img src="img/delete.svg" style="width: 1.5vw;"></a></td>
        
        </tr>
    <?php } ?>       
    </table>
    </fieldset>
    </form>
    
            </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>