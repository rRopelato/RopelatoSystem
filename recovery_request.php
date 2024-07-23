<?php
session_start(); // Inicia a sessão
require 'db_connect.php';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($errors)) {
        // Verificação de existência do email no banco de dados
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Armazena o email na sessão
            $_SESSION['recovery_email'] = $email;
            
            // Simulação do envio do email com o token
            header("Location: token_verification.php");
            exit();
        } else {
            $errors[] = "Email not found.";
        }
        $stmt->close();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Recovery</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main-box">
        <h2>Password Recovery</h2>
        <?php
        if (!empty($errors)) {
            echo '<div class="errors">';
            foreach ($errors as $error) {
                echo '<p>' . htmlspecialchars($error) . '</p>';
            }
            echo '</div>';
        }
        ?>
        <form action="recovery_request.php" method="post">
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <button type="submit">Send Recovery Email</button>
            <p><a href="index.php">Go back to login.</a></p>
        </form>
    </div>
</body>
</html>
