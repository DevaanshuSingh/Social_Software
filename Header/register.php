<?php

session_start();
include 'db.php';

$error_message="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql="SELECT * FROM users WHERE Username='$username'";
    $result = $conn->query($sql);

    if($result->num_rows>0){
        $error_message="Username already exits.";
    }else{
        $sql="INSERT INTO users (Username, password) VALUES ('$username', '$password')";
        if($conn->query($sql) === TRUE){
            $_SESSION['username']=$username;
            header('Location: index.php');
            exit();
        }else{
            $error_message="Error: "  . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register- Social Networking Platform</title>
    <link rel="stylesheet" href="Header/index.css">
</head>
<body>
    <header>
        <h1>Social Networking Platform</h1>
    </header>

    <main class="main-content">
        <h2>Register</h2>
        <?php if($error_message): ?>
            <p class="error"><?php echo htmlspecialchars($error_message); ?></p>
        <?php endif; ?>
        
        <form action="register.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </main>

    <footer>
        <p>&copy; 2025 Alokesh Ghosh. All rights reserved.</p>
    </footer>
</body>
</html>