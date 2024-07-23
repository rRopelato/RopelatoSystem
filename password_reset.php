<?php
session_start();
require 'db_connect.php';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($new_password) || empty($confirm_password)) {
        $errors[] = "All fields are required.";
    } elseif ($new_password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    if (empty($errors)) {
        // Recupera o email do usuário da sessão
        $email = $_SESSION['recovery_email'] ?? '';

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email address.";
        } else {
            // Cria o hash da nova senha
            $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

            // Atualiza a senha no banco de dados
            $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
            $stmt->bind_param("ss", $hashed_password, $email);
            if ($stmt->execute()) {
                echo "Password updated successfully.";
                // Remove o email da sessão após a atualização
                header("Location: index.php"); // Redireciona para a página de login após a atualização
                unset($_SESSION['recovery_email']);
                exit();
            } else {
                $errors[] = "An error occurred. Please try again.";
            }
            $stmt->close();
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main-box">
        <h2>Password Reset</h2>
        <?php
        if (!empty($errors)) {
            echo '<div class="errors">';
            foreach ($errors as $error) {
                echo '<p>' . htmlspecialchars($error) . '</p>';
            }
            echo '</div>';
        }
        ?>
        <form action="password_reset.php" method="post">
            <div class="input-group">
                <label for="new_password">New Password</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>
            <div class="input-group">
                <label for="confirm_password">Confirm New Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit">Reset Password</button>
        </form>
    </div>
</body>
</html>
