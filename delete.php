<?php
require_once '../core/dbConfig.php';

if (isset($_POST['deleteApplicant'])) {
    $stmt = $pdo->prepare("DELETE FROM navy_applications WHERE application_id = ?");
    $stmt->execute([$_POST['application_id']]);
}
header("Location: ../index.php");