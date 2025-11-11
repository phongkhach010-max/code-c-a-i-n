<?php
session_start(); // Bắt đầu session để lưu giỏ hàng
include('ketnoi.php'); // Kết nối database
include('navBar.php'); // Navbar

// Bật hiển thị lỗi trong PHP
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Kiểm tra nếu giỏ hàng có sản phẩm
$totalPriceAll = 0;

// Kiểm tra và xử lý các yêu cầu thay đổi số lượng sản phẩm
if (isset($_GET['increase'])) {
    $MA_SP = intval($_GET['increase']);
    if (isset($_SESSION['giohang'][$MA_SP])) {
        $_SESSION['giohang'][$MA_SP]++;
    }
    header("Location: gioHang.php");
    exit();
}

if (isset($_GET['decrease'])) {
    $MA_SP = intval($_GET['decrease']);
    if (isset($_SESSION['giohang'][$MA_SP]) && $_SESSION['giohang'][$MA_SP] > 1) {
        $_SESSION['giohang'][$MA_SP]--;
    }
    header("Location: gioHang.php");
    exit();
}

if (isset($_GET['delete'])) {
    $MA_SP = intval($_GET['delete']);
    unset($_SESSION['giohang'][$MA_SP]);
    header("Location: gioHang.php");
    exit();
}

// Xóa tất cả sản phẩm trong giỏ hàng
if (isset($_GET['clear_cart'])) {
    unset($_SESSION['giohang']);
    header("Location: gioHang.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container-xl mt-4">
    <h4 class="mb-4"><i class="bi bi-bag"></i> Giỏ Hàng</h4>
    <table class="table table-striped align-middle text-center">
        <thead>
            <tr>
                <th>Ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá tiền</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if (!empty($_SESSION['giohang'])) {
            foreach ($_SESSION['giohang'] as $MA_SP => $soLuong) {
                // Lấy thông tin sản phẩm từ cơ sở dữ liệu
                $sql = "SELECT * FROM sanpham WHERE MA_SP = $MA_SP";
                $ketqua = mysqli_query($connect, $sql);

                if ($ketqua && mysqli_num_rows($ketqua) > 0) {
                    $row = mysqli_fetch_assoc($ketqua);
                    $totalPrice = $row['GIA'] * $soLuong;
                    $totalPriceAll += $totalPrice;
                    $imgSrc = !empty($row['HINHANH']) ? "../images/" . htmlspecialchars($row['HINHANH']) : "https://via.placeholder.com/60x60?text=No+Image";

                    echo "
                    <tr>
                        <td><img src='$imgSrc' alt='" . htmlspecialchars($row['TEN_SP']) . "' width='60' height='60' style='object-fit: contain;'></td>
                        <td class='text-start'>" . htmlspecialchars($row['TEN_SP']) . "</td>
                        <td>
                            <a href='gioHang.php?increase=$MA_SP' class='btn btn-sm btn-dark'>+</a>
                            $soLuong
                            <a href='gioHang.php?decrease=$MA_SP' class='btn btn-sm btn-dark'>-</a>
                        </td>
                        <td>" . number_format($totalPrice, 0, ',', '.') . "₫</td>
                        <td>
                            <a href='gioHang.php?delete=$MA_SP' class='btn btn-danger btn-sm'>Xóa</a>
                        </td>
                    </tr>";
                }
            }
        } else {
            echo "<tr><td colspan='5' class='text-center py-4'>Giỏ hàng trống! <a href='index.php' class='btn btn-link'>Tiếp tục mua sắm</a></td></tr>";
        }
        ?>
        </tbody>
    </table>

    <!-- Hiển thị tổng giá trị giỏ hàng -->
    <div class="d-flex justify-content-between align-items-center">
        <h5>Tổng tiền: <?php echo number_format($totalPriceAll, 0, ',', '.'); ?>₫</h5>
        <!-- Nút tiến hành thanh toán -->
        <a href="xemDonHang.php" class="btn btn-success">Thanh Toán</a>
    </div>

    <!-- Nút xóa tất cả sản phẩm -->
    <div class="text-center mt-4">
        <a href="gioHang.php?clear_cart=1" class="btn btn-danger btn-sm">Xóa tất cả</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>