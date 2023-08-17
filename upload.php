<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "repo_db";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the file was uploaded without errors
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check for connection errors
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the file already exists
        if (file_exists($targetFile)) {
            echo "Error: File already exists.";
            exit;
        }

        // Check file size (max size: 2MB)
        $maxFileSize = 2 * 1024 * 1024; // 2MB in bytes
        if ($_FILES["image"]["size"] > $maxFileSize) {
            echo "Error: File size exceeds the limit (2MB).";
            exit;
        }

        // Allow only specific file types (e.g., JPEG, PNG, GIF)
        $allowedFileTypes = array("jpg", "jpeg", "png", "gif");
        if (!in_array($imageFileType, $allowedFileTypes)) {
            echo "Error: Only JPG, JPEG, PNG, and GIF files are allowed.";
            exit;
        }

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Save the file path to the database
            $sql = "INSERT INTO `id_picture`(`image_name`) VALUES ('$targetFile')";
            if ($conn->query($sql) === TRUE) {
                echo $targetFile;
               
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error: Unable to upload the file.";
        }

        $conn->close();
    } else {
        echo "Error: No file was uploaded.";
    }
}
?>


