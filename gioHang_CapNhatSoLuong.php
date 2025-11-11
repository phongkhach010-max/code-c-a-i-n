<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['MA_SP'], $_POST['action'])) {
        $MA_SP = (int)$_POST['MA_SP'];
        $action = $_POST['action'];

        // Kiểm tra nếu sản phẩm tồn tại trong giỏ hàng
        if (isset($_SESSION['giohang'][$MA_SP])) {
            if ($action === 'increase') {
                $_SESSION['giohang'][$MA_SP]++;  // Tăng số lượng
            } elseif ($action === 'decrease') {
                if ($_SESSION['giohang'][$MA_SP] > 1) {
                    $_SESSION['giohang'][$MA_SP]--;  // Giảm số lượng nhưng không nhỏ hơn 1
                }
            }
        }
    }
}

// Không cần chuyển hướng vì chúng ta đã sử dụng AJAX
?>