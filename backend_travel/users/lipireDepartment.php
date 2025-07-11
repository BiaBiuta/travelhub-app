<?php
// $id_user = $_GET['user_id'];
// echo $id_user;
header('Content-Type: application/json');
include $_SERVER['DOCUMENT_ROOT'] . '/aplicatie_travel/utilities/connect.php';
$departament_id = $_POST['department_id'];
echo $departament_id;
$id_user = $_POST['user_id'];

$sql_display = "UPDATE `users` SET `id_department`=" . $departament_id . " WHERE id=" . $id_user;
echo $sql_display;
$result = mysqli_query($con, $sql_display);

// if ($result > 0) {
//     $response = [];
//     $index = 1;

//     session_start();
//     $sessionId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;


//     // echo json_encode($response);
// } else {
//     echo json_encode(["error" => "No departments found"]);
// }
if ($result) {
    header("Location: http://localhost/aplicatie_travel/tables.php");
}
