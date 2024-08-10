<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'DCC916A' && $password === '123') {
        $_SESSION['loggedin'] = true;
        header('Location: index.php');
        exit;
    } else {
        echo "Login ou senha incorretos.";
    }
}
?>

