<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

if (isset($_POST['index'])) {
    $index = $_POST['index'];
    $file = file("agenda.txt");
    $appointment = trim($file[$index]);
    $file[$index] = $appointment . "|Concluído\n";
    file_put_contents("agenda.txt", implode("", $file));
}

header('Location: view_appointments.php');
?>
