<?php
session_start();

// Xóa toàn bộ giỏ hàng (và đếm lại từ đầu)
unset($_SESSION['giohang']);

echo "🧹 Giỏ hàng đã được dọn sạch!<br>";
echo '<a href="index.php">⬅️ Quay lại trang chủ</a>';