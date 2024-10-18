<?php
include '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $query = "SELECT * FROM battery WHERE batteryStatus = 1";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $battery = [];
        
        while ($row = mysqli_fetch_assoc($result)) {
            $battery[] = $row; // Menambahkan setiap baris ke dalam array
        }
        
        echo json_encode($battery); // Mengembalikan semua data dalam bentuk JSON
    } else {
        echo json_encode(["message" => "Battery not found"]);
    }
} else {
    echo json_encode(["message" => "Invalid request method"]);
}
?>
