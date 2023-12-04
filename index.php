
<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ticketing_system";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();

if (isset($_SESSION["registration_success"]) && $_SESSION["registration_success"]) {
 
    echo '<div class="alert alert-success" role="alert">';
    echo 'Registered successfully!';
    echo '</div>';

    $_SESSION["registration_success"] = false;
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Ticketing System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-image: url(images/17973908.jpg);
        }

        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #ffffff; 
            width: 50%;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-header {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #2ecc71;
            color: #ffffff; 
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #27ae60; 
        }
        h2{


            font-family: Arial, Helvetica, sans-serif;
            font-weight: bolder;
            font-size: x-large;
            width: 100%;
            background-color: yellowgreen;
            height: 45px;
            border-radius: 8px;
        } nav {
            background-color: #3498db; 
            padding: 15px;
            height: 100vh; 
            width: 200px;
        }

        nav a {
            display: block;
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            margin-bottom: 10px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #2980b9; 
        }
    </style>
</head>



<body>
<nav>
        <a href="index.php">Home</a>
        <a href="login.php">Login</a>
      
    </nav>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="form-header">Artisans Republik</h2>
                </div>



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="form-header">Submit a Ticket</h1>
                  
                </div>

                <div class="card-body">
                    <form action="submit_ticket.php" method="post">
                        <div class="form-group">
                            <label for="submitter">Submitter:</label>
                            <input type="text" name="submitter" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="issue_type">Issue Type:</label>
                            <select name="issue_type" class="form-control" required>
                                <option value="Technical">Technical Issue</option>
                                <option value="Query">Customer Query</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" class="form-control" required></textarea>
                        </div>

                        <input type="submit" class="btn btn-success" value="Submit Ticket">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<footer style="position: fixed; bottom: 0; right: 0; width: 100%; text-align: center; padding: 10px; background-color: #20B2AA;">
    <p>This Ticketing System was created by Thabang Mokoele - December 2023</p>
</footer>
</body>
</html>