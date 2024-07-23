<?php
session_start();
require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verifica se o nome de usuário contém caracteres suspeitos
    if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $username)) {
        // Redireciona para a página de login com mensagem de erro
        header("Location: index.php?error=invalid_username");
        exit();
    }

    // Consulta preparada para evitar injeção SQL
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $username, $hashed_password);
        $stmt->fetch();
        if (password_verify($password, $hashed_password)) {
            // Login bem-sucedido
            $_SESSION['user_id'] = $id;
            header("Location: dashboard.php");
            exit();
        } else {
            // Senha incorreta
            header("Location: index.php?error=incorrect_password");
            exit();
        }
    } else {
        // Usuário não encontrado
        header("Location: index.php?error=user_not_found");
        exit();
    }

    $stmt->close();
}
$conn->close();
?>
