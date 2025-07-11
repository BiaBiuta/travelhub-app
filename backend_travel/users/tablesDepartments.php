<?php
header('Content-Type: application/json');
include $_SERVER['DOCUMENT_ROOT'] . '/aplicatie_travel/utilities/connect.php';

$sql = "SELECT `id`, `name`,`description` FROM `departments` ";

$result = mysqli_query($con, $sql);


if ($result->num_rows > 0) {

    $response = [];
    $index = 1;
    session_start();
    $sessionId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
    while ($row = $result->fetch_assoc()) {

        //echo $sessionId;
        // if ($_SESSION['user_id'] == $row['id']) {
        //     $buttonDeleteUser = "<p> </p> ";
        // } else {
        //     $buttonDeleteUser = "
        //     <button type='button' class='deleteUser' data-user_id='" . $row['id'] . "'>Delete</button>
        // ";
        // }
        // $buttonAssign = "<button type='button' class='assignDepartment' data-user_id='" . $row['id'] . "'>Assign Department</button>";
        // $buttonEdit = "<button type='button' class='editButton' data-user_id='" . $row['id'] . "'>Edit</button>";


        array_push($response, (object) array(
            "index" => $index++,
            "name" => $row['name'],
            "description" => $row['description']
        ));
    }
    $sliced_response = array_slice($response, $_GET['start'], $_GET['length']);

    $response = [
        "draw" => $_GET['draw'],
        "recordsTotal" => mysqli_num_rows($result),
        "recordsFiltered" => mysqli_num_rows($result),
        "data" => $sliced_response
    ];

    echo json_encode($response);
}
