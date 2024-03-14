<?php
include 'config.php';

// Define the SQL query
$sql_query = "
SELECT parent.id AS parent_id, parent.name AS parent_name, child.id AS child_id, child.name AS child_name FROM users AS parent JOIN users AS child ON parent.id = child.parent_id
";

// Execute the query
$result = $link->query($link,$sql_query);

// Check if there are results
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. "<br>";
        echo "ID: " . $row["name"]. "<br>";
        echo "ID: " . $row["sex"]. "<br>";
        echo "ID: " . $row["Phone"]. "<br>";
        echo "ID: " . $row["email"]. "<br>";
        echo "ID: " . $row["image"]. "<br>";
    }
} else {
    echo "0 results";
}

?>

