<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/aplicatie_travel/utilities/connect.php');

$detalii_departament = [
    'name' => $_POST['InputName'],
    'description' => $_POST['InputDescription']
];
if (isset($detalii_departament) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $sql_nou = "INSERT INTO `departments`(`name`, `description`) VALUES ('" . $detalii_departament['name'] . "', '" . $detalii_departament['description'] . "')";
    echo $sql_nou;
    $result_sql = mysqli_query($con, $sql_nou);
    if ($result_sql) {
        echo ($result_sql);
        header("Location: http://localhost/aplicatie_travel/index.php");
    } else {
        echo "Failed" . mysqli_error($con);
    }
} else {

    //header("Location: ../index.php");
}
// 
