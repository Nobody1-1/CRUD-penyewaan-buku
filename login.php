<?php
session_start();
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $koneksi->prepare('SELECT user_id, username, password FROM users WHERE username = ? LIMIT 1');
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($user_id, $username, $hashedPassword);
        $stmt->fetch();

        if (password_verify($password, $hashedPassword)) {
            // Regenerate session ID after successful login
            session_regenerate_id(true);

            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user_id;
            header('Location: index.php'); // Change to your dashboard page
            exit();
        } else {
            $error = 'Invalid username or password';
        }
    } else {
        $error = 'Invalid username or password';
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
    <title>Login Page</title>
    <link rel="stylesheet" href="css/login.css"> <!-- Add your own CSS file if needed -->
</head>

<body>
    <?php if (isset($error)) : ?>
        <div class="error-message"><?php echo $error; ?></div>
    <?php endif; ?>

    <div class="container">
        <div class="card" id="login-card">
            <h2>Login</h2>
            
            <form action="login.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" maxlength="30" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Login</button>
            </form>
            <p>Belum mempunyai akun? <a href="register.php">Register</a></p>
        </div>
    </div>
</body>
</html>
