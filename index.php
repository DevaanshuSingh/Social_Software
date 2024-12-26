<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>
    <div class="container">

        <div class="signup">
            <!-- <div class="signup-heading use-heading"><u><strong>SIGNUP</strong></u></div> -->
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="full-name" class="form-label">Enter Full Name</label>
                    <input type="text" class="form-control" id="full-name" name="full-name" required>
                </div>
                <div class="mb-3">
                    <label for="user-name" class="form-label">Enter User Name/Short Name</label>
                    <input type="text" class="form-control" id="user-name" name="user-name" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="user-password" required>
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Enter Location</label>
                    <input type="text" class="form-control" id="location" name="location" required>
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Enter DOB</label>
                    <input type="date" class="form-control" id="dob" name="dob" required>
                </div>
                <div class="mb-3">
                    <label for="bio" class="form-label">Enter Bio</label>
                    <input type="text" class="form-control" id="bio" name="bio" required>
                </div>
                <div class="mb-3">
                    <label for="intrests" class="form-label">Enter Intrests</label>
                    <input type="text" class="form-control" id="intrests" name="intrests" required>
                </div>
                <div class="mb-3">
                    <label for="picture" class="form-label"><strong>Choose Profile
                            Picture</strong></label>
                    <input type="file" class="form-control" id="picture" name="image" accept="image/*"
                        capture="environment" required>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</body>

</html>

<?php

if (isset(
    $_POST['full-name'],
    $_POST['user-name'],
    $_POST['user-password'],
    $_POST['location'],
    $_POST['dob'],
    $_POST['bio'],
    $_POST['intrests'],
    $_POST['image'])) {
        
        // file jhamela
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['image']['tmp_name'];
            $fileName = $_FILES['image']['name'];
            $fileSize = $_FILES['image']['size'];
            $fileType = $_FILES['image']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            // Define allowed file extensions
            $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

            if (in_array($fileExtension, $allowedExts)) {
                // Define upload path
                $uploadFileDir = './uploaded_files/';
                $dest_path = $uploadFileDir . $fileName;

                // Create directory if it doesn't exist
                if (!is_dir($uploadFileDir)) {
                    mkdir($uploadFileDir, 0755, true);
                }

                // Move the file to the upload directory
                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    $imagePath = $dest_path;
                } else {
                    echo "Error moving the uploaded file.";
                    exit;
                }
            } else {
                echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
                exit;
            }
        } else {
            echo "No file uploaded or there was an upload error.";
            exit;
        }
        // file jhamela

        // print_r($_POST);
foreach($_POST as $post){
    echo $post."<br>";
}

echo "<script>ok</script>";
}
else{
    echo "<script>Not ok</script>";
}