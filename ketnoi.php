<?php
    $server   = "localhost";   
    $username = "root"; 
    $password = "";      
    $dbname   = "tmdt";    
    
    // Kết nối database
    $connect = mysqli_connect($server, $username, $password, $dbname);
    
    //Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
    if (!$connect) {
        exit('Kết nối không thành công!');
    }
    
?>