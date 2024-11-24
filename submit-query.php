<?php
// Database connection
$host = "localhost"; // Replace with your database host
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "open_university"; // Your database name

// Connect to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize input data
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Validate inputs
    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Prepare SQL query to insert data
        $stmt = $conn->prepare("INSERT INTO queries (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);

        // Execute the query
        if ($stmt->execute()) {
            // Redirect to a success page or display a success message
            echo "<script>alert('Thank you for contacting us! Your message has been received.'); window.location.href='contact.php';</script>";
        } else {
            // Handle database error
            echo "<script>alert('Something went wrong. Please try again later.'); window.location.href='contact.php';</script>";
        }

        // Close the statement
        $stmt->close();
    } else {
        // Handle validation error
        echo "<script>alert('Invalid input. Please make sure all fields are filled correctly.'); window.location.href='contact.php';</script>";
    }
}

// Close the database connection
$conn->close();
?>
