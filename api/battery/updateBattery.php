<?php
include '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    // Ambil input JSON
    $data = json_decode(file_get_contents("php://input"), true);
    
    $idBattery = $data['idMachine'] ?? null; // Ambil idBattery dari data
    $batteryCapacity = $data['batteryCapacity'] ?? null;
    $batteryStatus = $data['batteryStatus'] ?? null;

    if (!empty($idBattery) && !empty($batteryCapacity) && !empty($batteryStatus)) {
        $query = "UPDATE battery 
                  SET batteryCapacity = '$batteryCapacity', batteryStatus = '$batteryStatus' 
                  WHERE idBattery = '$idBattery'";
        $result = mysqli_query($con, $query);

        if ($result) {
            echo json_encode(["message" => "Battery updated successfully"]);
        } else {
            echo json_encode(["message" => "Failed to update battery", "error" => mysqli_error($con)]);
        }
    } else {
        echo json_encode(["message" => "All fields are required"]);
    }
} else {
    echo json_encode(["message" => "Invalid request method"]);
}
?>
