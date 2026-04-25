<?php
declare(strict_types=1);

$host = 'localhost';
$usuarioBanco = 'root';
$senhaBanco = '';
$nomeBanco = 'sistema_login';

$mensagem = '';
$tipoMensagem = 'error';
$email = trim($_POST['email'] ?? '');
$senha = trim($_POST['senha'] ?? '');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $mensagem = 'Acesse esta página pelo formulário de login.';
} elseif ($email === '' || $senha === '') {
    $mensagem = 'Preencha o email e a senha para continuar.';
} else {
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
        $conexao = new mysqli($host, $usuarioBanco, $senhaBanco, $nomeBanco);
        $conexao->set_charset('utf8mb4');

        $sql = 'SELECT id, email FROM usuarios WHERE email = ? AND senha = ? LIMIT 1';
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param('ss', $email, $senha);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $usuario = $resultado->fetch_assoc();

        if ($usuario) {
            $mensagem = 'Login realizado com sucesso para ' . htmlspecialchars($usuario['email'], ENT_QUOTES, 'UTF-8') . '.';
            $tipoMensagem = 'success';
        } else {
            $mensagem = 'Email ou senha incorretos. Tente novamente.';
        }

        $stmt->close();
        $conexao->close();
    } catch (mysqli_sql_exception $erro) {
        $mensagem = 'Nao foi possivel conectar ao banco de dados. Verifique se o MySQL esta ativo e se o banco sistema_login foi criado.';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="page">
        <section class="card result-card">
            <p class="eyebrow">Resultado da validacao</p>
            <h1><?php echo $tipoMensagem === 'success' ? 'Acesso liberado' : 'Acesso negado'; ?></h1>
            <div class="result-message <?php echo $tipoMensagem; ?>">
                <?php echo htmlspecialchars($mensagem, ENT_QUOTES, 'UTF-8'); ?>
            </div>
            <a href="login.html" class="back-link">Voltar para o formulario</a>
        </section>
    </main>
</body>
</html>
