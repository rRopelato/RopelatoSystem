<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main-box">
        <div class="theme-switch">
            <input type="checkbox" id="theme-toggle" />
            <label for="theme-toggle">
                <img src="img/sun.png" alt="Light Mode" id="theme-icon">
            </label>
        </div>
        <h2>Login on Ropelato System</h2>
        <p>Enter your login information or <a href="register.php">click here for registration.</a></p>
        
        <?php if (isset($_GET['error'])): ?>
            <p style="color: red;">
                <?php
                if ($_GET['error'] == 'invalid_username') {
                    echo 'Nome de usuário inválido.';
                } elseif ($_GET['error'] == 'incorrect_password') {
                    echo 'Senha incorreta.';
                } elseif ($_GET['error'] == 'user_not_found') {
                    echo 'Usuário não encontrado.';
                }
                ?>
            </p>
        <?php endif; ?>
        
        <form action="login.php" method="post">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <input type="checkbox" id="remember-me" name="remember-me">
                <label for="remember-me">Remember Me</label>
            </div>
            <p>Don't remember your password? <a href="recovery_request.php">Click here for recovery.</a></p>
            <button type="submit">Log In</button>
        </form>
    </div>
    <img src="img/ropelato_white.png" alt="Ropelato Logo" class="logo" id="logo-image">
    <script src="js/main.js"></script>
</body>
</html>
