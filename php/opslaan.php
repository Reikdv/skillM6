<?php
$host = "localhost";
$dbname = "schedule_db";
$username = "root"; 
$password = "";     

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$personName = $_POST['personName'];
$appointmentTime = $_POST['appointmentTime'];
$appointmentDetails = $_POST['appointmentDetails'];
$paperType = $_POST['paperType'];
$reserveDay = isset($_POST['reserveDay']) ? 1 : 0;
$day = $_POST['day'];

$stmt = $conn->prepare("INSERT INTO appointments (person_name, appointment_time, appointment_details, paper_type, reserve_day, day) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssii", $personName, $appointmentTime, $appointmentDetails, $paperType, $reserveDay, $day);

if ($stmt->execute()) {
    echo "Appointment saved successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
