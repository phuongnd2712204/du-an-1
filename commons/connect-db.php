<?php
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;
    
    try {
      $conn = new PDO("mysql:host=$host;port=$port; dbname=$dbname", DB_USERNAME,  DB_PASSWORD);
        //Cài đặt chế độ báo lỗi
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Chế độ trả dữ liệu
      $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
      debug("Connection faied: " . $e->getMessage());
    }

?>