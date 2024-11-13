<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroTech - Pesquisar Propriedades</title>
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
        <h2>Pesquisar Propriedades</h2>
        
        <form method="POST" action="">
            <div class="form-group">
                <label>Propriedade:</label>
                <input type="text" name="propriedade" placeholder="Digite a propriedade">
            </div>
            
            <div class="form-group">
                <label>Proprietário:</label>
                <input type="text" name="proprietario" placeholder="Digite o proprietário">
            </div>
            
            <div class="form-group">
                <label>Área:</label>
                <input type="text" name="area" placeholder="Digite a área">
            </div>
            
            <div class="form-group">
                <label>Cultura:</label>
                <input type="text" name="cultura" placeholder="Digite a cultura">
            </div>

            <input type="submit" name="botao" value="Pesquisar">
        </form>

        <?php
            if(isset($_POST["botao"])) {
                include_once('conecta.php');
                
                $propriedade = $_POST['propriedade'];
                $proprietario = $_POST['proprietario'];
                $area = $_POST['area'];
                $cultura = $_POST['cultura'];
                
                $sql = "SELECT * FROM propriedade WHERE 
                        propriedade LIKE '%$propriedade%' OR 
                        proprietario LIKE '%$proprietario%' OR 
                        area LIKE '%$area%' OR 
                        cultura LIKE '%$cultura%'";
                
                $result = $mysqli->query($sql);

                if($result->num_rows > 0) {
                    echo "<table>
                            <tr>
                                <th>ID</th>
                                <th>Propriedade</th>
                                <th>Proprietário</th>
                                <th>Área</th>
                                <th>Cultura</th>
                            </tr>";
                    
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>".$row['idprop']."</td>
                                <td>".$row['propriedade']."</td>
                                <td>".$row['proprietario']."</td>
                                <td>".$row['area']."</td>
                                <td>".$row['cultura']."</td>
                            </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p style='text-align: center; margin-top: 20px; color: #666;'>Nenhum resultado encontrado.</p>";
                }
            }
        ?>
        
        <a href="index2.php" class="btn-voltar">Voltar</a>
    </div>
</body>
</html>