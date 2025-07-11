<?php
header('Content-Type: application/json');
include $_SERVER['DOCUMENT_ROOT'] . '/aplicatie_travel/utilities/connect.php';

$id_user = $_POST['user_id'];
$sql_status = "SELECT `status` FROM `users` WHERE `id`=" . $id_user;
$result_status = mysqli_query($con, $sql_status);
if ($result_status->num_rows > 0) {
    if ($row = $result_status->fetch_assoc()) {
        $status = $row['status'];
        $new_status = ($status == 1) ? 0 : 1;
        $sql_update = "UPDATE `users` SET `status`=" . $new_status . " WHERE id=" . (int)$id_user;
        $result = mysqli_query($con, $sql_update);
        if ($result) {
            session_start();
            if ($id_user == $_SESSION['user_id']) {
                header("Location: logout.php");
            }
            echo json_encode(["success" => true, "new_status" => $new_status]);
        } else {
            echo json_encode(["error" => "Update failed"]);
        }
    } else {
        echo json_encode(["error" => "User not found"]);
    }
} else {
    echo json_encode(["error" => "No user found"]);
}
