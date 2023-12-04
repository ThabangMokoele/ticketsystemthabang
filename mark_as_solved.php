<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $ticket_id = $_POST["ticket_id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ticketing_system";

    $conn = new mysqli($servername, $username, $password, $dbname);

   
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $stmt = $conn->prepare("UPDATE tickets SET status = 'Closed' WHERE id = ?");
    $stmt->bind_param("i", $ticket_id);
    $stmt->execute();

 
    $stmt->close();
    $conn->close();


    header("Location: view_tickets.php");
    exit();
}
?>