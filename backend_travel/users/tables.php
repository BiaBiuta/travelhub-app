<?php
header('Content-Type: application/json');
include $_SERVER['DOCUMENT_ROOT'] . '/aplicatie_travel/utilities/connect.php';

$start = isset($_GET['start']) ? intval($_GET['start']) : 0;
$length = isset($_GET['length']) ? intval($_GET['length']) : 10;
$draw = isset($_GET['draw']) ? intval($_GET['draw']) : 1;
$id_department = isset($_GET['department_id']) ? $_GET['department_id'] : -1;
$count_sql = "SELECT COUNT(*) AS total 
                  FROM `users`";
$sql = "SELECT u.id, `firstName`, `lastName`, `email`, `address`,`status`, `name` ,`access`
            FROM `users` AS u 
            LEFT JOIN `departments` AS d ON u.id_department = d.id ";
$limit_string = "LIMIT $start, $length";
$searchTotal = isset($_GET['searchTotal']) ? $_GET['searchTotal'] : " ";

if ($id_department == '-1') {
    if ($searchTotal != "") {
        $sql = $sql . " WHERE `lastName` LIKE '" . $searchTotal . "%' " . $limit_string;
    } else {
        $sql = $sql . "  " . $limit_string;
    }
} else {
    if ($searchTotal != "") {
        $sql = $sql . " WHERE u.id_department = $id_department AND `lastName` LIKE '" . $searchTotal . "%' " . $limit_string;
    } else {
        $sql = $sql . " WHERE u.id_department = $id_department " . $limit_string;
    }
}


$result = mysqli_query($con, $sql);
$count_result = mysqli_query($con, $count_sql);
$total_records = ($count_result) ? $count_result->fetch_assoc()['total'] : 0;

$response = [];
$index = $start + 1;
session_start();

$sessionId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $buttonDeleteUser = ($_SESSION['user_id'] == $row['id'])
            ? "<p> </p> "
            : "<i class='fa fa-trash deleteUser' type='button' data-user_id='" . $row['id'] . "' ></i>";
        $buttonAssign = "<i class='fa fa-building assignDepartment' type='button' data-user_id='" . $row['id'] . "' ></i>";
        if ($row['status'] == 0) {
            $buttonEdit = "<i class='fa fa-user-slash editButton' type='button' data-user_id='" . $row['id'] . "' ></i>";
        } else if ($row['status'] == 1) {
            $buttonEdit = "<i class='fa-solid fa-user-check editButton' type='button' data-user_id='" . $row['id'] . "' ></i>";
        }
        $buttonAccess = "<i class='fa-solid fa-universal-access accessButton' type='button' data-user_id='" . $row['id'] . "' ></i>";

        if ($row['name'] == NULL) {
            $row['name'] = [];
        }

        array_push($response, (object) [
            "index" => $index++,
            "firstName" => $row["firstName"],
            "lastName" => $row["lastName"],
            "email" => $row["email"],
            "address" => $row["address"],
            "actions" => [
                $buttonDeleteUser,
                $buttonAssign,
                $buttonEdit,
                $buttonAccess
            ],
            "access" => $row["access"],
            "nameDepartment" => $row["name"]
        ]);
    }
}

$response = [
    "draw" => $draw,
    "recordsTotal" => $total_records,
    "recordsFiltered" => $total_records,
    "data" => $response,
    "id_department" => $id_department,
    "user_id" => $_SESSION['user_id'],
    "search" => $searchTotal
];

echo json_encode($response);
