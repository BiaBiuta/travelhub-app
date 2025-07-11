<?php
header('Content-Type: application/json');
include $_SERVER['DOCUMENT_ROOT'] . '/aplicatie_travel/utilities/connect.php';
session_start();

$user_id = isset($_GET["user_id"]) ? intval($_GET["user_id"]) : 0;
$response = [];
$response_all = [];
$sql2 = "SELECT `id`, `name` FROM `access`";
$result3 = mysqli_query($con, $sql2);
while ($row3 = $result3->fetch_assoc()) {
    $response_all[] = (object) [
        "id" =>  $row3['id'],
        "name" => $row3['name']
    ];
}

$sql_access = "SELECT access FROM `users` WHERE `id`=$user_id";
$result = mysqli_query($con, $sql_access);

while ($row = $result->fetch_assoc()) {
    $accessNames = [];

    if (!empty($row["access"])) {
        $elements = explode(",", $row["access"]);
        foreach ($elements as $element) {
            $accessNames[] = $element;
        }
    }


    array_push($response, (object) [
        "access" => $accessNames,
        "access_all" => $response_all
    ]);
}


if (empty($response)) {
    $response[] = (object) [
        "access" => [],
        "access_all" => $response_all
    ];
}

$response = [
    "data" => $response
];

echo json_encode($response);
