<?php
// 1. Kết nối Database
$host = "localhost";
$username = "root";
$password = "";
$dbname = "little_rose_db";

$conn = new mysqli($host, $username, $password, $dbname);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die(json_encode([]));
}

// 2. Lấy 10 bản ghi mới nhất từ bảng donations (Tên bảng Ân đã tạo)
$sql = "SELECT fullname, amount, message, created_at FROM donation ORDER BY created_at DESC LIMIT 10";
$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// 3. Trả về kết quả dạng JSON để JavaScript đọc
header('Content-Type: application/json');
echo json_encode($data);

$conn->close();
?>