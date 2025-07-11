<?php
include "utilities/connect.php";
session_start();
$sessionId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
if (isset($sessionId)) {
    $query = " SELECT `firstName`,`lastName` FROm `users` WHERE id=$sessionId";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $admin = '
       <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">' . $firstName . " " . $lastName . '</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
        </a>
    ';
} else {
    $admin = '
      <a class="nav-link" href="register.php" id="registerButt" role="button"
                                 aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Register</span>
                               
        </a>
    ';
}
