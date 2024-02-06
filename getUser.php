<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch record based on ID
    $sql = "SELECT * FROM registrations WHERE userid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $record = $result->fetch_assoc();
        header('Content-Type: application/json');
        echo json_encode($record);
    }
    else {
        $response = array('status' => 'error', 'message' => 'Record not found: ');
        echo json_encode($response);
    }

    $stmt->close();
}
else {
    $response = array('status' => 'error', 'message' => 'Invalid request: ');
    echo json_encode($response);
}
?>
