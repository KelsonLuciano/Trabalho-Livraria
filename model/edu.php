<?php
    require_once("cnx.php");

    if(isset($_GET['editar']) && $_GET['editar'] == 1){
        $sql = "update usuario set nome = '$_POST[nm]' where cod_cliente = '$_POST[cod_cliente]'";
       
        if ($conexao->query($sql) === TRUE) {
            header("location: ../pag/adm/cnt.php");
        }
    }

    $sql = "SELECT * FROM usuario WHERE cod_cliente = $_GET[id]";
    $sql = mysqli_query($conexao, $sql);
    
    $postagem = mysqli_fetch_assoc($sql);

    header("Location: ../pag/tledit.php?nome=$postagem[nome]&cod_cliente=$postagem[cod_cliente]&cpf=$postagem[cpf]");

?>