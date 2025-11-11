<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Đăng nhập</title>

  <!-- Font & CSS -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <style>
    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(135deg, #ff5722, #d0011b);
      min-height: 100vh;
      overflow-x: hidden;
      color: white;
      font-family: "Nunito", sans-serif;
    }

    header {
      background-color: #111;
      color: white;
      padding: 12px 80px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 2px solid #d0011b;
    }

    .card {
      background-color: #000;
      color: white;
      border: none !important;
      box-shadow: none !important;
      border-radius: 8px;
    }

    .form-control-user {
      background-color: #111;
      border: 1px solid #444;
      color: white;
      border-radius: 5px !important;
      padding: 10px 15px;
      height: 45px;
    }

    .form-control-user:focus {
      background-color: #111;
      border-color: #ff4d4d;
      box-shadow: none;
      color: white;
    }

    .btn-user {
      background-color: #d0011b;
      border: none;
      color: white;
      border-radius: 5px !important;
      height: 45px;
      font-weight: 500;
      transition: 0.3s;
    }

    .btn-user:hover {
      background-color: #ff3b30;
    }

    #togglePassword {
      color: #aaa;
      cursor: pointer;
    }

    #togglePassword:hover {
      color: white;
    }

    @media (max-width: 992px) {
      .col-lg-7 {
        display: none !important;
      }

      header {
        flex-direction: column;
        text-align: center;
        padding: 15px;
      }

      header img {
        height: 40px !important;
        top: 0 !important;
      }
    }

    @media (max-width: 768px) {
      .card {
        padding: 30px 20px !important;
      }

      .btn-user,
      .form-control-user {
        height: 40px;
      }
    }
  </style>
</head>

<body>

  <!-- HEADER -->
  <header>
    <a href="index.php" style="display:flex; align-items:center; text-decoration:none;">
      <img src="logo shoppe.png" alt="Shopee Logo"
        style="height:50px; width:auto; margin-right:10px; position:relative; top:-10px; cursor:pointer;">
      <span style="font-size:25px; font-weight:500; color:white;">Đăng nhập</span>
    </a>
    <a href="hoTro.php" style="color:#ee4d2d; text-decoration:none; font-size:20px;">Bạn cần giúp đỡ?</a>
  </header>

  <!-- NỘI DUNG CHÍNH -->
  <div class="container-fluid py-5">
    <div class="row align-items-center justify-content-center">

      <!-- BANNER BÊN TRÁI -->
      <div class="col-lg-7 col-md-6 d-none d-md-flex align-items-center justify-content-center text-center">
        <div class="text-center p-5">
          <h1 class="display-3 font-weight-bold">10.10 Đại Tiệc Thương Hiệu</h1>
          <p class="lead">Voucher giảm đến <b>50%</b> - Siêu nhanh, siêu rẻ!</p>
        </div>
      </div>

      <!-- FORM BÊN PHẢI -->
      <div class="col-lg-5 d-flex align-items-center justify-content-center">
        <div class="card shadow-lg p-5" style="width:100%; max-width:400px;">
          <div class="text-center mb-4">
            <h1 class="h4 text-gray-900">Đăng Nhập</h1>
          </div>

          <form class="user" action="xuLyDangNhap.php" method="POST">
            <!-- Tên đăng nhập -->
            <div class="form-group">
              <input name="tendangnhap" type="text" class="form-control form-control-user" placeholder="Tên đăng nhập...">
            </div>

            <!-- Mật khẩu + icon con mắt -->
            <div class="form-group position-relative">
              <input name="matkhau" type="password" class="form-control form-control-user" id="passwordInput"
                placeholder="Mật khẩu...">
              <span class="fas fa-eye position-absolute" id="togglePassword"
                style="top:50%; right:15px; transform:translateY(-50%);"></span>
            </div>

            <!-- Nút đăng nhập -->
            <button type="submit" class="btn btn-danger btn-user btn-block">Đăng nhập</button>

            <!-- Quên mật khẩu -->
            <p style="text-align:left; margin:15px 0 0 5px;">
              <a href="quenMatKhau.php" style="color:#2673dd; text-decoration:none;">Quên mật khẩu</a>
            </p>

            <!-- HOẶC -->
            <div style="display:flex; align-items:center; text-align:center; margin:20px 0;">
              <hr style="flex:1; border:none; border-top:1px solid #ccc;">
              <span style="margin:0 10px; color:#666; font-weight:500;">HOẶC</span>
              <hr style="flex:1; border:none; border-top:1px solid #ccc;">
            </div>

            <!-- Đăng nhập bằng MXH -->
            <div style="display:flex; justify-content:center; gap:15px; margin-top:10px;">
              <!-- Facebook -->
              <button type="button" onclick="window.open('https://www.facebook.com/ShopeeVN', '_blank')"
                style="flex:1; max-width:180px; height:45px; display:flex; align-items:center; justify-content:center; gap:8px; border:1px solid #444; border-radius:5px; background-color:#000; color:white; cursor:pointer; transition:0.3s;">
                <i class="fab fa-facebook" style="color:#1877f2; font-size:18px;"></i>Facebook
              </button>

              <!-- Google -->
              <button type="button" onclick="window.open('https://www.google.com/search?q=Shopee', '_blank')"
                style="flex:1; max-width:180px; height:45px; display:flex; align-items:center; justify-content:center; gap:8px; border:1px solid #444; border-radius:5px; background-color:#000; color:white; cursor:pointer; transition:0.3s;">
                <i class="fab fa-google" style="color:#db4437; font-size:18px;"></i>Google
              </button>
            </div>

            <!-- Dòng chữ dưới -->
            <p style="color:grey; text-align:center; margin:15px;">
              Bạn mới biết đến Shopee?
              <a href="dangKy.php" style="color:red;">Đăng ký</a>
            </p>
          </form>
        </div>
      </div>

    </div>
  </div>

  <!-- JS toggle password -->
  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const passwordInput = document.querySelector('#passwordInput');
    togglePassword.addEventListener('click', function () {
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  </script>

  <?php include 'footer.php'; ?>

</body>
</html>