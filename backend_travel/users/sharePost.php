<?php
header('Content-Type: application/json');
include $_SERVER['DOCUMENT_ROOT'] . '/aplicatie_travel/utilities/connect.php';
session_start();
$id_user = $_SESSION['user_id'];
$post_id = $_POST['id_post'];
$user_to_id = $_POST['user_to_id'];
$sql = "INSERT INTO `shares`(`id_user_from`, `id_user_to`,`id_post`,`dateTime`) VALUES ('" . $id_user . "','" . $user_to_id . "','" . $post_id . "'," . "NOW()" . ")";
$response = [];
$result = mysqli_query($con, $sql);
if ($result) {
    header("Location: http://localhost/aplicatie_travel/forum.php");
} else {
    echo "am intrat aici ";
    header("Location: ../index.php");
}
