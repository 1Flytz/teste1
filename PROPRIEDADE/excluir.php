<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php 
	if(isset($_GET["excluir"])){

		$idprop = htmlentities($_GET["excluir"]);
		require("conecta.php");
		$mysqli->query("delete from propriedade where idprop = '$idprop'");
		echo $mysqli->error;
		if ($mysqli->error==""){
			echo "Excluido com Sucesso<br />";
			echo "<a href='index2.php'>Voltar</a>";
		}
	}
	?>
</body>
</html>