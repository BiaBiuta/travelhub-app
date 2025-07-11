<?php
header('Content-Type: application/json');
include $_SERVER['DOCUMENT_ROOT'] . '/aplicatie_travel/utilities/connect.php';
session_start();
$id_user = $_GET['user_id'];
$searchBar = $_GET['searchBar'];
$sql =
    "SELECT * 
FROM (
    SELECT 
        u.id, 
        u.lastName, 
        u.firstName, 
        d.photo, 
        d.description, 
        d.comments, 
        d.id_user, 
        d.dateTime, 
        u.profile_photo, 
        d.id AS post_id, 
        NULL AS id_user_from, 
        NULL AS id_user_from_lastName, 
        NULL AS id_user_from_firstName,
        NULL AS id_user_from_profilePhoto,
        d.dateTime AS data_share
    FROM 
        `users` AS u 
    INNER JOIN 
        `postari` AS d ON u.id = d.id_user 
    WHERE 
        u.id = $id_user 

    UNION

    SELECT 
        u.id, 
        u.lastName, 
        u.firstName, 
        d.photo, 
        d.description, 
        d.comments, 
        d.id_user, 
        d.dateTime, 
        u.profile_photo, 
        d.id AS post_id, 
        s.id_user_from, 
        u2.lastName AS id_user_from_lastName,  
        u2.firstName AS id_user_from_firstName,
        u2.profile_photo AS id_user_from_profilePhoto,
        s.dateTime AS data_share
    FROM 
        `users` AS u 
    INNER JOIN 
        `shares` AS s ON u.id = s.id_user_to 
    INNER JOIN 
        `postari` AS d ON s.id_post = d.id 
    INNER JOIN 
        `users` AS u2 ON s.id_user_from = u2.id  
    WHERE 
        s.id_user_to = $id_user
) AS combined_results";
$sqlOrder = " ORDER BY 
    data_share DESC";
if ($searchBar != "") {
    $whereClause = " WHERE description LIKE '" . $searchBar . "%'";
    $sql = $sql . $whereClause . $sqlOrder;
} else {
    $sql = $sql . $sqlOrder;
}
$response = [];
$result = mysqli_query($con, $sql);

while ($row = $result->fetch_assoc()) {
    if ($row["id_user_from_lastName"] == NULL) {
        $row["id_user_from_lastName"] = "";
    }
    array_push($response, (object) [
        "photo" => $row["photo"],
        "description" => $row["description"],
        "comments" => $row["comments"],
        "id_user" => $row["id_user"],
        "firstName" => $row["firstName"],
        "lastName" => $row["lastName"],
        "dateTime" => $row["dateTime"],
        "profile_photo" => $row["profile_photo"],
        "id_post" => $row["post_id"],
        "id_user_from" => $row["id_user_from"],
        "id_user_from_lastName" => $row["id_user_from_lastName"],
        "id_user_from_firstName" => $row["id_user_from_firstName"],
        "id_user_from_profilePhoto" => $row["id_user_from_profilePhoto"],
        "data_share" => $row["data_share"]
    ]);
}
$response = [
    "data" => $response
];

echo json_encode($response);
