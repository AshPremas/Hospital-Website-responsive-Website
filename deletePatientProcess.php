<?php
require 'connection.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nic = $_POST['nic'];

    try {
        $query = "DELETE FROM patient WHERE nic = ?";
        
        Database::iud($query, [$nic], "s");

        echo json_encode(['status' => 'success', 'message' => 'Patient record deleted successfully']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}


?>
