<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroTech - Pesquisar Equipamentos</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f5f5f5;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            color: #2c3e50;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #2c3e50;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #2c3e50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .btn-voltar {
            display: inline-block;
            background-color: #2c3e50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .btn-voltar:hover {
            background-color: #34495e;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pesquisar Equipamentos</h2>
        
        <form method="POST" action="pesquisar.php">
            <div class="form-group">
                <label>EQUIPAMENTO:</label>
                <input type="text" name="equipamento" maxlength="20" placeholder="Digite o equipamento">
            </div>

            <div class="form-group">
                <label>LOCALIZAÇÃO:</label>
                <input type="text" name="localizacao" maxlength="20" placeholder="Digite a localização">
            </div>

            <div class="form-group">
                <label>CUSTO:</label>
                <input type="text" name="custo" maxlength="20" placeholder="Digite o custo">
            </div>

            <div class="form-group">
                <label>MARCA/MODELO:</label>
                <input type="text" name="marcamodelo" maxlength="20" placeholder="Digite a marca/modelo">
            </div>

            <input type="submit" value="Pesquisar" name="botao">
        </form>

        <?php 
        if(isset($_POST["botao"])){
            require("conecta.php");
            $equipamento = htmlentities($_POST["equipamento"]);
            $localizacao = htmlentities($_POST["localizacao"]);
            $custo = htmlentities($_POST["custo"]);
            $marcamodelo = htmlentities($_POST["marcamodelo"]);

            $query = $mysqli->query("select * from equipamentos where equipamento like '%$equipamento%'");
            $query = $mysqli->query("select * from equipamentos where localizacao like '%$localizacao%'");
            $query = $mysqli->query("select * from equipamentos where custo like '%$custo%'");
            $query = $mysqli->query("select * from equipamentos where marcamodelo like '%$marcamodelo%'");

            echo $mysqli->error;

            if($query->num_rows > 0) {
                echo "
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>EQUIPAMENTO</th>
                            <th>LOCALIZAÇÃO</th>
                            <th>CUSTO</th>
                            <th>MARCA/MODELO</th>
                        </tr>
                    </thead>
                    <tbody>
                ";
                
                while ($tabela = $query->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>" . ($tabela['idequipe'] ?? '') . "</td>
                        <td>" . ($tabela['equipamento'] ?? '') . "</td>
                        <td>" . ($tabela['localizacao'] ?? '') . "</td>
                        <td>" . ($tabela['custo'] ?? '') . "</td>
                        <td>" . ($tabela['marcamodelo'] ?? '') . "</td>
                    </tr>
                    ";
                }
                
                echo "</tbody></table>";
            } else {
                echo "<p style='text-align: center; margin-top: 20px; color: #666;'>Nenhum resultado encontrado.</p>";
            }
        }
        ?>
        
        <a href='index3.php' class="btn-voltar">Voltar</a>
    </div>
</body>
</html>