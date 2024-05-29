<?php
require 'connection.php';

// Check if the username and password are set
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE uName = ? AND uPassword = ?");
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    $response = [
        'success' => false,
        'message' => 'Invalid username or password',
        'uRole' => null
    ];

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $response['success'] = true;
        $response['message'] = 'Login successful';
        $response['uRole'] = $row['uRole'];
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Return a JSON-encoded response
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Handle the case where username or password is not set
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false,
        'message' => 'Username and password are required',
        'uRole' => null
    ]);
}
?>
