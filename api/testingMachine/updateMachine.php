<?php
include '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    // Ambil input JSON
    $data = json_decode(file_get_contents("php://input"), true);
    
    $idMachine = $data['idMachine'] ?? null; // Ambil idMachine dari data
    $machineName = $data['machineName'] ?? null;
    $machineType = $data['machineType'] ?? null;
    $machineStatus = $data['machineStatus'] ?? null;

    if (!empty($idMachine) && !empty($machineName) && !empty($machineType) && !empty($machineStatus)) {
        $query = "UPDATE testingMachine 
                  SET machineName = '$machineName', machineType = '$machineType', machineStatus = '$machineStatus' 
                  WHERE idMachine = '$idMachine'";
        $result = mysqli_query($con, $query);

        if ($result) {
            echo json_encode(["message" => "Machine updated successfully"]);
        } else {
            echo json_encode(["message" => "Failed to update machine", "error" => mysqli_error($con)]);
        }
    } else {
        echo json_encode(["message" => "All fields are required"]);
    }
} else {
    echo json_encode(["message" => "Invalid request method"]);
}
?>
