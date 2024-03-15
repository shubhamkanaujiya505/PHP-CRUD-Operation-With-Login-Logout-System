<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "phpcrud";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// // Start your while loop here
// $q = "SELECT id FROM users WHERE parent_id = 3";
// $query_main = mysqli_query($conn, $q);
// if ($query_main) {
//     while ($row_main = mysqli_fetch_assoc($query_main)) {
//         $id = $row_main['id']; // Get the user id

//         // Construct the query to select users with the current id
//         $as = "SELECT id,email FROM users WHERE id = $id";
//         $quer = mysqli_query($conn, $as);

//         // Check if the query was successful
//         if ($quer) {
//             // Fetch data from the query result
//             while ($row = mysqli_fetch_assoc($quer)) {
//                 // Print or process each row of data
//                 echo "<pre>";
//                 print_r($row);
//             }
//         } else {
//             // Handle the case when the query fails
//             echo "Query failed: " . mysqli_error($conn);
//         }
//     }
// } else {
//     // Handle the case when the main query fails
//     echo "Main query failed: " . mysqli_error($conn);
// }
// // End of your while loop


// echo("------------------------------------------------");

// // Start your while loop here
// $q = "SELECT id FROM users WHERE parent_id = 3";
// $query_main = mysqli_query($conn, $q);

// if ($query_main) {
//     while ($row_main = mysqli_fetch_assoc($query_main)) {
//         $id = $row_main['id']; // Get the user id

//         // Construct the query to select users with the current id
//         $as = "SELECT id,email FROM users WHERE parent_id = ?";
        
//         // Prepare the statement
//         $stmt = mysqli_prepare($conn, $as);
        
//         // Bind parameters
//         mysqli_stmt_bind_param($stmt, "i", $id);
        
//         // Execute the query
//         mysqli_stmt_execute($stmt);
        
//         // Get the result
//         $quer = mysqli_stmt_get_result($stmt);

//         // Check if the query was successful
//         if ($quer) {
//             // Fetch data from the query result
//             while ($row = mysqli_fetch_assoc($quer)) {
//                 // Print or process each row of data
//                 echo "<pre>";
//                 print_r($row);
//             }
//         } else {
//             // Handle the case when the query fails
//             echo "Query failed: " . mysqli_error($conn);
//         }
//     }
// } else {
//     // Handle the case when the main query fails
//     echo "Main query failed: " . mysqli_error($conn);
// }
// // End of your while loop




// // Array to store all IDs
// $all_ids = array();

// if ($query_main) {
//     while ($row_main = mysqli_fetch_assoc($query_main)) {
//         // Get the user id
//         $id = $row_main['id'];
        
//         // Add the ID to the array
//         $all_ids[] = $id;
        
//         // Execute the prepared statement with the new parameter
//         mysqli_stmt_execute($stmt);
        
//         // Get the result
//         $quer = mysqli_stmt_get_result($stmt);

//         // Check if the query was successful
//         if ($quer) {
//             // Fetch data from the query result
//             while ($row = mysqli_fetch_assoc($quer)) {
//                 // Print or process each row of data
//                 echo "<pre>";
//                 print_r($row);
//             }
//         } else {
//             // Handle the case when the query fails
//             echo "Query failed: " . mysqli_error($conn);
//         }
//     }
// } else {
//     // Handle the case when the main query fails
//     echo "Main query failed: " . mysqli_error($conn);
// }

// // Now $all_ids array contains all IDs from the main query
// foreach ($all_ids as $id) {
//     echo "ID: " . $id . "<br>";
// }


// //  work
// // Prepare the statement outside the loop
// $as = "SELECT id,email FROM users WHERE parent_id = ?";
// $stmt = mysqli_prepare($conn, $as);

// // Check if the statement was prepared successfully
// if (!$stmt) {
//     // Handle the case when the statement preparation fails
//     echo "Statement preparation failed: " . mysqli_error($conn);
//     // Exit or handle the error as appropriate
// } else {
//     // Bind parameters
//     mysqli_stmt_bind_param($stmt, "i", $id);
    
//     // Array to store all IDs
//     $all_ids = array();
    
//     // Execute the main query
//     $q = "SELECT id FROM users WHERE parent_id = 3";
//     $query_main = mysqli_query($conn, $q);
    
//     if ($query_main) {
//         while ($row_main = mysqli_fetch_assoc($query_main)) {
//             $id = $row_main['id']; // Get the user id
            
//             // Add the ID to the array
//             $all_ids[] = $id;
            
//             // Execute the prepared statement with the new parameter
//             mysqli_stmt_execute($stmt);
            
//             // Get the result
//             $quer = mysqli_stmt_get_result($stmt);
    
