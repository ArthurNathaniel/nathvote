<?php
// process_contestant.php

include 'db.php';

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contestantName = $_POST["contestant_name"];
    $contestantTitle = $_POST["contestant_title"];
    $voteLink = $_POST["vote_link"];

    // File upload handling
    $targetDir = "upload/";
    $targetFile = $targetDir . basename($_FILES["contestant_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["contestant_image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["contestant_image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow only certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["contestant_image"]["tmp_name"], $targetFile)) {
            // Insert data into the database
            $sql = "INSERT INTO contestants (name, title, image, vote_link) VALUES ('$contestantName', '$contestantTitle', '$targetFile', '$voteLink')";

            if ($conn->query($sql) === TRUE) {
                echo "Contestant added successfully!";
                // Redirect to the page displaying contestants
                header("Location: knust.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
