<?php
session_start(); // Start the session for CSRF protection

// Check for CSRF token validity
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("Invalid CSRF token.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate and sanitize the input code
    if (isset($_POST['code'])) {
        $code = $_POST['code'];

        // Decode HTML entities to ensure the code is treated as plain text
        $code = html_entity_decode($code); // Decode any HTML entities
        $code = stripslashes($code); // Remove any backslashes

        // Create a temporary file to hold the Python code
        $filename = tempnam(sys_get_temp_dir(), 'code_') . '.py';
        file_put_contents($filename, $code); // Write the code to the file

        // Execute the Python code securely
        $output = shell_exec("python3 " . escapeshellarg($filename) . " 2>&1");

        // Cleanup the temporary file
        unlink($filename);
        
        // Output the result with HTML special characters encoded for display
        echo htmlspecialchars($output);
    } else {
        echo "No code provided.";
    }
} else {
    echo "Invalid request method.";
}
?>