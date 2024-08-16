<?php
$servername = "localhost";
$username = "root"; // replace with your DB username
$password = ""; // replace with your DB password
$dbname = "registrationDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Simulate payment status (In a real-world application, this would come from the payment gateway or UPI callback)
    $payment_status = true; // Assume payment is successful for this example

    if ($payment_status) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO users (name, college_name, mobile_no, gender, department, payment_status) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $name, $college_name, $mobile_no, $gender, $department, $payment_status);

        // Set parameters and execute
        $name = $_POST['name'];
        $college_name = $_POST['collegename'];
        $mobile_no = $_POST['mobileno'];
        $gender = $_POST['gender'];
        $department = "Computer Sciences"; // You can change this or get it dynamically from the form

        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Payment not successful, registration not completed.";
    }
}

$conn->close();
?>
