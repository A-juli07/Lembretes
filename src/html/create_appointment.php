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
    <title>Criar Agendamento</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        
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
        }

        h2 {
            color: #1E3A8A;
            margin-bottom: 20px;
        }

        
        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            width: 300px;
        }

        label {
            margin-bottom: 10px;
            color: #4B5563;
        }

        input[type="text"], input[type="date"], input[type="time"], input[type="submit"] {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #d1d5db;
            font-size: 1em;
        }

        input[type="text"], input[type="date"], input[type="time"] {
            width: calc(100% - 30px);
            box-sizing: border-box;
            padding-left: 30px;
            position: relative;
        }

        input[type="submit"] {
            background-color: #1E3A8A;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #3B82F6;
        }

        
        .input-icon {
            position: relative;
            width: 100%;
        }

        .input-icon i {
            position: absolute;
            top: 10px;
            left: 10px;
            color: #6B7280;
            font-size: 1.2em;
        }

        
        button {
            background-color: #6B7280;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-top: 10px;
            cursor: pointer;
            font-size: 1em;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #4B5563;
        }

    </style>
</head>
<body>
    <h2>Criar Novo Lembrete</h2>
    <form action="agenda.php" method="post">
        <label for="name">Título:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="service">Dia:</label>
        <div class="input-icon">
            <i class="fas fa-calendar-alt"></i>
            <input type="date" id="service" name="service" required>
        </div>
        
        <label for="specialty">Descrição:</label>
        <input type="text" id="specialty" name="specialty" required>
        
        <label for="time">Horário:</label>
        <div class="input-icon">
            <i class="fas fa-clock"></i>
            <input type="time" id="time" name="time" required>
        </div>
        
        <input type="submit" value="Cadastrar">
    </form>
    <button onclick="location.href='index.php'">Voltar</button>
</body>
</html>
