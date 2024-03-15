<?php
// Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "phpcrud";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Table</title>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        ul ul {
            margin-left: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php
    // Function to fetch children recursively
    function fetchChildren($parent_id, $conn) {
        $stmt = mysqli_prepare($conn, "SELECT id, name, email FROM users WHERE parent_id = ?");
        mysqli_stmt_bind_param($stmt, "i", $parent_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if (mysqli_num_rows($result) > 0) {
            echo "<ul>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li>" . $row['name'] . " (" . $row['email'] . ")";
                fetchChildren($row['id'], $conn); // Recursive call for children
                echo "</li>";
            }
            echo "</ul>";
        }
        mysqli_stmt_close($stmt);
    }

    // Main query to fetch top-level nodes
    $main_query = "SELECT id, name, email FROM users WHERE parent_id = 14";
    $main_result = mysqli_query($conn, $main_query);

    if ($main_result && mysqli_num_rows($main_result) > 0) {
        echo "<ul>";
        while ($main_row = mysqli_fetch_assoc($main_result)) {
            echo "<li>" . $main_row['name'] . " (" . $main_row['email'] . ")";
            fetchChildren($main_row['id'], $conn); // Fetch children recursively
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No users found.</p>";
    }

    // Display table after the tree structure
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th></tr>";
    $table_query = "SELECT id, name, email, Role FROM users WHERE parent_id = 14";
    $table_result = mysqli_query($conn, $table_query);
    while ($row = mysqli_fetch_assoc($table_result)) {
        echo "<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['email'] . "</td><td>" . $row['Role'] . "</td></tr>";
    }
    echo "</table>";

    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>