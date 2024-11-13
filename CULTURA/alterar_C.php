<?php
    require("conecta_C.php");
    $idcultura = "";
    $cultura = "";
    $variedade = "";
    $ciclo = "";
    $colheita = "";
    
    if(isset($_GET["alterar"])){
        $idcultura = htmlentities($_GET["alterar"]);
        $query = $mysqli->query("select * from culturas where idcultura = '$idcultura'");
        if($tabela = $query->fetch_assoc()) {
            $cultura = isset($tabela["cultura"]) ? $tabela["cultura"] : "";      
            $variedade = isset($tabela["variedade"]) ? $tabela["variedade"] : "";
            $ciclo = isset($tabela["ciclo"]) ? $tabela["ciclo"] : "";  
            $colheita = isset($tabela["colheita"]) ? $tabela["colheita"] : "";    
        }
    }
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f0f0f0;
        }

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 500px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #2c3e50;
        }

        .form-group input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn-submit {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background-color: #45a049;
        }

        .mensagem {
            margin-top: 15px;
            padding: 10px;
            border-radius: 4px;
            text-align: center;
        }

        .sucesso {
            background-color: #dff0d8;
            color: #3c763d;
            border: 1px solid #d6e9c6;
        }

        .voltar {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #666;
            text-decoration: none;
        }

        .voltar:hover {
            text-decoration: underline;
        }

        h2 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Alterar Cultura</h2>
        <form method="POST" action="alterar_C.php">
            <input type="hidden" name="idcultura" value="<?php echo $idcultura ?>">
            
            <div class="form-group">
                <label>CULTURA:</label>
                <input type="text" name="cultura" value="<?php echo $cultura ?>">
            </div>

            <div class="form-group">
                <label>VARIEDADE:</label>
                <input type="text" name="variedade" value="<?php echo $variedade ?>">
            </div>

            <div class="form-group">
                <label>CICLO:</label>
                <input type="text" name="ciclo" value="<?php echo $ciclo ?>">
            </div>

            <div class="form-group">
                <label>COLHEITA:</label>
                <input type="text" name="colheita" value="<?php echo $colheita ?>">
            </div>

            <input type="submit" value="Salvar" name="botao" class="btn-submit">
        </form>

        <?php
            if(isset($_POST["botao"])){
                $idcultura = htmlentities($_POST["idcultura"]);
                $cultura = htmlentities($_POST["cultura"]);
                $variedade = htmlentities($_POST["variedade"]);
                $ciclo = htmlentities($_POST["ciclo"]);
                $colheita = htmlentities($_POST["colheita"]);
         
                $mysqli->query("update culturas set 
                    cultura = '$cultura', 
                    variedade = '$variedade', 
                    ciclo = '$ciclo', 
                    colheita = '$colheita' 
                    where idcultura = '$idcultura'");
                
                if ($mysqli->error == "") {
                    echo "<div class='mensagem sucesso'>Alterado com sucesso</div>";
                } else {
                    echo $mysqli->error;
                }
            }
        ?>
        <a href="index4.php" class="voltar">Voltar</a>
    </div>
</body>
</html>