<?php
$server = "studentregistrationsystem-server.database.windows.net";
$database = "studentregistrationsystem-database";
$username = "adminravneet";
$password = "P@ssw0rd";

try {
    $conn = new PDO("sqlsrv:server=$server;Database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetching the data from the form
    $firstName = htmlspecialchars($_POST['first_name']);
    $lastName = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $enrollmentDate = htmlspecialchars($_POST['enrollment_date']);

    // Inserting into the database
    $stmt = $conn->prepare("INSERT INTO Students (FirstName, LastName, Email, EnrollmentDate) VALUES (?, ?, ?, ?)");
    $stmt->execute([$firstName, $lastName, $email, $enrollmentDate]);

    echo "<p style='text-align:center;'>Student Registered Successfully! <a href='index.php'>Go Back</a></p>";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
