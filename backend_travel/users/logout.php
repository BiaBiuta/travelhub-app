<?php
session_start();
session_destroy();
echo $_SERVER['DOCUMENT_ROOT'];
header('' . $_SERVER['DOCUMENT_ROOT'] . '/aplicatie_travel/index.php');
