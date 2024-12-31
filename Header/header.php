<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Networking Platform</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <div class="Logo">
            <img src="facebook.png" alt="MySocial Logo" class="logo-image">
        </div>
        <nav class="navigation">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="messages.php">Messages</a></li>
                <li><a href="notification.php">Notifications</a></li>
                <li><a href="settings.php">Settings</a></li>
            </ul>
        </nav>
        <div class="search-bar">
            <input type="text" placeholder="Search....">
        </div>
        <div class="user-profile">
            <img src="samy.png" alt="User Profile" class="profile-icon">
            <div class="dropdown">
                <button class="dropbtn">▼</button>
                <div class="dropdown-content">
                    <a href="account-settings.php">Account Settings</a>
                    <a href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </header>
</body>
</html>