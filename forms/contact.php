<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $to = 'nathanrod.ads@gmail.com'; // Altere para o endereço de email para onde deseja enviar as mensagens
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    $fullMessage = "Nome: $name\nEmail: $email\n\nMensagem:\n$message";

    if (mail($to, $subject, $fullMessage, $headers)) {
        echo 'Mensagem enviada com sucesso';
    } else {
        echo 'Falha no envio da mensagem';
    }
} else {
    echo 'Método de requisição inválido.';
}
?>