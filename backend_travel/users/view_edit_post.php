<?php
header('Content-Type: application/json');
include $_SERVER['DOCUMENT_ROOT'] . '/aplicatie_travel/utilities/connect.php';
session_start();
$id_post = $_GET['id_post'];
$sql = "SELECT `photo`, `description`
            FROM `postari` WHERE id=$id_post";
$response = [];
$result = mysqli_query($con, $sql);
while ($row = $result->fetch_assoc()) {
    array_push($response, (object) [
        "photo" => $row["photo"],
        "description" => $row["description"],
    ]);
}
$response = [
    "data" => $response
];

echo json_encode($response);
