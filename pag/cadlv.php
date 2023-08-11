<?php
    require_once ("../model/cnx.php");
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
            <input type="text" name="t" id="txtbusca" placeholder="Busca...">
        </div>
        </form>
        <a href="cad.php" id="clnt">Entre ou cadastre-se</a>
        <a href="car.php" id="cr">Carrinho</a>
    </header>
</div>
	<div class="cad">
		<form method="POST" enctype="multipart/form-data" autocomplete="off" class="arq">
			<div class="cnt">Nome</div>
			<input type="text" name="nm" class="inf" required>
			<div class="cnt">Capa</div>
			<input type="file" name="ft" class="inf" accept="image/*" multiple required>
			<div class="cnt">Preço</div>
			<input type="text" name="pre" class="inf" required>
            <div class="cnt">Quantidade</div>
            <input type="text" name="qtd" class="inf" required>
			<br>
			<input type="submit" name="" class="inf">
		</form>
	</div>
</body>
</html>

<?php
if ( !isset($_POST['nm']) || $_POST['nm'] == '' || !isset($_POST['pre']) || $_POST['pre'] == ''
    || !isset($_POST['qtd']) || $_POST['qtd'] == '') {
		?> <div class= "aviso"> <?php echo "Faça um cadastro válido"; ?> </div>
			<?php			
	}else{
		$image = $_FILES['ft']['name'];
		$target = "../img/livro/";
		$temp = explode(".", $_FILES['ft']['name']);

		$newFilename = $temp[0].round(microtime(true)). '.' .end($temp);

		if ($image == '') {
			$newFilename = 'imagem.png';
		}
		
		$sql = "INSERT INTO livro(nome, preco,qtd_estoque, capa) VALUES('$_POST[nm]', '$_POST[pre]', 
        '$_POST[qtd]', '$newFilename')";

		if ($conexao->query($sql) ===TRUE) {
			move_uploaded_file($_FILES['ft']['tmp_name'], $target.$newFilename);
			echo "<script>alert('Livro cadastrada!')</script>";
			header('Locantion: index.php');
		}
	} 
?>