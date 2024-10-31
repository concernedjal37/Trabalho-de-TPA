<?php
require('../../model/Conexao.class.php');
$pdo = Conexao::get_instance();

function Cadastrar($pdo, $email, $senha) {
    //null,   , null, null, null, null
    $sql = "INSERT INTO Usuario (email, senha) VALUES (:email, :senha)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
    return $stmt->execute();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (Cadastrar($pdo, $email, $senha)) {
        $_SESSION['mensagem'] = 'Registro inserido com sucesso! <a href="../../">Voltar para logar</a>';
    } else {
        $_SESSION['mensagem'] = 'Erro ao inserir o registro.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/Cadastradores.css">
            <!--ìcone navegador-->
            <link rel="shortcut icon" href="../resources/favicon.png" type="image/x-icon">

<!--Bootstrap 5-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"/>

<!--Icones Bootstrap 5-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />

<!--Google Fonts-->
<link href="fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>
</head>
<body>
<?php if (isset($_SESSION['mensagem'])): ?>
        <p><?php echo $_SESSION['mensagem']; ?></p>
        <?php unset($_SESSION['mensagem']); ?>
    <?php endif; ?>
    <form method="POST">

        <label for="email">E-mail:</label>
        <input type="email" class="form-control" id="email" name="email" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" class="form-control" id="senha" name="senha" required><br><br>

        <input type="submit" name="submit" class="btn btn-primary btn-sm" value="Inserir Registro">
    </form>    
    <hr>
</body>
</html>