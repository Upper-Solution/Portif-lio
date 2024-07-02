<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = strip_tags(trim($_POST["name"]));
  $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
  $subject = strip_tags(trim($_POST["subject"]));
  $message = trim($_POST["message"]);

  if (empty($name) || empty($subject) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(["message" => "Preencha todos os campos corretamente."]);
    exit;
  }

  $recipient = "nathanrod.ads@gmail.com";
  $email_subject = "Novo contato de $name: $subject";
  $email_content = "Nome: $name\n";
  $email_content .= "Email: $email\n\n";
  $email_content .= "Mensagem:\n$message\n";

  $email_headers = "From: $name <$email>";

  if (mail($recipient, $email_subject, $email_content, $email_headers)) {
    http_response_code(200);
    echo json_encode(["message" => "Mensagem enviada com sucesso."]);
  } else {
    http_response_code(500);
    echo json_encode(["message" => "Ocorreu um erro ao enviar sua mensagem."]);
  }
} else {
  http_response_code(403);
  echo json_encode(["message" => "Acesso proibido."]);
}
?>
