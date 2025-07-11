<?php
$con = new mysqli("localhost", "root", "", "travel_practica");
if (!$con) {
    die("Connection failed:" . mysqli_connect_error());
}
// echo "Succes";