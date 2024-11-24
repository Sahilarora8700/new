<?php
session_start();
include('includes/db.php');

// Default admin credentials (First-time setup)
$default_username = "admin";
$default_password = "password123"; // This will be hashed

// Check if the admin exists (First-time setup only)
$query = "SELECT * FROM admins WHERE username = '$default_username'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    // If admin doesn't exist, insert the default credentials
    $hashedPassword = password_hash($default_password, PASSWORD_DEFAULT);
    $insert_query = "INSERT INTO admins (username, password) VALUES ('$default_username', '$hashedPassword')";
    if (mysqli_query($conn, $insert_query)) {
        echo "Admin account created successfully with default credentials!";
    } else {
        echo "Error: " . mysqli_error($conn); // Detailed error message
    }
}

// Handle login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim(mysqli_real_escape_string($conn, $_POST['username']));
    $password = trim(mysqli_real_escape_string($conn, $_POST['password']));

    // Query to find the admin by username
    $query = "SELECT * FROM admins WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $admin = mysqli_fetch_assoc($result);

        // Print the hashed password from the database for debugging
        echo "Stored Hashed Password: " . $admin['password'] . "<br>";

        // Verify the password
        if (password_verify($password, $admin['password'])) {
            // Set session variables for login
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['username'] = $admin['username'];

            // Redirect to the admin dashboard
            header("Location: admin/index.php");
            exit();
        } else {
            // Password is incorrect
            $error = "Invalid password. Please try again.";
        }
    } else {
        // Username does not exist
        $error = "Invalid username. Please try again.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Admin Login</h1>

        <?php if (isset($error)): ?>
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <?php echo $error; ?>
        </div>
        <?php endif; ?>

        <form method="POST" action="login.php" class="space-y-4">
            <div class="mb-4">
                <label for="username" class="block text-gray-700 font-semibold mb-2">Username</label>
                <input type="text" name="username" id="username" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Login
            </button>
        </form>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
