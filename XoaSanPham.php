<?php
session_start();

if (isset($_GET['id'])) {
    $MA_SP = (int)$_GET['id'];
    if (isset($_SESSION['giohang'][$MA_SP])) {
        unset($_SESSION['giohang'][$MA_SP]);
    }
}

header("Location: gioHang.php");
exit;
?>