<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "partas";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST") {

    //retrieve from data
    $shippername = $_POST['shippername'];
    $email = $_POST['email'];
    $shipperphone = $_POST['shipperphone'];
    $receivername=$_POST['receivername'];
    $receiverphone=$_POST['receiverphone'];
    $origin = $_POST['origin'];
    $des = $_POST['des'];
    $boxes = $_POST['boxes'];


    $stmt = $conn->prepare("INSERT INTO `back` (`shippername`, `email`, `shipperphone`, `receivername`, `receiverphone`, `origin`, `des`, `boxes`, `date_and_time`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)");

    // Bind parameters
    $stmt->bind_param("sssssssi", $shippername, $email, $shipperphone, $receivername, $receiverphone, $origin, $des, $boxes);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        header("Location: ticket.php");
    }
    else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}
?>


