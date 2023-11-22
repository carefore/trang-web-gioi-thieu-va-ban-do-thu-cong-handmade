<?php
// Kết nối đến cơ sở dữ liệu - Thay đổi thông tin này để phù hợp với cấu hình cơ sở dữ liệu của bạn
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "ten_cua_csdl";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
  die("Kết nối không thành công: " . $conn->connect_error);
}

// Lấy dữ liệu từ POST request
$productName = $_POST['productName'];
$productDescription = $_POST['productDescription'];
$productPrice = $_POST['productPrice'];

// Chuẩn bị câu lệnh SQL để chèn dữ liệu vào cơ sở dữ liệu
$sql = "INSERT INTO products (name, description, price) VALUES ('$productName', '$productDescription', '$productPrice')";

if ($conn->query($sql) === TRUE) {
  echo "Sản phẩm đã được thêm thành công!";
} else {
  echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

// Đóng kết nối
$conn->close();
?>
