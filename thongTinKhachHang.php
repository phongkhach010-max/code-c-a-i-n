<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <title>Thông tin</title>
</head>

<body>
    <?php
        include('ketnoi.php');
        include('navBar.php');
        $tendangnhap = $_SESSION['tendangnhap'];
        $sql = "SELECT * FROM khachhang WHERE tendangnhap='$tendangnhap'";
        $ketqua = mysqli_query($connect, $sql);
        $row = mysqli_fetch_array($ketqua);

    ?>

    <div class="container-xl">
        <div class="h5 pb-2 mt-4 mb-4 border-bottom">
            <i class='bi bi-person-fill'></i>
            Thông tin 
        </div>
        
            <div class=" " style="width: 50%;">
                
                    <form class="user" action="xuLyCapNhatThongTin.php" method="POST">
                        <div class="mb-3 row">
                            <label for="" class="col col-form-label">Tên đăng nhập</label>
                            <div class="col">
                                <input type="text" class="form-control" id=""
                                    name="tendangnhap"
                                    value="<?php echo $row['tendangnhap']?>"
                                    
                                    >
                            </div>
                            <input type="hidden" class="form-control" id=""
                                    name="makhachhang"
                                    value="<?php echo $row['makhachhang']?>"
                                    
                                    >
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col col-form-label">Số điện thoại</label>
                            <div class="col">
                                <input type="text" class="form-control" id=""
                                    name="sodienthoai"
                                    value="<?php echo $row['sodienthoai']?>"
                                    >
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col col-form-label">Mật khẩu</label>
                            <div class="col">
                                <input type="text" class="form-control" id=""
                                    name="matkhau"
                                    value="<?php echo $row['matkhau']?>">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Cập nhật
                        </button>
                                                
                    </form>     
            </div>
    
    </div>


</body>

</html>