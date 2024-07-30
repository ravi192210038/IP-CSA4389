<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check which form is submitted
$form_type = $_POST['form_type'];

switch ($form_type) {
    case 'patients':
        $name = $_POST['patient-name'];
        $age = $_POST['patient-age'];
        $gender = $_POST['patient-gender'];
        $address = $_POST['patient-address'];

        $sql = "INSERT INTO patients (name, age, gender, address) VALUES ('$name', '$age', '$gender', '$address')";
        break;

    case 'doctors':
        $name = $_POST['doctor-name'];
        $specialty = $_POST['doctor-specialty'];
        $phone = $_POST['doctor-phone'];
        $email = $_POST['doctor-email'];

        $sql = "INSERT INTO doctors (name, specialty, phone, email) VALUES ('$name', '$specialty', '$phone', '$email')";
        break;

    case 'appointments':
        $date = $_POST['appointment-date'];
        $time = $_POST['appointment-time'];
        $doctor = $_POST['doctor-select'];
        $patient_id = $_POST['patient-id'];

        $sql = "INSERT INTO appointments (date, time, doctor, patient_id) VALUES ('$date', '$time', '$doctor', '$patient_id')";
        break;

    case 'billing':
        $amount = $_POST['billing-amount'];
        $method = $_POST['billing-method'];
        $notes = $_POST['billing-notes'];

        $sql = "INSERT INTO billing (amount, method, notes) VALUES ('$amount', '$method', '$notes')";
        break;

    case 'contact':
        $name = $_POST['contact-name'];
        $email = $_POST['contact-email'];
        $message = $_POST['contact-message'];

        $sql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";
        break;

    default:
        echo "Invalid form type.";
        exit();
}

// Execute the SQL query
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
