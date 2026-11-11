<?php
session_start();
require_once 'includes/config.php';
$erro = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $stmt = $pdo->prepare("SELECT FROM cliente WHERE email = ?");
  $stmt->execute([$_POST['email']]);
  $u = $stmt->fetch();


  if ($u && password_verify($_POST['senha'], $u['senha'])) {
    $_SESSION['usuario_id'] = $u['id'];
    $_SESSION['usuario_nome'] = $u['nome'];
    $_SESSION['usuario_telefone'] = $u['telefone'];
    $_SESSION['usuario_endereco'] = $u['endereco'];
    $_SESSION['usuario_email'] = $u['email'];
    header("Location: index.html");
    exit;
  } else {
    $erro = "Email ou senha incorretos";
  }

}

?>




<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Feira do Porto</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/script.js" defer></script>
</head>
<body>
  <div id="div-h1">
    <h1>Bem-vindo à Feira do Porto!</h1>
    <?php if ($erro) echo "<div class='alert' style='background:#fee2e2; color:#ef4444'>$erro</div>"; ?>
  </div>  
  <div id="div-login">    
    <form id="form-login" action="" method="post">
      <label for="email"><b>Email</b></label>
      <input id="email" type="email" placeholder="seuemail@email.com" name="email" required>
      <label for="senha"><b>Senha</b></label>
      <input id="senha" type="password" placeholder="Digite sua senha" minlength="8" name="senha" required >
      <button id="botaoLogin" type="submit"><b>Entrar</b></button>
      <p id="p-login">Não tem cadastro?<a href="cadastro.html">Clique aqui!</a></p>
    </form>
  </div>
  <main>
  </main>
  <footer>
      <p><b>© 2026 Feira do Porto. Todos os direitos reservados.</b></p>
  </footer>
</body>

</html>
