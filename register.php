<?php
session_start();
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash password before saving it to the database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $koneksi->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
    $stmt->bind_param('ss', $username, $hashedPassword);

    if ($stmt->execute()) {
        header('Location: login.php');
        exit();
    } else {
        $error = 'Registration failed.';
    }

    $stmt->close();
}

$koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    
    
    <?php if (isset($error)) : ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>

    <div class="container">
    <div class="card" id="register-card">
            <h2>Register</h2>
            <form action="register.php" method="post">
                <label for="reg-username">Username:</label>
                <input type="text" id="reg-username" name="username" required>

                <label for="reg-password">Password:</label>
                <input type="password" id="reg-password" name="password" required>

                <button type="submit">Register</button>
            </form>
            <p>Sudah mempunyai akun? <a href="login.php">Login</a></p>
        </div>
    </div>

</body>
</html>
