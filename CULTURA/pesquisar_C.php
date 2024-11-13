<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroTech - Pesquisar Culturas</title>
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
        <h2>Pesquisar Culturas</h2>
        
        <form method="POST" action="pesquisar_C.php">
            <div class="form-group">
                <label>CULTURA:</label>
                <input type="text" name="cultura" maxlength="20" placeholder="Digite a cultura">
            </div>

            <div class="form-group">
                <label>VARIEDADE:</label>
                <input type="text" name="variedade" maxlength="20" placeholder="Digite a variedade">
            </div>

            <div class="form-group">
                <label>CICLO:</label>
                <input type="text" name="ciclo" maxlength="20" placeholder="Digite o ciclo">
            </div>

            <div class="form-group">
                <label>COLHEITA:</label>
                <input type="text" name="colheita" maxlength="20" placeholder="Digite a colheita">
            </div>

            <input type="submit" value="Pesquisar" name="botao">
        </form>

        <?php 
        if(isset($_POST["botao"])){
            require("conecta_C.php");
            $cultura = htmlentities($_POST["cultura"]);
            $variedade = htmlentities($_POST["variedade"]);
            $ciclo = htmlentities($_POST["ciclo"]);
            $colheita = htmlentities($_POST["colheita"]);

            $query = $mysqli->query("select * from culturas where cultura like '%$cultura%'");
            $query = $mysqli->query("select * from culturas where variedade like '%$variedade%'");
            $query = $mysqli->query("select * from culturas where ciclo like '%$ciclo%'");
            $query = $mysqli->query("select * from culturas where cultura like '%$colheita%'");

            echo $mysqli->error;

            if($query->num_rows > 0) {
                echo "
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>CULTURA</th>
                            <th>VARIEDADE</th>
                            <th>CICLO</th>
                            <th>COLHEITA</th>
                        </tr>
                    </thead>
                    <tbody>
                ";
                
                while ($tabela = $query->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>" . ($tabela['idcultura'] ?? '') . "</td>
                        <td>" . ($tabela['cultura'] ?? '') . "</td>
                        <td>" . ($tabela['variedade'] ?? '') . "</td>
                        <td>" . ($tabela['ciclo'] ?? '') . "</td>
                        <td>" . ($tabela['colheita'] ?? '') . "</td>
                    </tr>
                    ";
                }
                
                echo "</tbody></table>";
            } else {
                echo "<p style='text-align: center; margin-top: 20px; color: #666;'>Nenhum resultado encontrado.</p>";
            }
        }
        ?>
        
        <a href='index4.php' class="btn-voltar">Voltar</a>
    </div>
</body>
</html>