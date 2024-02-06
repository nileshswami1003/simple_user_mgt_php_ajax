<?php

require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $userId = $_POST['userId'];

    // Save data to the database
    $sql = "UPDATE registrations SET first_name = ?, last_name = ? WHERE userid = ?";
    $stmt = $conn->prepare($sql);
    
    // Bind parameters and execute the query
    $stmt->bind_param("ssi", $firstName, $lastName, $userId);
    $stmt->execute();

    // Check for success and send a JSON response
    if ($stmt->affected_rows > 0) {
        $response = array('status' => 'success', 'message' => 'Data updated successfully!');
        echo json_encode($response);
    }
    else {
        $response = array('status' => 'error', 'message' => 'Error updating data: ' . $stmt->error);
        echo json_encode($response);
    }
    // Close the database connection
    $conn->close();
}
else {
    $response = array('status' => 'error', 'message' => 'Invalid request: ' . $stmt->error);
}
?>
