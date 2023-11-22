<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy dữ liệu từ POST request
$toyName = $_POST['toyName'];
$description = $_POST['description'];
$price = $_POST['price'];

// Thực hiện truy vấn để thêm dữ liệu vào cơ sở dữ liệu
$sql = "INSERT INTO toys (toyName, description, price) VALUES ('$toyName', '$description', '$price')";

if ($conn->query($sql) === TRUE) {
    echo "Đã thêm đồ chơi thành công!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Đóng kết nối
$conn->close();
?>
