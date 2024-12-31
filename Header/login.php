<?php

session_start();
include 'db.php';

$error_message="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows>0){
        $user = $result->fetch_assoc();

        if(password_verify($password, $user['password'])){
            echo "Password verified. Redirecting...";
            $_SESSION['user_id'] = $user['id'];
            $SESSION['username']=$user['username'];
            header("Location: home.php");
            exit();
        }else{
            $error_message = "Invalid username or password";
        }
        
    }else{
        $error_message="Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login- Social Networking Platform</title>
    <link ref="stylesheet" href="Header/index.css">
</head>
<body>
    <header>
        <h1>Social Networking Platform</h1>
    </header>

    <main class="main-content">
        <h2>Login</h2>
        <?php if($error_message): ?>
            <p class="error"><?php echo htmlspecialchars($error_message); ?></p>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a>.</p>
    </main>

    <footer>
        <p>&copy; 2025 Alokesh Ghosh. All rights reserved.</p>
    </footer>
</body>
</html>