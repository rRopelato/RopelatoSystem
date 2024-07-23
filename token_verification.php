<?php
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = trim($_POST['token']);

    if (empty($token)) {
        $errors[] = "Token is required.";
    } elseif ($token !== 'abc123') {
        $errors[] = "Invalid token.";
    }

    if (empty($errors)) {
        header("Location: password_reset.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Token Verification</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main-box">
        <h2>Token Verification</h2>
        <?php
        if (!empty($errors)) {
            echo '<div class="errors">';
            foreach ($errors as $error) {
                echo '<p>' . htmlspecialchars($error) . '</p>';
            }
            echo '</div>';
        }
        ?>
        <form action="token_verification.php" method="post">
            <div class="input-group">
                <label for="token">Token</label>
                <input type="text" id="token" name="token" required>
            </div>
            <button type="submit">Verify Token</button>
            <p>Use 'abc123' because this is only a test</p>
        </form>
    </div>
</body>
</html>
