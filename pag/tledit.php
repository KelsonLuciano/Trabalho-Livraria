<?php
    require_once ("../model/cnx.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Livraria ON</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <header>
        <a href="index.php" id="logo"><img src="../img/home/lg.png" alt="" id="lgimg"></a>
        <form>
        <div id="divbusca">
            <input type="text" name="t" id="txtbusca" placeholder="Busca...">
        </div>
        </form>
        <a href="cad.php" id="clnt">Entre ou cadastre-se</a>
        <a href="car.php" id="cr">Carrinho</a>
    </header>
</div>
    <div class="cad">
        <form method="POST" enctype="multipart/form-data" autocomplete="off" class="arq" 
        action="../model/edu.php?editar=1">
            <div class="cnt">Nome</div>
            <input type="text" name="nm" class="inf" value="<?php echo $_GET['nome']?>"required>
            <div class="cnt">CPF</div>
            <input type="text" name="cpf" class="inf" value="<?php echo $_GET['cpf']?>"required>
            <input type="hidden" name="cod_cliente" value="<?php echo $_GET['cod_cliente']?>">
            <br>
            <input type="submit" name="" value="Cadastrar" class="inf">
            <br>
            <a href="lg.php" id="lg">Faça login</a>
        </form>
    </div>
<?php
    if ( !isset($_POST['nm']) || $_POST['nm']  == '' || !isset($_POST['cpf']) || $_POST['cpf']  == '' || 
    !isset($_POST['em']) || $_POST['em']  == '' || !isset($_POST['se']) || $_POST['se']  == '') {
        ?> <div class="aviso"> <?php echo "Faça um cadastro válido"; ?> </div>
        <?php
    }else{
        $sql = "INSERT INTO usuario(nome, cpf, email, senha) VALUES ('$_POST[nm]', '$_POST[cpf]', '$_POST[em]',
        '$_POST[se]')";
        if ($conexao->query($sql) ===TRUE) {
            ?><p><?php echo "<script>alert('Usuário cadastrado!)</script>";?></p><?php 
            header('Location: index.php');
        }
    }
?>
</body>
</html>

