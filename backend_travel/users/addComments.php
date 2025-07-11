<?php
header('Content-Type: application/json');
include $_SERVER['DOCUMENT_ROOT'] . '/aplicatie_travel/utilities/connect.php';
session_start();
$id_user = $_SESSION['user_id'];
$post_id = $_POST['post_id'];
$commentText = $_POST['commentText'];
$sql = "INSERT INTO `comments`(`id_user`, `id_post`, `description`, `dateTime`) VALUES ('" . $id_user . "','" . $post_id . "','" . $commentText .
    "'," . "NOW()" . ")";
$response = [];
$result = mysqli_query($con, $sql);
if ($result) {
    header("Location: http://localhost/aplicatie_travel/forum.php");
} else {
    echo "am intrat aici ";
    header("Location: ../index.php");
}
