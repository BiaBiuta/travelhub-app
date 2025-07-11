<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/aplicatie_travel/utilities/connect.php');
echo '<pre>'; // Îmbunătățește formatul afișării
var_dump($_POST);
echo '</pre>';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['InputEmail'];
    $password = $_POST['InputPassword'];
    echo $email;
    echo $password;
    if (empty($email) || empty($password)) {
        echo "Both fields are required.";
        exit;
    }
    $email = mysqli_real_escape_string($con, $email);
    $password = mysqli_real_escape_string($con, $password);
    $query = "SELECT id, password,status FROM `users` WHERE `email`='$email' and `status`=1";
    echo $email;
    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($password == $row['password']) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email'] = $email;
        } else {
            echo "Invalid password";
        }
        if ($row['status'] == 0) {
            echo "Failed" . mysqli_error($con) . "\n" . "This user is not activ";
        }
    } else {
        echo "No user find with that email";
        echo "Failed" . mysqli_error($con);
    }
    if ($result) {
        header("Location: http://localhost/aplicatie_travel/index.php");
    } else {
        echo "Failed" . mysqli_error($con);
    }
    mysqli_free_result($result);
} else {
    echo "am intrat aici ";
    header("Location: ../index.php");
}
