<?php
header('Content-Type: application/json');
include $_SERVER['DOCUMENT_ROOT'] . '/aplicatie_travel/utilities/connect.php';
session_start();
$array_id = $_POST['q'];
$user_id = $_POST['user_id'];
$string = "";
for ($i = 0; $i < count($array_id); $i++) {
    $string = $string . $array_id[$i] . ",";
}
$string = rtrim($string, ',');
// echo $string;
// echo $user_id;
$sql = "UPDATE `users` SET `access`='" . $string . "' WHERE `id`=$user_id";
$result = mysqli_query($con, $sql);

if ($result) {
    header("Location: http://localhost/aplicatie_travel/tables.php");
} else {
    echo "am intrat aici ";
    header("Location: ...php");
}
