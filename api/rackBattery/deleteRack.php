<?php
include '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    // Ambil input JSON
    $data = json_decode(file_get_contents("php://input"), true);
    $idBattery = $data['idBattery'] ?? null; // Ambil idBattery dari data

    if (!empty($idBattery)) {
        // Siapkan query
        $query = "UPDATE battery SET batteryStatus = 0 WHERE idBattery = '$idBattery'";
        $result = mysqli_query($con, $query);

        // Debugging: Tampilkan query untuk pengecekan
        if (!$result) {
            echo json_encode(["message" => "Failed to update battery status", "error" => mysqli_error($con), "query" => $query]);
        } else {
            echo json_encode(["message" => "Battery status updated to Non-Active"]);
        }
    } else {
        echo json_encode(["message" => "Battery ID is required"]);
    }
} else {
    echo json_encode(["message" => "Invalid request method"]);
}
?>