<?php
session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email');

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_usuarios = "INSERT INTO usuarios (nome, email, criado) VALUE('$nome', '$email', NOW())";
$resultado = mysqli_query($conn, $result_usuarios);

if (mysqli_insert_id($conn)){
    $_SESSION['msg'] = "<p style='color:green;'> Prontinho! Agora você faz parte da nossa equipe.</p>";
    header("Location: formulario.html");
}else{
    $_SESSION['msg'] = "<p style='color:red;'> Poxa! algo de errado aconteceu. Por favor, tente novamente.</p>";
    header("Location: formulario.html");
}

?>