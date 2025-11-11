<?php session_start(); 
 
    if (isset($_SESSION['tendangnhap'])){
        unset($_SESSION['tendangnhap']); // xóa session login
        unset($_SESSION['giohang']);
    }
    echo "<script>";
        echo "window.location = 'index.php';";
    echo "</script>";
?>