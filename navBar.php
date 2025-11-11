<?php
// === Khởi động session nếu chưa có ===
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// === Làm sạch giỏ hàng rỗng ===
if (isset($_SESSION['giohang']) && empty($_SESSION['giohang'])) {
    unset($_SESSION['giohang']);
}

// === Tính tổng số lượng sản phẩm trong giỏ hàng ===
$soLuongSanPham = 0;
if (!empty($_SESSION['giohang']) && is_array($_SESSION['giohang'])) {
    foreach ($_SESSION['giohang'] as $soluong) {
        $soLuongSanPham += (int)$soluong;
    }
}

// === Kiểm tra đăng nhập ===
$tendangnhap = $_SESSION['tendangnhap'] ?? null;
?>

<!-- 🧭 NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow p-2" 
     style="background: linear-gradient(180deg, #ff5c16 0%, #ff530a 90%, #fe6817 100%);">
    <div class="container-xl d-flex justify-content-between align-items-center">

        <!-- 🛍️ Logo -->
        <a href="index.php" class="navbar-brand fw-bold text-uppercase d-flex align-items-center gap-1">
            <i class="bi bi-bucket fs-4"></i> <span>SHOPEE</span>
        </a>

        <!-- 🔍 Ô tìm kiếm -->
        <form class="d-none d-md-flex" role="search" action="index.php" method="POST" style="flex: 1; justify-content: center;">
            <div class="position-relative" style="max-width: 500px; width: 100%;">
                <input class="form-control" type="search" name="searchValue" placeholder="Tìm kiếm sản phẩm..." aria-label="Search">
                <button class="btn position-absolute end-0 top-50 translate-middle-y py-1 px-2 me-1 border-0"
                        style="background-color: #ff5c16; color: white;" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>

        <!-- 👤 Tài khoản + 🛒 Giỏ hàng -->
        <ul class="navbar-nav ms-3 d-flex align-items-center gap-2">

            <!-- 🛒 Giỏ hàng -->
            <li class="nav-item position-relative">
                <a class="nav-link text-white fw-semibold position-relative" href="gioHang.php">
                    <i class="bi bi-cart fs-5 me-1"></i> Giỏ hàng
                    <?php if ($soLuongSanPham > 0): ?>
                        <span class="badge bg-danger rounded-pill position-absolute top-0 start-100 translate-middle"
                              style="font-size: 0.7rem; padding: 0.25em 0.45em;">
                            <?= $soLuongSanPham ?>
                        </span>
                    <?php endif; ?>
                </a>
            </li>

            <!-- 👤 Tài khoản -->
            <li class="nav-item dropdown">
                <?php if ($tendangnhap): ?>
                    <a class="nav-link dropdown-toggle text-white fw-semibold" href="#" id="userDropdown"
                       role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle me-1"></i> <?= htmlspecialchars($tendangnhap) ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                        <li><a class="dropdown-item" href="thongTinKhachHang.php"><i class="bi bi-person-fill me-1"></i> Thông tin</a></li>
                        <li><a class="dropdown-item" href="logOut.php"><i class="bi bi-box-arrow-right me-1"></i> Đăng xuất</a></li>
                    </ul>
                <?php else: ?>
                    <a class="nav-link text-white fw-semibold" href="dangNhap bảng mới nhất.php">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Đăng nhập / Đăng ký
                    </a>
                <?php endif; ?>
            </li>
        </ul>
    </div>
</nav>