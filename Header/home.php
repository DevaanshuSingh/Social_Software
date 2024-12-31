<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location:login.php");
    exit();
}
$username=$_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home- Social Networking Platform</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main class="main-content">
        <div class="post-creation">
            <h2>Create a Post</h2>
            <form action="create_post.php" method="POST">
                <textarea name="post_content" rows="4" ppaceholder="What's on your mind?" required></textarea>
                <button type="submit">Post</button>
            </form>
        </div>

        <div class="feed">
            <h2>News Feed</h2>
            <?php
            $sql="SELECT * FROM posts ORDER BY created_at DESC";
            $result= $conn->query($sql);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo '<div class="post">';
                    echo '<h3>'. htmlspecialchars($row['user_name']).'</h3>';
                    echo '<p>'. htmlspecialchars($row['content']).'</p>';
                    echo '<div class="post-actions">';
                    echo '<button>Like</button>';
                    echo '<button>Comment</button>';
                    echo '<button>Share</button>';
                    echo '</div>';
                    echo '</div>';
                }
            }else{
                echo '<p>No posts available.</p>';
            }
            ?>
        </div>

        <aside class="sidebar">
            <h2>Suggestions for You</h2>
            <ul>
                <li><a href="#">Alokesh Ghosh</a></li>
                <li><a href="#">Manoj Singh</a></li>
                <li><a href="#">Vikram Rathore</a></li>
            </ul>
            <h2>Trending Topics</h2>
            <ul>
                <li>This is the first post!</li>
                <li>Hello, this is my second post!</li>
                <li>Just enjoying the day!</li>
            </ul>
        </aside>
    </main>

    <footer>
        <p>&copy; 2024 Alokesh Ghosh. All rights reserved.</p>
    </footer>
</body>
</html>