<?php

// Input from the user
$hexCode = $_POST['hexCode'] ?? '';
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$address = $_POST['address'] ?? '';

// Validate input fields
if (empty($hexCode) || empty($name) || empty($email) || empty($address)) {
    die("All fields are required.");
}

// Send request to Node.js application
$nodeUrl = 'http://localhost:3000/redeemCode';
$data = http_build_query([
    'hexCode' => $hexCode,
    'name' => $name,
    'email' => $email,
    'address' => $address
]);
$options = [
    'http' => [
        'method' => 'POST',
        'header' => 'Content-type: application/x-www-form-urlencoded',
        'content' => $data
    ]
];
$context = stream_context_create($options);
$response = file_get_contents($nodeUrl, false, $context);

// Display the response as an alert box
echo "$response";
?>
