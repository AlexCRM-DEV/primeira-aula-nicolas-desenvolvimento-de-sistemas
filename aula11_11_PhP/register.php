<?php
require "connection.php";

if ($_POST) {
    $nome  = $_POST['nome'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO usuarios (nome, email, password)
            VALUES ('$nome', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        header("Location: login.php");
        exit;
    } else {
        $erro = "Erro ao cadastrar!";
    }
}
?>