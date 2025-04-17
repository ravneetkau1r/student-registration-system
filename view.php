<?php
$server = "<your-sql-server>.database.windows.net";
$database = "<your-database>";
$username = "<your-username>";
$password = "<your-password>";

try {
    $conn = new PDO("sqlsrv:server=$server;Database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->query("SELECT * FROM Students");
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registered Students</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Registered Students</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
            </tr>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= $student['ID'] ?></td>
                    <td><?= $student['Name'] ?></td>
                    <td><?= $student['Email'] ?></td>
                    <td><?= $student['Course'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="index.php" class="view-link">← Back to Registration</a>
    </div>
</body>
</html>
