<?php
header('Content-Type: application/json');
include $_SERVER['DOCUMENT_ROOT'] . '/aplicatie_travel/utilities/connect.php';
session_start();
$id_post = $_GET['id_post'];
$user_id = $_GET['user_id'];
$sql = "SELECT c.id, `id_user`, `id_post`, `description`, `dateTime`,u.lastName,u.firstName FROM `comments`AS c
             INNER JOIN `users`AS u on u.id=c.id_user WHERE `id_post`=$id_post";
$response = [];
$result = mysqli_query($con, $sql);
while ($row = $result->fetch_assoc()) {
    array_push($response, (object) [
        "lastName" => $row["lastName"],
        "firstName" => $row["firstName"],
        "id_user" => $row["id_user"],
        "id_post" => $row["id_post"],
        "description" => $row["description"],
        "dateTime" => $row["dateTime"]
    ]);
}
$response = [
    "data" => $response
];

echo json_encode($response);
