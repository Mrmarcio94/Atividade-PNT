<?php
require_once 'includes/config.php';
$erro = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nome = $_POST['nome'];     
  $telefone = $_POST['telefone'];
  $endereco = $_POST['endereco'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $hash = password_hash($senha, PASSWORD_DEFAULT);

  try {
    $stmt = $pdo->prepare("INSERT INTO cliente(nome, telefone, endereco, email, senha) VALUES(?, ?, ?, ?, ?)");
    $stmt->execute([$nome, $telefone, $endereco, $email, $hash]);
    header("Location: login.php");
    exit;
  } catch (PDOException $e) {
      if ($e->getCode() == '23000') {
        $erro = "Email já cadastrado!";
      } else {
        $erro = "Ocorreu um erro ao realizar o cadastro. Tente novamente.";
      } 
  }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
</head>
<body>
  <div id="div-h1">
    <h1>Cadastre-se e seja nosso parceiro!</h1>
    <?php if ($erro) echo "<p style='background:#fee2e2; color:#ef4444'>$erro</p>"; ?>
  </div>  
  <div id="div-cadastro">    
    <form id="form-cadastro" action="" method="post">
      <label for="nome"><b>Nome</b></label>
      <input id="nome" type="text" name="nome" placeholder="Digite seu nome">
      <label for="telefone"><b>Telefone</b></label>
      <input id="telefone" type="tel" name="telefone" placeholder="(81)9999-9999">
      <label for="endereco"><b>Endereço</b></label>
      <input id="endereco" type="text" name="endereco"  placeholder="Rua do Cajú, 136, Cajueiro, Recife-PE ">
      <label for="email"><b>Email</b></label>
      <input id="email" type="email" name="email" placeholder="seuemail@email.com" required>
      <label for="senha"><b>Senha</b></label>
      <input id="senha" type="password" name="senha" placeholder="Digite sua senha" minlength="8" required >
      <label for="repetir-senha"><b>Repetir senha</b></label>
      <input id="repetir-senha" type="password"  placeholder="Repita sua senha" minlength="8" required >
      <button id="botaoCadastro" type="submit"><b>Cadastrar</b></button>
    </form>
  </div>
  <main>
  </main>
  <footer>
      <p><b>© 2026 Feira do Porto. Todos os direitos reservados.</b></p>
  </footer>   
</body>
</html>