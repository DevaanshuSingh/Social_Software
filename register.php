<?php
require_once 'config.php';

try {
    if (isset($_POST['full-name'], $_POST['user-name'], $_POST['user-password'], $_POST['location'], $_POST['dob'], $_POST['bio'], $_POST['intrests'], $_FILES['image'])) {
        $fullName = $_POST['full-name'];
        $userName = $_POST['user-name'];
        $userPassword = $_POST['user-password'];
        $location = $_POST['location'];
        $dob = $_POST['dob'];
        $bio = $_POST['bio'];
        $intrests = $_POST['intrests'];

        $imagePath = null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['image']['tmp_name'];
            $fileName = $_FILES['image']['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

            if (in_array($fileExtension, $allowedExts)) {
                $uploadFileDir = './uploaded_files/';
                if (!is_dir($uploadFileDir)) {
                    mkdir($uploadFileDir, 0755, true);
                }

                $dest_path = $uploadFileDir . uniqid() . '.' . $fileExtension;

                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    $imagePath = $dest_path;
                } else {
                    die("Error moving the uploaded file.");
                }
            } else {
                die("Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.");
            }
        } else {
            die("No file uploaded or there was an upload error.");
        }

        foreach ($_POST as $key => $posted) {
            echo "$key: $posted<br>";
        }

        $stmt = $pdo->prepare("INSERT INTO users (full_name, username, bio, location, dob, interests, profile_picture) VALUES (?, ?, ?, ?, ?, ?, ?)");

        if ($stmt->execute([$fullName, $userName, $bio, $location, $dob, $intrests, $imagePath])) {
            echo "<script>alert('Registration successful')<script>";
        } else {
            echo "<script>alert('Not Regestered')<script>";
        }
    } else {
        die("Required data not provided.");
    }
} catch (PDOException $e) {
    echo "Error While Registering:<br>" . $e->getMessage();
}
