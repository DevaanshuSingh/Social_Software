<?php
session_start();
include 'db.php';

$post_content="";
$error_message="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $post_content = $_POST['content'];
    $username=$_SESSION['username'];

    $sql="INSERT INTO posts(user_name,content)VALUES('$username','$content')";

    if($conn->query($sql) === TRUE){
        header("Location: index.php");
        exit();
    }else{
        echo "Error: " .$conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post- Social Networking Platform</title>
    <link rel="stylesheet" href="Header/index.css">
</head>
<body>
    <header>
        <h1>Social Networking Platform</h1>
    </header>

    <main class="main-content">
        <h2>Create Post</h2>
        <form action="create_post.php" method="POST">
            <textarea name="content"  required></textarea>
                <button type="submit">Post</button>
            </form>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Alokesh Ghosh. All rights reserved.</p>
    </footer>
</body>
</html>