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

// Thực hiện truy vấn để lấy danh sách đồ chơi từ cơ sở dữ liệu
$sql = "SELECT * FROM toys";
$result = $conn->query($sql);

// Hiển thị danh sách đồ chơi
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='toy'> 
                <h3>" . $row["toyName"] . "</h3>
                <p>" . $row["description"] . "</p>
                <p>Giá: $" . $row["price"] . "</p>
              </div>";
    }
} else {
    echo "Không có đồ chơi nào.";
}

// Đóng kết nối
$conn->close();
?>
