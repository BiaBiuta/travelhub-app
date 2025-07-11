<?php
header('Content-Type: application/json');
include $_SERVER['DOCUMENT_ROOT'] . '/aplicatie_travel/utilities/connect.php';
session_start();

$sessionId = $_SESSION['user_id'];

$sql = "SELECT c.id, c.id_user as commentUser, `id_post`, c.description AS commentDescription, c.dateTime,u.lastName,u.firstName, u.profile_photo FROM `comments`AS c INNER JOIN `users`AS u on u.id=c.id_user  INNER JOIN `postari` as p on c.id_post=p.id WHERE p.id_user=$sessionId   and c.id_user!=$sessionId ORDER BY c.dateTime DESC LIMIT 5 ";
$response = [];
$result = mysqli_query($con, $sql);
while ($row = $result->fetch_assoc()) {
    array_push($response, (object) [
        "lastName" => $row["lastName"],
        "firstName" => $row["firstName"],
        "commentUser" => $row["commentUser"],
        "id_post" => $row["id_post"],
        "commentDescription" => $row["commentDescription"],
        "dateTime" => $row["dateTime"],
        "profile_photo" => $row["profile_photo"]
    ]);
}
$response = [
    "data" => $response
];

echo json_encode($response);
