<?php
require_once("cnx.php");

$lv = "delete from autor_livro where cod_livro = $_GET[id]";
$conexao->query($lv);

$lv = "delete from genero_livro where cod_livro = $_GET[id]";
$conexao->query($lv);

$lv = "delete from livro_compra where cod_livro = $_GET[id]";
$conexao->query($lv);

$lv = "delete from livro where cod_livro = $_GET[id]";
$conexao->query($lv);

if ($conexao->query($lv) === TRUE) {
    header("location: ../pag/index.php");
}

?>