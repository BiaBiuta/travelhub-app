<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/aplicatie_travel/utilities/connect.php');
echo '<pre>'; // Îmbunătățește formatul afișării
var_dump($_POST);
echo '</pre>';

$detalii_user = [
    'firstName' => $_POST['FirstName'],
    'lastName' => $_POST['LastName'],
    'email' => $_POST['InputEmail'],
    'address' => $_POST['InputAddress'],
    'password' => $_POST['Password'],
    'observation' => $_POST['Observation']
];
if (isset($detalii_user) && $_SERVER["REQUEST_METHOD"] == "POST") {
    // $sql = "SELECT COUNT(*) FROM `users` WHERE password='" . $detalii_user['password'] . "'";
    // $result_sql = mysqli_query($con, $sql);
    // if ($result_sql && mysqli_num_rows($result_sql) > 0) {
    //     header("Location: ../register.php?retrimite");
    // } else {
    $sql_nou = "INSERT INTO `users`(`firstName`, `lastName`, `address`, `status`, `email`, `password`, `observation`) VALUES ('" . $detalii_user['firstName'] . "','" . $detalii_user['lastName'] . "','" . $detalii_user['address'] . "',1,'" . $detalii_user['email'] . "','" . $detalii_user['password'] . "','" . $detalii_user['observation'] . "')";
    echo $sql_nou;
    $result_sql = mysqli_query($con, $sql_nou);
    if ($result_sql) {
        header("Location: http://localhost/aplicatie_travel/login.php");
    } else {
        echo "Failed" . mysqli_error($con);
    }
} else {
    header("Location: ../index.php");
}
// 
