<?php
// 1. Nạp bộ máy WordPress để dùng hàm điều hướng
require_once('../../../wp-load.php');

// 2. Kết nối Database
$host = "localhost";
$username = "root";
$password = "";
$dbname = "little_rose_db";

$conn = new mysqli($host, $username, $password, $dbname);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// 3. Lấy dữ liệu từ Form đăng ký
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    // 4. Lệnh chèn vào bảng volunteers
    $sql = "INSERT INTO volunteers (fullname, email, role) VALUES ('$fullname', '$email', '$role')";

    if ($conn->query($sql) === TRUE) {
        // Thành công thì bay sang trang Cảm ơn có hoa rơi
        $thankyou_url = home_url('/thank-you/'); 
        header("Location: $thankyou_url");
        exit(); 
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
$conn->close();
?>