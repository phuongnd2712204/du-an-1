<?php

require_once 'commons/env.php';
require_once 'commons/helper.php';
require_once 'commons/connect-db.php';
require_once 'commons/model.php';


//lấy dữ liệu global setttings

$settings = settings();
// debug($settings);

require_file(PATH_CONTROLLER);
require_file(PATH_MODEL);


// Điều hướng
// debug($act);
$act = $_GET['act'] ?? '/';

switch ($act) {
    case '/':
        getControllers();
        break;
    case 'post':
        blogDetail($_GET['id']);
        break;
    case 'category':
        blogListByDanhMucID($_GET['id']);
        break;
    default:
        // Xử lý khi không hiển thị ra trang
        echo "Không tìm thấy trang";
        break;
}
//...



require_once 'commons/disconnect-db.php'
?>