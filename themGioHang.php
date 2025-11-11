<?php
session_start();
include('ketnoi.php');

// Kiểm tra nếu có mã sản phẩm
if (isset($_GET['MA_SP'])) {
    $MA_SP = (int)$_GET['MA_SP'];

    // Nếu giỏ hàng chưa tồn tại thì tạo mới
    if (!isset($_SESSION['giohang'])) {
        $_SESSION['giohang'] = [];
    }

    // Nếu sản phẩm đã tồn tại thì tăng số lượng
    if (isset($_SESSION['giohang'][$MA_SP])) {
        $_SESSION['giohang'][$MA_SP]++;
    } else {
        $_SESSION['giohang'][$MA_SP] = 1;
    }

    // Sau khi thêm xong, chuyển qua trang giỏ hàng
    header("Location: gioHang.php");
    exit;
} else {
    // Nếu thiếu mã sản phẩm → quay về trang chủ
    header("Location: index.php");
    exit;
}
?>