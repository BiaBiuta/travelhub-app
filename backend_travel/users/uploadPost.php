<?php
header('Content-Type: application/json');
include $_SERVER['DOCUMENT_ROOT'] . '/aplicatie_travel/utilities/connect.php';
session_start();
$target_dir = "C:/xampp/htdocs/aplicatie_travel/uploads/";
$traget_dir_simplu = "uploads/";
$target_file_simplu = $traget_dir_simplu . basename($_FILES["photo"]["name"]);
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$file = $_FILES['photo']['name'];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$check = getimagesize($_FILES["photo"]["tmp_name"]);
if ($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
} else {
    echo "File is not an image.";
    $uploadOk = 0;
}
if (file_exists($target_file)) {
    $description = $_POST['description'];

    $id_user = $_SESSION['user_id'];
    $sql = "INSERT INTO `postari`(`photo`, `description`, `id_user`, `dateTime`) VALUES ('" . $target_file_simplu . "','" . $description . "','" . $id_user . "'," . "NOW()" . ")";

    $response = [];
    $result = mysqli_query($con, $sql);
    if ($result) {
        header("Location: http://localhost/aplicatie_travel/profile.php");
    } else {
        echo "am intrat aici ";
        header("Location: ../index.php");
    }
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["photo"]["name"])) . " has been uploaded.";
        $description = $_POST['description'];

        $id_user = $_SESSION['user_id'];
        $sql = "INSERT INTO `postari`(`photo`, `description`, `id_user`, `dateTime`) VALUES ('" . $target_file_simplu . "','" . $description . "','" . $id_user . "'," . "NOW()" . ")";

        $response = [];
        $result = mysqli_query($con, $sql);
        if ($result) {
            header("Location: http://localhost/aplicatie_travel/profile.php");
        } else {
            echo "am intrat aici ";
            header("Location: ../index.php");
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
