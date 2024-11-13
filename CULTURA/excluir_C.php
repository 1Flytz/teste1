<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php 
	if(isset($_GET["excluir"])){

		$idcultura = htmlentities($_GET["excluir"]);
		require("conecta_C.php");
		$mysqli->query("delete from culturas where idcultura = '$idcultura'");
		echo $mysqli->error;
		if ($mysqli->error==""){
			echo "Excluido com Sucesso<br />";
			echo "<a href='index4.php'>Voltar</a>";
		}
	}
	?>
</body>
</html>