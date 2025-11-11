<?php
    //Khai báo sử dụng session
    session_start();
    //Khai báo utf-8 để hiển thị được tiếng việt
    header('Content-Type: text/html; charset=UTF-8');
    //Kết nối tới database
    include('ketnoi.php');

    $tendangnhap = $_POST['tendangnhap'];
    $sodienthoai = $_POST['sodienthoai'];
    $matkhau = $_POST['matkhau'];

    if (!$tendangnhap || !$matkhau || !$matkhau) {
        echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    //Kiểm tra tên đăng nhập có tồn tại không
    $sql = "SELECT tendangnhap FROM khachhang WHERE tendangnhap='$tendangnhap'";
    $ketqua = mysqli_query($connect, $sql);
    if (mysqli_num_rows($ketqua) > 0) {
        echo "Tên đăng nhập này đã tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    
    $sql_2 = "INSERT INTO khachhang(tendangnhap, matkhau, sodienthoai) VALUES ('$tendangnhap', '$matkhau', '$sodienthoai')";
    $ketqua_2 = mysqli_query($connect, $sql_2);


    echo "<script>";
        if($ketqua){
            echo "alert('Đăng ký thành công');";
        }else{
            echo "alert('Đăng ký thất bại');";
        }
        echo "window.location = 'dangNhap.php';";
    echo "</script>";
?>