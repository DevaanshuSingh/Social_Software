<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>

    <div class="reading-section"></div>
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="inputs">
                <div class="single">
                    <label for="full-name" class="form-label">Enter Full Name</label>
                    <input type="text" class="form-control" id="full-name" name="full-name" placeholder="Your_Name" required>
                </div>
                <div class="single">
                    <label for="password" class="form-label">Enter Password</label>
                    <input type="password" class="form-control" id="password" name="user-password" placeholder="Your_Password"
                        required>
                </div>
                <div class="single">
                    <label for="email" class="form-label">Enter Email</label>
                    <input type="email" class="form-control" id="email" name="user-email" placeholder="Your_Email"
                        required>
                </div>
            </div>
            <div class="button">
                <button type="submit" class="btn">Login</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>

<?php
require_once 'config.php';

try {
    if (isset($_POST['full-name'], $_POST['user-password'])) {
        $fullName = $_POST['full-name'];
        $userPassword = $_POST['user-password'];
        $email = $_POST['user-email'];

        foreach ($_POST as $key => $posted) {
            echo "$key: $posted<br>";
        }

        $stmt = $pdo->prepare("SELECT fullName,userPassword,email FROM users WHERE fullName=? AND userPassword=? AND email=? ");
        $stmt->execute([$fullName, $userPassword,$email]);
        $userInfo = $stmt->fetchAll();
        // print_r($userInfo);
        if ($userInfo) {
            echo "<script>
                    alert('Welcome " . strtoupper($fullName) . "');
                    window.location.href = 'use.php';
                </script>";
        } else {
            echo "<script>
            alert('Please Register First');
            </script>";
        }
    }
} catch (PDOException $e) {
    echo "Error While Registering:<br>" . $e->getMessage();
}
