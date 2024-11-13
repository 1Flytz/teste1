<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroTech - Equipamentos</title>
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

        .btn-group {
            margin-bottom: 20px;
            display: flex;
            gap: 10px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
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

        .actions a {
            text-decoration: none;
            color: #2c3e50;
            margin: 0 5px;
            padding: 5px 10px;
            border-radius: 3px;
            transition: background-color 0.3s;
        }

        .actions a:hover {
            background-color: #eee;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cadastro de Equipamentos</h2>
        
        <div class="btn-group">
            <a href="adicionar.php"><button>Adicionar</button></a>
            <a href="pesquisar.php"><button>Pesquisar</button></a>
            <a href="../index1.php"><button>Voltar</button></a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>EQUIPAMENTO</th>
                    <th>LOCALIZAÇÃO</th>
                    <th>CUSTO</th>
                    <th>MARCA/MODELO</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require("conecta.php");
                
                $query = $mysqli->query("select * from equipamentos");
                echo $mysqli->error;

                while ($tabela = $query->fetch_assoc()){
                    echo "
                    <tr>
                        <td>" . ($tabela['idequipe'] ?? '') . "</td>
                        <td>" . ($tabela['equipamento'] ?? '') . "</td>
                        <td>" . ($tabela['localizacao'] ?? '') . "</td>
                        <td>" . ($tabela['custo'] ?? '') . "</td>
                        <td>" . ($tabela['marcamodelo'] ?? '') . "</td>
                        <td class='actions'>
                            <a href='excluir.php?excluir=" . ($tabela['idequipe'] ?? '') . "'>[excluir]</a>
                            <a href='alterar.php?alterar=" . ($tabela['idequipe'] ?? '') . "'>[alterar]</a>
                        </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>