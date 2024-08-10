<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

$name = $_POST['name'];
$service = $_POST['service'];
$specialty = $_POST['specialty'];
$time = $_POST['time'];

$file = fopen("agenda.txt", "a");
fwrite($file, "$name|$service|$specialty|$time\n");
fclose($file);

header('Location: index.php');
?>
