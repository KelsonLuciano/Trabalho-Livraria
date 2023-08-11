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
        <form method="POST" enctype="multipart/form-data" autocomplete="off" class="arq" action="../model/lg.php">
            <div class="cnt">E-mail</div>
            <input type="text" name="em" class="inf" required>
            <div class="cnt">Senha</div>
            <input type="password" name="se" class="inf" required>
            <br>
            <input type="submit" name="" value="Login" class="inf">
            <br>
            <a href="cad.php" id="lg">Cadastre-se</a>
        </form>
    </div>
</body>
</html>