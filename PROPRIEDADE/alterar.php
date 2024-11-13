<?php
    require("conecta.php");
    $propriedade="";
    $proprietario="";
	$area="";
	$cultura="";
    if(isset($_GET["alterar"])){
        $idprop = htmlentities($_GET["alterar"]);
        $query=$mysqli->query("select * from propriedade where idprop = '$idprop'");
        $tabela=$query->fetch_assoc();
        $propriedade=$tabela["propriedade"];      
        $proprietario=$tabela["proprietario"];
        $area=$tabela["area"];  
        $cultura=$tabela["cultura"];    
    }
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <form method="POST" action="alterar.php">
        <input type="hidden" name="idprop" value="<?php echo $idprop ?>">
        PROPRIEDADE:<input type="text" name="propriedade" value="<?php echo $propriedade ?>">
        <br/><br/>
        PROPRIETARIO:<input type="text" name="proprietario" value="<?php echo $proprietario ?>">
        <br/><br/>
        AREA:<input type="text" name="area" value="<?php echo $area ?>">
        <br/><br/>          
        CULTURA:<input type="text" name="cultura" value="<?php echo $cultura ?>">
        <input type="submit" value="Salvar" name="botao">
 
    </form>
    <a href ="index2.php"> Voltar </a>
    <br />
</body>
</html>
 
<?php
    if(isset($_POST["botao"])){
        $idprop   = htmlentities($_POST["idprop"]);
        $propriedade  = htmlentities($_POST["propriedade"]);
        $proprietario = htmlentities($_POST["proprietario"]);
        $area = htmlentities($_POST["area"]);
        $cultura = htmlentities($_POST["cultura"]);
 
        $mysqli->query("update propriedade set propriedade = '$propriedade', proprietario='$proprietario', area='$area', cultura='$cultura' where idprop = '$idprop'  ");
        echo $mysqli->error;
        if ($mysqli->error == "") {
            echo "Alterado com sucesso";
        }
    }
?>