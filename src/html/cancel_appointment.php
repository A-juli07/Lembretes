<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

if (isset($_POST['index'])) {
    $index = $_POST['index'];
    $file = file("agenda.txt");
    unset($file[$index]);
    file_put_contents("agenda.txt", implode("", $file));
}

header('Location: view_appointments.php');
?>
