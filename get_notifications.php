<?php
// Assuming you have already initialized the database connection
// and the $_settings object is available

require_once('config.php');

$user_id = $_settings->userdata('id');

// Fetch notifications for the user from the database
$notifications = array();
$notification_qry = $conn->query("SELECT n.*, r.id AS repo FROM `notify` n
LEFT JOIN `repo_list` r ON n.`thesis_code` = r.`thesis_code`
WHERE n.`user_id` = '{$user_id}' ORDER BY n.`id` DESC");
while ($row = $notification_qry->fetch_assoc()) {
    $notifications[] = $row;
}


echo json_encode($notifications);