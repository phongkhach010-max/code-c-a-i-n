<?php
session_start();
include('ketnoi.php'); // Kết nối cơ sở dữ liệu

// Bật hiển thị lỗi trong PHP
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Kiểm tra giỏ hàng có sản phẩm không
if (!isset($_SESSION['giohang']) || empty($_SESSION['giohang'])) {
    echo "<script>alert('Giỏ hàng của bạn không có sản phẩm!'); window.location.href='gioHang.php';</script>";
    exit();
}

// Giả sử MA_ND là mã người dùng, bạn có thể lấy từ session nếu đã đăng nhập
$MA_ND = 1; // Thay đổi thành mã người dùng thực tế
$totalPriceAll = 0;

// Bắt đầu giao dịch trong cơ sở dữ liệu
mysqli_begin_transaction($connect);

try {
    // Vô hiệu hóa kiểm tra khóa ngoại tạm thời
    mysqli_query($connect, "SET foreign_key_checks = 0");

    // 1. Tính tổng tiền giỏ hàng và kiểm tra dữ liệu sản phẩm
    foreach ($_SESSION['giohang'] as $MA_SP => $soLuong) {
        $sql = "SELECT * FROM sanpham WHERE MA_SP = ?";
        $stmt = mysqli_prepare($connect, $sql);
        mysqli_stmt_bind_param($stmt, "i", $MA_SP);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $totalPriceAll += $row['GIA'] * $soLuong;
        } else {
            throw new Exception("Sản phẩm với mã $MA_SP không tồn tại trong bảng sanpham.");
        }
    }

    // 2. Thêm đơn hàng vào cơ sở dữ liệu
    $thoigian = date('Y-m-d H:i:s');
    $ngaydat = date('Y-m-d H:i:s'); // Ngày đặt đơn hàng
    $ma_tt = NULL; // Trạng thái thanh toán có thể là NULL ban đầu nếu chưa thanh toán

    $sqlInsertDH = "INSERT INTO donhang (MA_ND, MA_TT, NGAYDAT, TONGTIEN, thoigian) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connect, $sqlInsertDH);
    mysqli_stmt_bind_param($stmt, "iisss", $MA_ND, $ma_tt, $ngaydat, $totalPriceAll, $thoigian);

    if (!mysqli_stmt_execute($stmt)) {
        die("Không thể thêm đơn hàng vào cơ sở dữ liệu. Lỗi: " . mysqli_stmt_error($stmt));
    }

    // Lấy mã đơn hàng vừa tạo
    $MA_DH = mysqli_insert_id($connect);

    // 3. Thêm chi tiết đơn hàng vào bảng `chitietdonhang`
    $sqlInsertCTDH = "INSERT INTO chitietdonhang (MA_SP, MA_DH, SOLUONG_CTDH) VALUES (?, ?, ?)";
    $stmtCT = mysqli_prepare($connect, $sqlInsertCTDH);

    foreach ($_SESSION['giohang'] as $MA_SP => $soLuong) {
        mysqli_stmt_bind_param($stmtCT, "iii", $MA_SP, $MA_DH, $soLuong);
        if (!mysqli_stmt_execute($stmtCT)) {
            die("Không thể thêm chi tiết đơn hàng. Lỗi: " . mysqli_stmt_error($stmtCT));
        }
    }

    // 4. Commit giao dịch và xóa giỏ hàng
    if (!mysqli_commit($connect)) {
        die("Lỗi khi commit giao dịch: " . mysqli_error($connect));
    }

    unset($_SESSION['giohang']); // Xóa giỏ hàng sau khi thanh toán thành công

    // Bật lại kiểm tra khóa ngoại sau khi thêm xong
    mysqli_query($connect, "SET foreign_key_checks = 1");

    // Hiển thị thông báo thanh toán thành công
    echo "<div style='text-align: center;'><h2>Thanh toán thành công!</h2><a href='index.php' class='btn btn-primary'>Về trang chủ</a></div>";

} catch (Exception $e) {
    // Nếu có lỗi, rollback giao dịch và thông báo lỗi
    mysqli_rollback($connect);
    echo "<script>alert('Thanh toán thất bại: " . $e->getMessage() . "'); window.location.href='gioHang.php';</script>";
}
?>