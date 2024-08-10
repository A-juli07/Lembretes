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
    <title>Ver Agendamentos</title>
    <link rel="stylesheet" href="style.css">
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
            min-height: 100vh;
        }

        h2 {
            color: #1E3A8A;
            margin-bottom: 20px;
        }

        .appointment {
            background-color: #ffffff;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 500px;
            text-align: left;
        }

        .appointment p {
            margin: 5px 0;
            color: #4B5563;
        }

        form {
            display: inline-block;
            margin: 5px 0;
        }

        input[type="submit"] {
            background-color: #1E3A8A;
            color: white;
            border: none;
            padding: 10px 15px;
            margin-top: 10px;
            cursor: pointer;
            font-size: 1em;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #3B82F6;
        }

        .back-button {
            background-color: #6B7280;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-top: 20px;
            cursor: pointer;
            font-size: 1em;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #4B5563;
        }

    </style>
</head>
<body>
    <h2>Lembretes</h2>
    <?php
    $file = fopen("agenda.txt", "r");
    $appointments = [];
    while (($line = fgets($file)) !== false) {
        $line = trim($line);
        if (!empty($line)) {
            $appointments[] = $line;
        }
    }
    fclose($file);
    ?>

    <?php if (count($appointments) > 0): ?>
        <?php foreach ($appointments as $index => $appointment): ?>
            <?php 
            $fields = explode("|", $appointment);
            if (count($fields) === 4): 
                list($name, $service, $specialty, $time) = $fields;
            ?>
                <div class="appointment">
                    <p><strong>Titulo:</strong> <?= htmlspecialchars($name) ?></p>
                    <p><strong>Dia:</strong> <?= htmlspecialchars($service) ?></p>
                    <p><strong>Descrição:</strong> <?= htmlspecialchars($specialty) ?></p>
                    <p><strong>Horário:</strong> <?= htmlspecialchars($time) ?></p>
                    <form action="cancel_appointment.php" method="post">
                        <input type="hidden" name="index" value="<?= $index ?>">
                        <input type="submit" value="Cancelar Agendamento">
                    </form>
                    <form action="edit_appointment.php" method="post">
                        <input type="hidden" name="index" value="<?= $index ?>">
                        <input type="submit" value="Editar Agendamento">
                    </form>
                    <form action="complete_appointment.php" method="post">
                        <input type="hidden" name="index" value="<?= $index ?>">
                        <input type="submit" value="Concluir Agendamento">
                    </form>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Não há Lembretes.</p>
    <?php endif; ?>

    <button class="back-button" onclick="location.href='index.php'">Voltar</button>
</body>
</html>