//             // Check if the query was successful
//             if ($quer) {
//                 // Fetch data from the query result
//                 while ($row = mysqli_fetch_assoc($quer)) {
//                     // Print or process each row of data
//                     echo "<pre>";
//                     print_r($row);
//                 }
//             } else {
//                 // Handle the case when the query fails
//                 echo "Query failed: " . mysqli_error($conn);
//             }
//         }
//     } else {
//         // Handle the case when the main query fails
//         echo "Main query failed: " . mysqli_error($conn);
//     }
    
//     // Now $all_ids array contains all IDs from the main query
//     foreach ($all_ids as $id) {
//         echo "ID: " . $id . "<br>";
//     }
// }

// // Close the statement after the loop
// mysqli_stmt_close($stmt);


// Check database connection
// if ($conn) {
//     // Prepare the statement outside the loop
//     $as = "SELECT id,email FROM users WHERE parent_id = ?";
//     $stmt = mysqli_prepare($conn, $as);
    
//     // Check if the statement was prepared successfully
//     if ($stmt) {
//         // Bind parameters
//         mysqli_stmt_bind_param($stmt, "i", $id);
        
//         // Array to store all IDs
//         $all_ids = array();
        
//         // Execute the main query
//         $q = "SELECT id FROM users WHERE parent_id = 14";
//         $query_main = mysqli_query($conn, $q);
        
//         if ($query_main) {
//             while ($row_main = mysqli_fetch_assoc($query_main)) {
//                 $id = $row_main['id']; // Get the user id
                
//                 // Add the ID to the array
//                 $all_ids[] = $id;
                
//                 // Execute the prepared statement with the new parameter
//                 mysqli_stmt_execute($stmt);
                
//                 // Get the result
//                 $quer = mysqli_stmt_get_result($stmt);
        
//                 // Check if the query was successful
//                 if ($quer) {
//                     // Fetch data from the query result
//                     while ($row = mysqli_fetch_assoc($quer)) {
//                         // Print or process each row of data
//                         echo "<pre>";
//                         print_r($row);
//                     }
//                 } else {
//                     // Handle the case when the query fails
//                     echo "Query failed: " . mysqli_error($conn);
//                 }
//             }
//         } else {
//             // Handle the case when the main query fails
//             echo "Main query failed: " . mysqli_error($conn);
//         }
        
//         // Now $all_ids array contains all IDs from the main query
//         foreach ($all_ids as $id) {
//             echo "ID: " . $id . "<br>";
//             // $zz = "select * from users where id = $id";
//             // $query_mai = mysqli_query($conn, $zz);
//             // while ($row444 = mysqli_fetch_assoc($query_mai)) {
//                 // Print or process each row of data
//                 // echo "<pre>";
//                 // print_r($id);
//             // }
//         }
        
//         // Close the statement after the loop
//         mysqli_stmt_close($stmt);
//     } else {
//         // Handle the case when the statement preparation fails
//         echo "Statement preparation failed: " . mysqli_error($conn);
//     }
// } else {
//     // Handle the case when the database connection fails
//     echo "Database connection failed: " . mysqli_connect_error();
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
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
    // Your PHP code here
    // Make sure to replace $conn with your database connection variable

    // Prepare the statement outside the loop
    $as = "SELECT id,name,email,Role FROM users WHERE parent_id = ?";
    $stmt = mysqli_prepare($conn, $as);

    // Check if the statement was prepared successfully
    if ($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        // Array to store all IDs
        $all_ids = array();
        
        // Execute the main query
        $q = "SELECT id FROM users WHERE parent_id = 14";
        $query_main = mysqli_query($conn, $q);
        
        // Check if the main query was successful
        if ($query_main) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th></tr>";
            while ($row_main = mysqli_fetch_assoc($query_main)) {
                $id = $row_main['id']; // Get the user id
                
                // Add the ID to the array
                $all_ids[] = $id;
                
                // Execute the prepared statement with the new parameter
                mysqli_stmt_execute($stmt);
                
                // Get the result
                $quer = mysqli_stmt_get_result($stmt);
        
                // Check if the query was successful
                if ($quer) {
                    // Fetch data from the query result and display in table
                    while ($row = mysqli_fetch_assoc($quer)) {
                        echo "<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['email'] . "</td><td>" . $row['Role'] . "</td></tr>";
                    }
                } else {
                    // Handle the case when the query fails
                    echo "<tr><td colspan='2'>Query failed: " . mysqli_error($conn) . "</td></tr>";
                }
            }
            echo "</table>";
        } else {
            // Handle the case when the main query fails
            echo "<tr><td colspan='2'>Main query failed: " . mysqli_error($conn) . "</td></tr>";
        }
        
        // Close the statement after the loop
        mysqli_stmt_close($stmt);
    } else {
        // Handle the case when the statement preparation fails
        echo "Statement preparation failed: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>








