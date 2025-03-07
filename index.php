<?php
session_start();
$message = "";
if (isset($_SESSION['message'])) {
  $message = $_SESSION['message'];
  unset($_SESSION['message']);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Um convite especial para você!</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Um convite especial para você! 💖</h1>
  <p>Preparei um convite especial para você, e quero saber sua resposta! 😉</p>
  <p><strong>Aceita sair comigo neste Sábado às 20:00?</strong></p>
  <button id="sim">Sim, adoraria!</button>
  <button id="nao">Não, obrigada(o)</button>

  <div id="form-whatsapp" style="display: none;">
    <h2>Deixe seu WhatsApp para te confirmar os detalhes!</h2>
    <form id="whatsapp-form" method="post" action="process.php">
      <input type="text" id="whatsapp" name="whatsapp" placeholder="Seu número de WhatsApp" required>
      <input type="submit" value="Enviar">
    </form>
  </div>

  <!-- Exibe a mensagem de sucesso ou erro -->
  <?php echo $message; ?>

  <script src="script.js"></script>
  <script>const botaoNao = document.getElementById("nao");

    // Faz o botão "Não" se mover aleatoriamente dentro da tela
    botaoNao.addEventListener("click", () => {
      botaoNao.style.position = "absolute";
      botaoNao.style.left = `${Math.random() * (window.innerWidth - botaoNao.offsetWidth)}px`;
      botaoNao.style.top = `${Math.random() * (window.innerHeight - botaoNao.offsetHeight)}px`;
    });</script>
</body>
</html>
