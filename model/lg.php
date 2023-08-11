<?php
require_once("cnx.php");

    $sql = "SELECT cod_cliente,nome,cpf,email FROM usuario WHERE email = '$_POST[em]' AND senha = '$_POST[se]';";

    $sql = mysqli_query($conexao, $sql);
    
    if ($sql->num_rows === 1){
        $row = mysqli_fetch_assoc($sql);
        session_start();
        $_SESSION['cod_cliente'] = $row['cod_cliente'];
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['cpf'] = $row['cpf'];
        
        header("Location: ../pag/index.php");
    }else
        header("Location: ../pag/lg.php");
?>