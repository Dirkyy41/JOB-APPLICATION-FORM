<?php
require_once 'core/dbConfig.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Navy Application Form</title>
</head>
<body>

<h2>Philippine Navy Officer Application Form</h2>

<form action="actions/insertion.php" method="POST">

    <input type="text" name="first_name" placeholder="First Name" required>
    <br><br>

    <input type="text" name="last_name" placeholder="Last Name" required>
    <br><br>

    <input type="number" name="age" placeholder="Age" required>
    <br><br>

    <input type="text" name="sex" placeholder="Sex" required>
    <br><br>

    <input type="text" name="address" placeholder="Address" required>
    <br><br>

    <input type="text" name="educational_attainment" placeholder="Educational Attainment" required>
    <br><br>

    <input type="number" step="0.01" name="height_cm" placeholder="Height (cm)" required>
    <br><br>

    <input type="number" step="0.01" name="weight_kg" placeholder="Weight (kg)" required>
    <br><br>

    <input type="text" name="contact_number" placeholder="Contact Number" required>
    <br><br>

    <select name="desired_position" required>
        <option value="" disabled selected>Select Desired Position</option>
        <?php
        $positions = [
            "NAVSOCOM Officer",
            "Naval Intelligence Officer",
            "Naval Engineering Officer",
            "Naval Aviation Officer",
            "Naval Communications Officer",
            "Naval Information Technology Officer",
            "Naval Medical Officer",
            "Naval Legal Officer",
            "Naval Supply Officer"
        ];
        foreach ($positions as $p): ?>
            <option value="<?= $p ?>"><?= $p ?></option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <input type="submit" name="insertApplicant" value="Submit">

</form>

<h3>Submitted Applications</h3>
<table border="1" cellpadding="6">
    <tr>
        <th>ID</th><th>First Name</th><th>Last Name</th><th>Age</th><th>Sex</th>
        <th>Address</th><th>Education</th><th>Height</th><th>Weight</th>
        <th>Contact</th><th>Position</th><th>Date Added</th><th>Actions</th>
    </tr>
    <?php
    $rows = $pdo->query("SELECT * FROM navy_applications ORDER BY application_id DESC")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $r): ?>
    <tr>
        <td><?= $r['application_id'] ?></td>
        <td><?= htmlspecialchars($r['first_name']) ?></td>
        <td><?= htmlspecialchars($r['last_name']) ?></td>
        <td><?= $r['age'] ?></td>
        <td><?= htmlspecialchars($r['sex']) ?></td>
        <td><?= htmlspecialchars($r['address']) ?></td>
        <td><?= htmlspecialchars($r['educational_attainment']) ?></td>
        <td><?= $r['height_cm'] ?></td>
        <td><?= $r['weight_kg'] ?></td>
        <td><?= htmlspecialchars($r['contact_number']) ?></td>
        <td><?= htmlspecialchars($r['desired_position']) ?></td>
        <td><?= $r['date_added'] ?></td>
        <td>
            <a href="edit.php?id=<?= $r['application_id'] ?>">Edit</a>
            <form action="actions/delete.php" method="POST" style="display:inline"
                  onsubmit="return confirm('Delete this application?');">
                <input type="hidden" name="application_id" value="<?= $r['application_id'] ?>">
                <input type="submit" name="deleteApplicant" value="Delete">
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>