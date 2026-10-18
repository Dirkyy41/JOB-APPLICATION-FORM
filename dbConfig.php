<?php

$host = "localhost";
$dbname = "navy_job_application";
$user = "root";
$password = "";

$dsn = "mysql:host={$host};dbname={$dbname}";

$pdo = new PDO($dsn, $user, $password);
$pdo->exec("SET time_zone = '+8:00';");

?>