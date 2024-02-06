<?php
include('config.php');

// Send the data as JSON response
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Assuming you have a table named 'users'
    $sql = "SELECT * FROM registrations";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = array();

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        
        echo json_encode($data);
    }
    else {
        $response = array('status' => 'error', 'message' => 'Records not found: ');
        echo json_encode($response);
    }

    $conn->close();
}
else {
    $response = array('status' => 'error', 'message' => 'Invalid request: ' . $stmt->error);
    echo json_encode($response);
    $conn->close();
}

?>
