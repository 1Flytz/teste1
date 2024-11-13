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
        }

        .btn-submit:hover {
            background-color: #45a049;
        }

        .mensagem {
            margin-top: 15px;
            padding: 10px;
            border-radius: 4px;
        }

        .sucesso {
            background-color: #dff0d8;
            color: #3c763d;
            border: 1px solid #d6e9c6;
        }

        .voltar {
            display: inline-block;
            margin-top: 15px;
            color: #666;
            text-decoration: none;
        }

        .voltar:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form method="POST" action="adicionar.php">
            <div class="form-group">
                <label>EQUIPAMENTO:</label>
                <input type="text" name="equipamento" maxlength="20" placeholder="digite o equipamento">
            </div>

            <div class="form-group">
                <label>LOCALIZACAO:</label>
                <input type="text" name="localizacao" maxlength="20" placeholder="digite a localizacao">
            </div>

            <div class="form-group">
                <label>CUSTO:</label>
                <input type="text" name="custo" maxlength="20" placeholder="digite o custo">
            </div>

            <div class="form-group">
                <label>MARCAMODELO:</label>
                <input type="text" name="marcamodelo" maxlength="20" placeholder="digite a marcamodelo">
            </div>

            <input type="submit" value="Salvar" name="botao" class="btn-submit">
        </form>

        <?php
        if(isset($_POST["botao"])){
            require("conecta.php");

            $equipamento=htmlentities($_POST["equipamento"]);
            $localizacao=htmlentities($_POST["localizacao"]);
            $custo=htmlentities($_POST["custo"]);
            $marcamodelo=htmlentities($_POST["marcamodelo"]);

            $mysqli->query("insert into equipamentos values('', '$equipamento', '$localizacao', '$custo', '$marcamodelo')");
            echo $mysqli->error;

            if($mysqli->error == ""){
                echo "<div class='mensagem sucesso'>Inserido com sucesso</div>";
                echo "<a href='index3.php' class='voltar'>Voltar</a>";
            }
        }
        ?>
    </div>
</body>
</html>
 

