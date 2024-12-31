<?php
include 'db.php';

$sql="SELECT * FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Social Networking Platform</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <header>
        <h1>Social Networking Platform</h1>
        <nav>
            <a href="create_post.php">Create Post</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <main class="main-content">
        <h2>Recent Posts</h2>
        <?php if($result->num_rows>0): ?>
            <div class="posts">
                <?php while($row = $result->fetch_assoc()): ?>
                    <div class="post">
                        <h3><?php echo htmlspecialchars($row['user_name']);  ?></h3>
                        <p><?php echo htmlspecialchars($row['content']); ?></p>
                        <small>Posted on: <?php echo htmlspecialchars($row['created_at']); ?></small>
                </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p>No posts found. Be the first to <a href="create_post.php">Create a post</a>!</p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2025 Alokesh Ghosh. All rights preserved</p>
    </footer>
</body>
</html>

<?php
$conn->close();
?>