<?php
require_once("cnx.php");

$lv = "delete from livro_compra where cod_compra = $_GET[id]";
$conexao->query($lv);

$lv = "delete from compra where cod_cliente = $_GET[id]";
$conexao->query($lv);

$lv = "delete from admin where cod_cliente = $_GET[id]";
$conexao->query($lv);

$lv = "delete from usuario where cod_cliente = $_GET[id]";
$conexao->query($lv);

if ($conexao->query($lv) === TRUE) {
    header("location: ../pag/adm/cnt.php");
}

?>