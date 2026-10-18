<?php
require_once '../core/dbConfig.php';

if (isset($_POST['updateApplicant'])) {
    $sql = "UPDATE navy_applications SET
        first_name = ?, last_name = ?, age = ?, sex = ?, address = ?,
        educational_attainment = ?, height_cm = ?, weight_kg = ?,
        contact_number = ?, desired_position = ?
        WHERE application_id = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['age'],
        $_POST['sex'],
        $_POST['address'],
        $_POST['educational_attainment'],
        $_POST['height_cm'],
        $_POST['weight_kg'],
        $_POST['contact_number'],
        $_POST['desired_position'],
        $_POST['application_id']
    ]);
}
header("Location: ../index.php");