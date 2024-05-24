<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "partas";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM authenticator WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Redirect the user to ticket.php
        header('Location: get.php');
    } else {
        echo "alert('Username or Password was incorrect!');\n";
    }

    $stmt->close();
    $conn->close();
}

?>