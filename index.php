<?php

require_once 'commons/env.php';
require_once 'commons/helper.php';
require_once 'commons/connect-db.php';
require_once 'commons/model.php';


require_file(PATH_CONTROLLER);
require_file(PATH_MODEL);


// Điều hướng
$act = $_GET['act'] ?? '/';
// debug($act);
match($act){
    '/' => getControllers(),
    'user-detail' => userDetail($_GET['id']),
};
//...



require_once 'commons/disconnect-db.php'
?>