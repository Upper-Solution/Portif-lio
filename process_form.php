<?php
// Verifica se o método de requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Processa os dados recebidos do formulário
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Configurações para enviar email
    $to = "upperresolution@gmail.com";
    $subjectEmail = "Nova mensagem do formulário de contato";
    $messageEmail = "Nome: $name\n";
    $messageEmail .= "Email: $email\n";
    $messageEmail .= "Assunto: $subject\n\n";
    $messageEmail .= "Mensagem:\n$message";

    // Envia o email
    $headers = "From: $email";

    // Função mail() para enviar o email
    if (mail($to, $subjectEmail, $messageEmail, $headers)) {
        echo 'success';
    } else {
        echo 'Erro ao enviar email. Por favor, tente novamente mais tarde.';
    }
}
?>
