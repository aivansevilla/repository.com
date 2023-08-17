<?php
$ip_address = $_SERVER["REMOTE_ADDR"];

// Read the existing IP addresses from the file
$file = 'visitor_ips.txt';
$existing_ips = file_get_contents($file);

// Convert the IP addresses to an array
$ip_array = explode("\n", $existing_ips);

// Check if the current IP address is not in the array and add it
if (!in_array($ip_address, $ip_array)) {
    $ip_array[] = $ip_address;
    // Save the updated IP addresses back to the file
    file_put_contents($file, implode("\n", $ip_array));
}

// Return the count of unique IP addresses
echo count($ip_array);
?>
