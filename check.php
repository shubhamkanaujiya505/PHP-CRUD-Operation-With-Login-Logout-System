<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "admin1";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// insert data
function createUser($username, $password, $user_type, $parent_dealer_id = null) {
    global $conn;

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO users (username, password, user_type) VALUES ('$username', '$hashedPassword', '$user_type')";
    if ($conn->query($sql) === TRUE) {
        $user_id = $conn->insert_id;
        
        // If user_type is dealer and parent_dealer_id is provided, insert into dealer_hierarchy
        if ($user_type === 'dealer' && $parent_dealer_id !== null) {
            $sql = "INSERT INTO dealer_hierarchy (dealer_id, parent_dealer_id) VALUES ($user_id, $parent_dealer_id)";
            $conn->query($sql);
        }
        
        echo "User created successfully<br>";
    } else {
        echo "Error creating user: " . $conn->error . "<br>";
    }
}


// retrive data
function getUsers($user_type, $parent_dealer_id = null) {
    global $conn;

    $sql = "SELECT * FROM users WHERE user_type = '$user_type'";
    
    if ($user_type === 'dealer' && $parent_dealer_id !== null) {
        $sql = "SELECT * FROM users INNER JOIN dealer_hierarchy ON users.id = dealer_hierarchy.dealer_id WHERE users.user_type = '$user_type' AND dealer_hierarchy.parent_dealer_id = $parent_dealer_id";
    }
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"]. " - Username: " . $row["username"]. " - User Type: " . $row["user_type"]. "<br>";
        }
    } else {
        echo "No users found<br>";
    }
}

createUser('admin', 'admin_password', 'admin');
createUser('dealer1', 'dealer1_password', 'dealer');
createUser('dealer2', 'dealer2_password', 'dealer', 2); // Assuming the parent dealer ID is 2
createUser('enduser1', 'enduser1_password', 'enduser');


// For admin
getUsers('admin');

// For dealer (assuming dealer ID is 2)
getUsers('dealer', 2);

// For enduser
getUsers('enduser');




?>