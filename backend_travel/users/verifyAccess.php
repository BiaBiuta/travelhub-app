<?php
header('Content-Type: application/json');
include $_SERVER['DOCUMENT_ROOT'] . '/aplicatie_travel/utilities/connect.php';
// $access_number_for_find = $_GET['access_number_for_find'];
session_start();

$sessionId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
$sql_access = "SELECT access FROM `users` WHERE `id`=$sessionId";
$result = mysqli_query($con, $sql_access);
$response = [];


while ($row = $result->fetch_assoc()) {
    // echo ($row["access"]);
    array_push($response, (object) [
        "access" => $row["access"]
    ]);
}


$response = [
    "data" => $response
];

echo json_encode($response);
