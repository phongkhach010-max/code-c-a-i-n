<?php
// header.php
// Header đơn giản kiểu Shopee: top links, logo, search box, icons, hero banner
// Thay đổi các biến bên dưới để tùy chỉnh
$brandName = 'Shopee';
$navLinks = [
    ['label' => 'Kênh Người Bán  |', 'url' => '#'],
    ['label' => 'Trở thành Người bán Shopee  |', 'url' => '#'],
    ['label' => 'Tải ứng dụng  |', 'url' => '#']
    
];
$topRightLinks = [

    ['label' => 'Đăng Ký  |', 'url' => '#'],
    ['label' => 'Đăng Nhập', 'url' => 'http://localhost/web%20shoppe/web%20shoppe/frontend/dangNhap%20b%e1%ba%a3ng%20m%e1%bb%9bi%20nh%e1%ba%a5t.php'],
];
$searchPlaceholder = 'Tìm kiếm sản phẩm, danh mục, thương hiệu...';
$heroImage = 'https://via.placeholder.com/1100x300/ff6a00/ffffff?text=Hero+Banner'; // thay ảnh thật
?>

<!doctype html>
<html lang="vi">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title><?php echo htmlspecialchars($brandName); ?></title>
<style>
/* --- Reset rất nhẹ --- */
*{box-sizing:border-box;margin:0;padding:0}
a{text-decoration:none;color:inherit}

/* --- Topbar --- */
.topbar{
  background:#ee4d2d;
  color:#fff;
  font-size:14px;
}
.topbar .container{
  max-width:1200px;margin:0 auto;padding:6px 16px;display:flex;justify-content:space-between;align-items:center;
}
.topbar .left, .topbar .right{display:flex;gap:14px;align-items:center}
.topbar a{color:#fff;opacity:.95}
.topbar a:hover{opacity:1;text-decoration:underline}

/* --- Main header --- */
.header{
  background: #ee4d2d;
  border-bottom:1px solid #ee4d2d;
}
.header .container{
  max-width:1200px;margin:0 auto;padding:14px 16px;display:flex;align-items:center;gap:18px;
}
.logo{
  display:flex;align-items:center;gap:8px;
}
.logo img{height:44px; width:auto}
.brand-title{font-weight:700;color:#ff5a00;font-size:22px}

/* Search */
.search-wrap{flex:1;display:flex;align-items:center}
.search-box{
  width:100%;display:flex;border-radius:6px;overflow:hidden;border:1px solid #eee;background:#ee4d2d;
  box-shadow:0 1px 2px rgba(0,0,0,.03)
}
.search-box input[type="text"]{
  flex:1;padding:12px 14px;border:0;font-size:15px;outline:none
}
.search-box button{
  background:#ff5a00;color:#fff;border:0;padding:10px 18px;font-weight:600;cursor:pointer
}

/* Icons right */
.icons{display:flex;gap:12px;align-items:center}
.icon-btn{padding:8px 12px;border-radius:6px;background:transparent;cursor:pointer;display:flex;gap:8px;align-items:center}
.icon-btn:hover

/* --- Hero area --- */
.hero{
  background:#fff;padding:12px 0;border-bottom:10px solid #fff3ea;
}
.hero .container{max-width:1200px;margin:0 auto;padding:0 16px;display:flex;gap:16px;align-items:center}
.hero .main-banner{flex:1}
.hero img{width:100%;height:auto;border-radius:6px;display:block}

/* --- Responsive --- */
@media (max-width:900px){
  .topbar .container{padding:8px}
  .header .container{flex-wrap:wrap}
  .search-wrap{order:3;width:100%}
  .icons{order:2;margin-left:auto}
  .logo{order:1}
  .hero .container{flex-direction:column}
}
</style>
</head>
<body>

<!-- Topbar -->
<div class="topbar">
  <div class="container">
    <div class="left">
      <?php foreach($navLinks as $n): ?>
        <a href="<?= htmlspecialchars($n['url']) ?>"><?= htmlspecialchars($n['label']) ?></a>
       <div class="social-connect">
  
  
</div>


      <?php endforeach; ?>
      <span class="label">Kết nối</span>
      <img src="logo/fb-trang.png" alt="">
      <img src="logo/itg-trang.png" alt="">
    </div>
    <div class="right">
      <img src="logo/chuong.png" alt=""><span class="label">Thông Báo</span>
      <img src="logo/question" alt=""><span class="label">Hỗ Trợ</span>
      <img src="logo/traidat.png" alt=""><span class="label">Tiếng Việt</span>


    
    <?php foreach ($topRightLinks as $link): ?>
        <a href="<?php echo $link['url']; ?>" class="top-link">
            <?php echo $link['label']; ?>
        </a>
    <?php endforeach; ?>
</div>

    </div>
  </div>
</div>

<!-- Header -->
<header class="header">
  <div class="container">
    <div class="logo">
      <!-- Thay logo.png bằng file logo của bạn -->
      <img src="logo/shopee.jpg" alt="logo">
    </div>

    <div class="search-wrap" role="search">
      <form class="search-box" action="#" method="get" onsubmit="event.preventDefault(); alert('Tìm: '+this.q.value)">
        <input type="text" name="q" placeholder="<?= htmlspecialchars($searchPlaceholder) ?>" aria-label="Tìm kiếm">
        <button type="submit"><img src="logo/kinhlup.png" alt=""></button>
      </form>
    </div>

    <div class="icons">
      <a class="icon-btn" href="#"><img src="logo/giohang.png" alt=""></a>

    </div>
  </div>
</header>



</body>
</html>
