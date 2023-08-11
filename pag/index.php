<?php
    require_once ("../model/cnx.php");
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
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
            <input type="text" name="pesquisar" id="txtbusca" placeholder="Busca...">
        </div>
        </form>
        <?php
            if (isset($_SESSION) && isset($_SESSION['cod_cliente'])) {
            ?>    
                <a href="../model/dslg.php" id="clnt">Deslogar</a>

            <?php
            } else {
            ?>
                <a href="cad.php" id="clnt">Entre ou cadastre-se</a>
            <?php
            }
        ?>
        <a href="car.php" id="cr">Carrinho</a>
    </header>
</div>
    <main class="row">
        <?php
            if (!isset($_POST['t']) || $_POST['t'] == '') {
                $consulta = "select cod_livro, nome,preco,qtd_estoque, capa from livro;";
            
            }else{
                $pesquisar = $_POST['t'];
                $consulta = "select cod_livro, nome,preco,qtd_estoque, capa from livro LIKE '%$pesquisar%';";
                }
                
            $consulta = mysqli_query($conexao, $consulta);
        ?> 
        <?php
            while ($lv = mysqli_fetch_assoc($consulta)) {
        ?>
        <div id="lvr" class="d-flex justify-content-evenly col">
            <img src="../img/livro/<?php echo $lv['capa']?>" id="ftinha">
            <?php echo '<h4> Preço: R$'.$lv['preco'].'</h4>'?>
        </div>
        <?php
            }
        ?>
    </main>
</body>
<footer>
    <div class="rdp">
        <h5>Atendimento</h5>
        <p>
            <br>
            Política de Vendas, Trocas e Privacidade
            <br>
            Termos e condições de compra
            <br>
            Fale conosco
        </p>
        <p>
        <h5>Formas de pagamento</h5>
            <br>
                <img src="../img/fdp/blt.png" alt="" class="fdp">
                <img src="../img/fdp/elo.png" alt="" class="fdp">
                <img src="../img/fdp/hpr.png" alt="" class="fdp">
                <img src="../img/fdp/pp.png" alt="" class="fdp">
                <img src="../img/fdp/vis.png" alt="" class="fdp">
        </p>

        <a href="adm.php" class="btes">admin</a>
    </div>
</footer>
</html>