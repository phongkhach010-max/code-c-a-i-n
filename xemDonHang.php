<?php
session_start();
include('ketnoi.php');

// Kết nối database
$connect = mysqli_connect('localhost', 'root', '', 'tmdt');
if (!$connect) {
    die("Lỗi kết nối: " . mysqli_connect_error());
}

// Kiểm tra nếu người dùng bấm nút "Về Trang Chủ" → xóa giỏ hàng
if (isset($_GET['action']) && $_GET['action'] === 'clear_cart') {
    unset($_SESSION['giohang']); // Xóa giỏ hàng
    header('Location: index.php'); // Quay về trang chủ
    exit();
}

// Lấy thông tin khách hàng
$MA_ND = 1;
$sql_user = "SELECT * FROM nguoidung WHERE MA_ND = ?";
$stmt_user = mysqli_prepare($connect, $sql_user);
mysqli_stmt_bind_param($stmt_user, "i", $MA_ND);
mysqli_stmt_execute($stmt_user);
$result_user = mysqli_stmt_get_result($stmt_user);

if (mysqli_num_rows($result_user) == 0) {
    die("Không tìm thấy thông tin khách hàng.");
}

$customer = mysqli_fetch_assoc($result_user);
$total_price = 0;
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Giỏ Hàng</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #ff5722;
            color: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            color: #333;
            padding: 20px;
            border-radius: 8px;
        }
        .order-info {
            margin-bottom: 20px;
        }
        .order-info h4 {
            color: #ff5722;
        }
        .order-info p {
            font-size: 1.1rem;
        }
        .btn-orange {
            background-color: #ff5722;
            color: white;
            border: none;
        }
        .product-item {
            margin-bottom: 15px;
        }
        .product-item img {
            max-width: 50px;
            margin-right: 15px;
        }
        .customer-info {
            margin-top: 30px;
        }

        /* ✅ FIX KHUNG TRẮNG KHI HIỆN MODAL */
        .modal-content {
            background-color: #fff !important;
            color: #000 !important;
            transition: none !important;
        }
        .modal.fade .modal-dialog {
            transition: none !important;
        }
        .modal-backdrop.show {
            opacity: 0.5 !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Thông Tin Giỏ Hàng</h2>

        <?php
        if (!empty($_SESSION['giohang'])) {
            foreach ($_SESSION['giohang'] as $MA_SP => $soLuong) {
                $sql = "SELECT * FROM sanpham WHERE MA_SP = $MA_SP";
                $result = mysqli_query($connect, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    $product = mysqli_fetch_assoc($result);
                    $total_price_product = $product['GIA'] * $soLuong;
                    $total_price += $total_price_product;

                    echo "
                    <div class='order-info'>
                        <h4>" . htmlspecialchars($product['TEN_SP']) . "</h4>
                        <div class='d-flex align-items-center product-item'>
                            <img src='../images/" . htmlspecialchars($product['HINHANH']) . "' alt='" . htmlspecialchars($product['TEN_SP']) . "'>
                            <p class='ms-3'>Số lượng: " . $soLuong . "</p>
                            <p class='ms-3'>Giá: " . number_format($product['GIA'], 0, ',', '.') . "₫</p>
                            <p class='ms-3'>Tổng: " . number_format($total_price_product, 0, ',', '.') . "₫</p>
                        </div>
                    </div>";
                }
            }
        } else {
            echo "<p class='text-center text-danger'>Giỏ hàng trống.</p>";
        }
        ?>

        <div class="order-info">
            <h4>Tổng Tiền: <?php echo number_format($total_price, 0, ',', '.'); ?>₫</h4>
        </div>

        <!-- Thông tin khách hàng -->
        <div class="customer-info">
            <h4>Thông Tin Khách Hàng</h4>
            <p><strong>Tên: </strong><?php echo htmlspecialchars($customer['HOTEN']); ?></p>
            <p><strong>Số Điện Thoại: </strong><?php echo htmlspecialchars($customer['SDT']); ?></p>
            <p><strong>Địa Chỉ: </strong><?php echo htmlspecialchars($customer['DIACHI']); ?></p>
        </div>

        <!-- Nút thanh toán -->
        <button class="btn btn-orange w-100 mt-3" id="paymentBtn" data-bs-toggle="modal" data-bs-target="#paymentModal">
            Thanh Toán
        </button>
    </div>

    <!-- Modal -->
    <div class="modal" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Thông Báo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                </div>
                <div class="modal-body">
                    <p>Thanh toán thành công! Đơn hàng của bạn sẽ được giao trong vài ngày tới.</p>
                </div>
                <div class="modal-footer">
                    <!-- ✅ Link quay về trang chủ và xóa giỏ hàng -->
                    <a href="xemDonHang.php?action=clear_cart" class="btn btn-success">Về Trang Chủ</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Hiển thị modal khi bấm thanh toán
        document.getElementById("paymentBtn").addEventListener("click", function () {
            const modal = new bootstrap.Modal(document.getElementById('paymentModal'));
            modal.show();
        });
    </script>
</body>
</html>
