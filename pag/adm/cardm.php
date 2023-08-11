<?php
    require_once ("../../model/cnx.php");
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
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>
<body>
    <header>
        <a href="../adm.php" id="logo"><img src="../../img/home/lg.png" alt="" id="lgimg"></a>
        <form>
        <div id="divbusca">
            <input type="text" name="t" id="txtbusca" placeholder="Busca...">
        </div>
        </form>
        <a href="cnt.php" id="clnt">Conta</a>
        <a href="cardm.php" id="cr">Carrinho</a>
    </header>
</div>
<main>
    <?php
         $consulta = "select cod_compra, valor_total, cod_cliente from compra";
         $consulta = mysqli_query($conexao, $consulta);
    ?>
    <?php
            while ($lv = mysqli_fetch_assoc($consulta)) {
        ?>
        <div id="usu" class="d-flex justify-content-evenly col">
            <?php echo '<h2>Id cliente: '.$lv['cod_compra'].'</h2>'?>
            <?php echo '<h2> Valor: R$'.$lv['valor_total'].'</h2>'?>
            <?php echo '<h2> Id compra: '.$lv['cod_cliente'].'</h2>'?>
            <a href="../../model/exc.php?id=<?php echo $lv['cod_compra'] ?>" class="exl">excluir</a>
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
                <img src="../../img/fdp/blt.png" alt="" class="fdp">
                <img src="../../img/fdp/elo.png" alt="" class="fdp">
                <img src="../../img/fdp/hpr.png" alt="" class="fdp">
                <img src="../../img/fdp/pp.png" alt="" class="fdp">
                <img src="../../img/fdp/vis.png" alt="" class="fdp">
        </p>
    </div>
</footer>
</html>