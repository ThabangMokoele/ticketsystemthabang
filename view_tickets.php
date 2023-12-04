<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ticketing_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tickets";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Tickets</title>
    <style>
        body {
            background-image: url(images/17973908.jpg);
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 0;
            width: 60%;
            margin-left: 350px;
        }

        h1 { text-align: center;
            color: #008080; 
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background-color: #ffffff;
            border: 1px solid #87ceeb;
            margin: 10px;
            padding: 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        li:hover {
            background-color: #98fb98; 
        }

        strong {
            color: #008080; 
            margin-right: 10px; 
        }

        form {
            margin-top: 10px;
        }

        textarea {
            width: 100%;
            padding: 5px;
            margin-bottom: 5px;
        }

        input[type="submit"] {
            background-color: #008080;
            color: #ffffff; 
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #006666; 
        }
    </style>
</head>
<body>
    <h1>View Tickets</h1>
    <ul>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<li>";
                echo "<strong>Ticket ID:</strong> " . $row["id"] . "<br>";
                echo "<strong>Submitter:</strong> " . $row["submitter"] . "<br>";
                echo "<strong>Issue Type:</strong> " . $row["issue_type"] . "<br>";
                echo "<strong>Description:</strong> " . $row["description"] . "<br>";
                echo "<strong>Status:</strong> " . $row["status"] . "<br>";
                echo "<strong>Created At:</strong> " . $row["created_at"] . "<br>";

             
                if (!empty($row["response"])) {
                    echo "<strong>Response:</strong> " . $row["response"] . "<br>";
                }

                echo '<form action="respond_to_ticket.php" method="post">';
                echo '<input type="hidden" name="ticket_id" value="' . $row["id"] . '">';
                echo '<textarea name="response" placeholder="Type your response"></textarea>';
                echo '<input type="submit" value="Respond">';
                echo '</form>';

                echo '<form action="mark_as_solved.php" method="post">';
                echo '<input type="hidden" name="ticket_id" value="' . $row["id"] . '">';
                echo '<input type="submit" value="Mark as Solved">';
                echo '</form>';

                echo "</li><br>";
            }
        } else {
            echo "<p>No tickets found.</p>";
        }

        $conn->close();
        ?>
    </ul>

    <footer style="position: fixed; bottom: 0; right: 0; width: 100%; text-align: center; padding: 10px; background-color: #20B2AA;">
    <p>This Ticketing System was created by Thabang Mokoele - December 2023</p>
</body>
</html>