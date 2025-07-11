<?php
header('Content-Type: application/json');
include $_SERVER['DOCUMENT_ROOT'] . '/aplicatie_travel/utilities/connect.php';

$sql = "SELECT `id`, `firstName`, `lastName`, `email`, `address`,`status` FROM `users`";
$result = mysqli_query($con, $sql);
$response = [];
while ($row = $result->fetch_assoc()) {
    array_push($response, (object) [
        "id" => $row["id"],
        "firstName" => $row["firstName"],
        "lastName" => $row["lastName"],
        "email" => $row["email"],
        "address" => $row["address"],
    ]);
}

$response = [
    "data" => $response
];

echo json_encode($response);
