<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroTech</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #1111111;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            padding: 40px 0;
        }

        .header h1 {
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .welcome-text {
            font-size: 1.2rem;
            color: #34495e;
            margin-bottom: 40px;
            text-align: center;
        }

        .banner-image {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 40px;
        }

        .footer {
            background-color: #2c3e50;
            padding: 20px 0;
            margin-top: 40px;
        }

        .nav-links {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .nav-links a:hover {
            background-color: #34495e;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>AgroTech</h1>
            <p class="welcome-text">
                Descubra o futuro da 11111 sustentável! Nossa plataforma une tecnologia e 
                práticas eco-friendly para transformar sua produção agrícola.<br>
                Maximize seus resultados enquanto preserva o meio ambiente! teste
            </p>
        </header>

        <div class="banner">
            <img src="IMAGEM/imagem1.png" alt="Banner AgroTech" class="banner-image">
        </div>
    </div>

    <footer class="footer">
        <nav class="nav-links">
            <a href="CULTURA/index4.php">CADASTRO DE CULTURA</a>
            <a href="EQUIPAMENTOS/index3.php">CADASTRO DE EQUIPAMENTOS</a>
            <a href="PROPRIEDADE/index2.php">CADASTRO DE PROPRIEDADE</a>
        </nav>
    </footer>
</body>
</html>