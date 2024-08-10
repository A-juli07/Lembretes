<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lembretes</title>
    <link rel="stylesheet" href="style.css">
    <style>
        
        #cabecalho {
            background-color: #1E3A8A;
            padding: 15px;
            text-align: center;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        #cabecalho a {
            color: #ffffff;
            text-decoration: none;
            font-size: 1.2em;
            margin: 0 15px;
        }

        #cabecalho a:hover {
            color: #FBBF24;
        }

        
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            padding-top: 100px; 
        }

        h2 {
            color: #1E3A8A;
            margin-bottom: 20px;
        }

        div {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        button {
            background-color: #1E3A8A;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 10px 0;
            cursor: pointer;
            font-size: 1.1em;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #3B82F6;
        }

    </style>
</head>
<body>
    <nav id="cabecalho">
        <a href="index.php">Início</a>
        <a href="create_appointment.php">Criar Novo Lembrete</a>
        <a href="view_appointments.php">Ver Lembretes</a>
        <a href="logout.php">Sair</a>
    </nav>

    <h2>Bem-vindo à sua lista de Lembretes</h2>
    <div>
        <button onclick="location.href='create_appointment.php'">Criar Novo Lembrete</button>
        <button onclick="location.href='view_appointments.php'">Ver Lembretes</button>
        <button onclick="location.href='logout.php'">Sair</button>
    </div>
</body>
</html>
