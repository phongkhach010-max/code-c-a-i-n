<?php
// Bắt buộc đầu file
session_start();
session_set_cookie_params(['path'=>'/']); // giữ session trên toàn project
header('Content-Type: text/html; charset=UTF-8');

include('ketnoi.php');

$tendangnhap = trim($_POST['tendangnhap'] ?? '');
$matkhau = trim($_POST['matkhau'] ?? '');

if (!$tendangnhap || !$matkhau) {
    echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
}

// Prepared statement
$sql = "SELECT * FROM nguoidung WHERE HOTEN = ?";
$stmt = mysqli_prepare($connect, $sql);
mysqli_stmt_bind_param($stmt, "s", $tendangnhap);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 0) {
    echo "Tên đăng nhập không tồn tại. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
}

$row = mysqli_fetch_assoc($result);

// So sánh mật khẩu
if ($matkhau !== $row['MATKHAU']) {
    echo "Mật khẩu không đúng. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
}

// Lưu session
$_SESSION['MA_ND'] = $row['MA_ND'];
$_SESSION['tendangnhap'] = $row['HOTEN'];
$_SESSION['role'] = $row['ROLE'];

// Chuyển hướng
header("Location: index.php");
exit;
?>