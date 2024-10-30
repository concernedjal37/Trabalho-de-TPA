<?php
session_start();
if(isset($_SESSION['manager_id'])) {
    header("Location: view/UIGerente/index.php");
    exit;
}

require('model/Conexao.class.php');
$pdo = Conexao::get_instance();

$message = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Função para verificar o registro no do banco de dados
    $sql = "SELECT * FROM Gerente WHERE email = :email AND senha = :senha";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

    // Verifica se há um registro correspondente
    if ($stmt->rowCount() > 0) {
        // O login foi bem-sucedido, redireciona para a página de boas-vindas
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['manager_id'] = $user['idgerente'];
        header('Location: view/UIGerente/');
        exit();
    } else {
        // O login falhou, exibe uma mensagem de erro
        $message = 'Nome de usuário ou senha incorretos';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if (isset($message)) : ?>
        <p style="color: red;"><?php echo $message; ?></p>
    <?php endif; ?>
   <form method="post">
   <div class="row justify-content-center">
        <div class="col-md-6">
        <h2 class="mt-5">Login</h2>
        <form method="post">
        <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="text" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
        <label for="senha" class="form-label">Senha:</label>
        <input type="password" class="form-control" id="senha" name="senha">
        </div>
       <button type="submit">Logar</button>
    </form>
    <p class="mt-3 text-danger"><?php echo $message; ?></p>
    <p>Não tem conta? <a href="view/UIGerente/Cadastrar.php">Cadastre-se</a></p>
    <p>Logar Como Usuario? <a href="index.php">Logar</a></p>
</body>
</html>