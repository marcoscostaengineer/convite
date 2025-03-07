<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $whatsapp = trim($_POST['whatsapp']);

  // Validação: aceita opcionalmente '+' no início e somente dígitos
  if (!preg_match('/^\+?[0-9]+$/', $whatsapp)) {
    $_SESSION['message'] = "<p style='color: red;'>Número de WhatsApp inválido.</p>";
  } else {
    $arquivo = 'whatsapp_numbers.txt';
    // Se o arquivo não existir, inicia com uma string vazia
    $conteudo = file_exists($arquivo) ? file_get_contents($arquivo) : '';
    $conteudo .= $whatsapp . "\n";
    file_put_contents($arquivo, $conteudo);
    $_SESSION['message'] = "<p style='color: green;'>Número de WhatsApp salvo com sucesso! 😄</p>";
  }
}

header("Location: index.php");
exit;
