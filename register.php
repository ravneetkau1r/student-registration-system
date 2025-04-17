<?php
$server = "studentregistrationsystem-server.database.windows.net";
$database = "studentregistrationsystem-database";
$username = "adminravneet";
$password = "P@ssw0rd";

try {
    $conn = new PDO("sqlsrv:server=$server;Database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $course = htmlspecialchars($_POST['course']);

    $stmt = $conn->prepare("INSERT INTO Students (Name, Email, Course) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $course]);

    echo "<p style='text-align:center;'>Student Registered Successfully! <a href='index.php'>Go Back</a></p>";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
