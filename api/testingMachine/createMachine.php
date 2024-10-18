<?php
header('Content-Type: application/json');

// Cek apakah request menggunakan metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data JSON dari body request
    $data = json_decode(file_get_contents("php://input"), true);

    // Cek apakah semua data yang diperlukan sudah ada
    if (isset($data['idMachine'], $data['machineName'], $data['machineType'], $data['machineStatus'])) {
        $idMachine = $data['idMachine'];
        $machineName = $data['machineName'];
        $machineType = $data['machineType'];
        $machineStatus = $data['machineStatus'];

        // Hubungkan ke database
        include "../../config/database.php";

        // Cek koneksi ke database
        if (!$con) {
            // Jika gagal koneksi
            http_response_code(500);
            echo json_encode(["message" => "Koneksi Gagal: " . mysqli_connect_error()]);
            exit();
        }

        // Buat query untuk insert data
        $query = "INSERT INTO testingMachine (idMachine, machineName, machineType, machineStatus) 
                  VALUES ('$idMachine', '$machineName', '$machineType', '$machineStatus')";

        // Eksekusi query
        if (mysqli_query($con, $query)) {
            // Jika berhasil insert
            http_response_code(201);
            echo json_encode(["message" => "Insert Machine Success."]);
        } else {
            // Jika gagal insert
            http_response_code(500);
            echo json_encode(["message" => "Insert Machine Failed.", "error" => mysqli_error($con)]);
        }

        // Tutup koneksi
        mysqli_close($con);
    } else {
        // Jika data yang dikirim tidak lengkap
        http_response_code(400);
        echo json_encode(["message" => "Incomplete data sent."]);
    }
} else {
    // Jika metode request bukan POST
    http_response_code(405);
    echo json_encode(["message" => "Only POST requests are allowed."]);
}
?>
