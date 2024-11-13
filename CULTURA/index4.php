<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroTech - Culturas</title>
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
        <h2>Cadastro de Culturas</h2>
        
        <div class="btn-group">
            <a href="adicionar_C.php"><button>Adicionar</button></a>
            <a href="pesquisar_C.php"><button>Pesquisar</button></a>
            <a href="../index1.php"><button>Voltar</button></a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>CULTURA</th>
                    <th>VARIEDADE</th>
                    <th>CICLO</th>
                    <th>COLHEITA</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require("conecta_C.php");
                
                $query = $mysqli->query("select * from culturas");
                echo $mysqli->error;

                while ($tabela = $query->fetch_assoc()){
                    $variedade = isset($tabela['variedade']) ? $tabela['variedade'] : '';
                    
                    echo "
                    <tr>
                        <td>" . ($tabela['idcultura'] ?? '') . "</td>
                        <td>" . ($tabela['cultura'] ?? '') . "</td>
                        <td>" . $variedade . "</td>
                        <td>" . ($tabela['ciclo'] ?? '') . "</td>
                        <td>" . ($tabela['colheita'] ?? '') . "</td>
                        <td class='actions'>
                            <a href='excluir_C.php?excluir=" . ($tabela['idcultura'] ?? '') . "'>[excluir]</a>
                            <a href='alterar_C.php?alterar=" . ($tabela['idcultura'] ?? '') . "'>[alterar]</a>
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