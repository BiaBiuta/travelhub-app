<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/aplicatie_travel/utilities/connect.php');
echo '<pre>'; // Îmbunătățește formatul afișării
var_dump($_POST);
echo '</pre>';


$id_user = $_POST['user_id'];
if (isset($id_user) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $sql_query_delete = "DELETE FROM `users` WHERE `id`= $id_user";
    echo $sql_query_delete;
    $result_sql = mysqli_query($con, $sql_query_delete);
    if ($result_sql) {
        header("Location: http://localhost/aplicatie_travel/tables.php");
    } else {
        echo "Failed" . mysqli_error($con);
    }
} else {
    header("Location: ../index.php");
}
// 
