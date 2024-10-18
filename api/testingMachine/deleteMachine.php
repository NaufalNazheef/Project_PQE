<?php
include '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    // Ambil input JSON
    $data = json_decode(file_get_contents("php://input"), true);
    $idMachine = $data['idMachine'] ?? null; // Ambil idMachine dari data

    if (!empty($idMachine)) {
        // Siapkan query
        $query = "UPDATE testingMachine SET machineStatus = 'Non-Active' WHERE idMachine = '$idMachine'";
        $result = mysqli_query($con, $query);

        // Debugging: Tampilkan query untuk pengecekan
        if (!$result) {
            echo json_encode(["message" => "Failed to update machine status", "error" => mysqli_error($con), "query" => $query]);
        } else {
            echo json_encode(["message" => "Machine status updated to Non-Active"]);
        }
    } else {
        echo json_encode(["message" => "Machine ID is required"]);
    }
} else {
    echo json_encode(["message" => "Invalid request method"]);
}
?>