<?php
require_once 'core/dbConfig.php';

$stmt = $pdo->prepare("SELECT * FROM navy_applications WHERE application_id = ?");
$stmt->execute([$_GET['id'] ?? 0]);
$a = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$a) { header("Location: index.php"); exit; }
?>
<!DOCTYPE html>
<html>
<head><title>Edit Application</title></head>
<body>
<h2>Edit Application</h2>
<form action="actions/update.php" method="POST">
    <input type="hidden" name="application_id" value="<?= $a['application_id'] ?>">
    <input type="text" name="first_name" value="<?= htmlspecialchars($a['first_name']) ?>" required><br><br>
    <input type="text" name="last_name" value="<?= htmlspecialchars($a['last_name']) ?>" required><br><br>
    <input type="number" name="age" value="<?= $a['age'] ?>" required><br><br>
    <input type="text" name="sex" value="<?= htmlspecialchars($a['sex']) ?>" required><br><br>
    <input type="text" name="address" value="<?= htmlspecialchars($a['address']) ?>" required><br><br>
    <input type="text" name="educational_attainment" value="<?= htmlspecialchars($a['educational_attainment']) ?>" required><br><br>
    <input type="number" step="0.01" name="height_cm" value="<?= $a['height_cm'] ?>" required><br><br>
    <input type="number" step="0.01" name="weight_kg" value="<?= $a['weight_kg'] ?>" required><br><br>
    <input type="text" name="contact_number" value="<?= htmlspecialchars($a['contact_number']) ?>" required><br><br>
    <input type="text" name="desired_position" value="<?= htmlspecialchars($a['desired_position']) ?>" required><br><br>
    <input type="submit" name="updateApplicant" value="Update">
    <a href="index.php">Cancel</a>
</form>
</body>
</html>