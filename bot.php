<<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "hospital_chat";

// Connect to MySQL database
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connection Successful<br>";

    // User input
    $user_input = "Hello";

// SQL query to select a response based on user input
    //$sql = "SELECT response FROM chats WHERE Message = ?";
    
    // Query to display message based on ID 
   // $sql = "SELECT response FROM chats WHERE ID = 1";

    // Prepares the statement
    $stmt = $conn->prepare($sql);

    // Executes the statement
    $stmt->execute();

    // Gets the result after executing the statement
    $result = $stmt->get_result();

    // Checking if there is at least one row returned
    if ($result && $result->num_rows > 0) {
        // Outputs data of the selected row
        while ($row = $result->fetch_assoc()) {
            echo "Response: " . $row["response"] . "<br>";
        }
    } else {
        echo "No response found for the message: " . $user_input;
    }

    // Close statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
