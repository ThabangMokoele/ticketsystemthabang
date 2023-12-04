<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $ticket_id = $_POST["ticket_id"];
    $response = htmlspecialchars($_POST["response"]);

 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ticketing_system";

    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $stmt = $conn->prepare("UPDATE tickets SET response = ? WHERE id = ?");

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }


    $stmt->bind_param("si", $response, $ticket_id);


    $result = $stmt->execute();

 
    if (!$result) {
        die("Execute failed: " . $stmt->error);
    }


    $stmt->close();
    $conn->close();

    header("Location: view_tickets.php");
    exit();
}
?>