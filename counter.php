<?php



session_start(); // Start the PHP session

// Check if the visitor email session variable exists
if (!isset($_SESSION['visitor_emails'])) {
    $_SESSION['visitor_emails'] = array(); // Initialize an empty array
}

// Get the email address of the current visitor
$email = $_POST['email'];

// Check if the email address is not empty and has not been visited before
if (!empty($email) && !in_array($email, $_SESSION['visitor_emails'])) {
    // Add the email address to the list of visited emails
    $_SESSION['visitor_emails'][] = $email;
}

// Output the total count of unique email addresses
$count = count($_SESSION['visitor_emails']);
echo "Total visitors: " . $count;
?>
