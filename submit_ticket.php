<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $submitter = htmlspecialchars($_POST["submitter"]);
    $issue_type = htmlspecialchars($_POST["issue_type"]);
    $description = htmlspecialchars($_POST["description"]);


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ticketing_system";

    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO tickets (submitter, issue_type, description) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $submitter, $issue_type, $description);
    $stmt->execute();


    session_start();
    $_SESSION["registration_success"] = true;


    header("Location: index.php");
    exit();


    $stmt->close();
    $conn->close();

    header("Location: index.php");
    exit();
}
?>