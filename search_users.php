<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "repo_db"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['term'])) {
    $searchTerm = $_GET['term'];

    
    $query = $conn->query("SELECT id, firstname, lastname, email FROM student_list WHERE firstname LIKE '%$searchTerm%' OR lastname LIKE '%$searchTerm%' OR email LIKE '%$searchTerm%'");
    $suggestions = array();

    while ($row = $query->fetch_assoc()) {
        // Format the suggestion as an associative array with 'value' and 'label' keys
        $suggestion = array(
            'value' => $row['firstname'], // The value shown in the input field
            'label' => $row['firstname'], // The value shown in the suggestions dropdown
            'id' => $row['id'], // You can include the user ID as well if needed
            'lastname' => $row['lastname'], // The last name of the student
            'email' => $row['email'] // The email of the student
        );

        $suggestions[] = $suggestion;
    }

   
    echo json_encode($suggestions);
}
?>
