<?php
    include('ketnoi.php');
    $makhachhang = $_POST['makhachhang'];
    $tendangnhap = $_POST['tendangnhap'];
    $sodienthoai = $_POST['sodienthoai'];
    $matkhau = $_POST['matkhau'];

    $sql="UPDATE khachhang SET tendangnhap='$tendangnhap', sodienthoai='$sodienthoai', matkhau='$matkhau' WHERE makhachhang='$makhachhang'";
    echo $sql;
    $ketqua = mysqli_query($connect, $sql);
    echo "<script>";
        if($ketqua){
            echo "alert('Cập nhật thông tin thành công');";
        }else{
            echo "alert('Cập nhật thông tin thất bại');";
        }
        echo "window.location = 'thongTinKhachHang.php';";
    echo "</script>";
?>