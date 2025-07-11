<?php
$id_user = $_GET['user_id'];
// echo $id_user;
header('Content-Type: application/json');
include $_SERVER['DOCUMENT_ROOT'] . '/aplicatie_travel/utilities/connect.php';

$id_user = $_GET['user_id'];

$sql_display = "SELECT * FROM `departments`";
$result = mysqli_query($con, $sql_display);

if ($result->num_rows > 0) {
    $response = [];
    $index = 1;

    session_start();
    $sessionId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;

    while ($row = $result->fetch_assoc()) {
        array_push($response, (object) array(
            "id" => $row['id'],
            "name" => $row['name']
        ));
    }

    echo json_encode($response);
} else {
    echo json_encode(["error" => "No departments found"]);
}
