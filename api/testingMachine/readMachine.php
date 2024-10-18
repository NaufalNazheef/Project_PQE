<?php
include '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $query = "SELECT * FROM testingMachine WHERE machineStatus = 'Active'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $machines = [];
        
        while ($row = mysqli_fetch_assoc($result)) {
            $machines[] = $row; // Menambahkan setiap baris ke dalam array
        }
        
        echo json_encode($machines); // Mengembalikan semua data dalam bentuk JSON
    } else {
        echo json_encode(["message" => "Machine not found"]);
    }
} else {
    echo json_encode(["message" => "Invalid request method"]);
}
?>
