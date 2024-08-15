<?php
header('Content-Type: application/json');
require 'db_config.php';

// Tentukan aksi yang akan dilakukan
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'get_locations':
            getLocations($conn);
            break;
        
        case 'get_tank_data':
            if (isset($_GET['location_id'])) {
                getTankData($conn, $_GET['location_id']);
            } else {
                echo json_encode(['error' => 'Location ID not provided']);
            }
            break;
        
        case 'reset_tank':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = json_decode(file_get_contents('php://input'), true);
                if (isset($data['location_id'])) {
                    resetTank($conn, $data['location_id']);
                } else {
                    echo json_encode(['error' => 'Location ID not provided']);
                }
            } else {
                echo json_encode(['error' => 'Invalid request method']);
            }
            break;

        default:
            echo json_encode(['error' => 'Invalid action']);
    }
} else {
    echo json_encode(['error' => 'No action specified']);
}

$conn->close();

function getLocations($conn) {
    $sql = "SELECT id, name FROM locations";
    $result = $conn->query($sql);

    $locations = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $locations[] = $row;
        }
    }
    echo json_encode(['locations' => $locations]);
}

function getTankData($conn, $location_id) {
   $sql = "SELECT Kapasitas FROM updata WHERE location_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $location_id);
    $stmt->execute();
    $stmt->bind_result($capacity);
    $stmt->fetch();
    $stmt->close();

    if ($capacity !== null) {
        echo json_encode(['capacity' => $capacity]);
    } else {
        echo json_encode(['error' => 'No tank data found for this location']);
    }
}

function resetTank($conn, $location_id) {
    $sql = "UPDATE updata SET Kapasitas = 0 WHERE location_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $location_id);
    $success = $stmt->execute();
    $stmt->close();

    if ($success) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['error' => 'Failed to reset tank']);
    }
}
?>