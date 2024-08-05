<?php

session_start();

require_once '../commons/env.php';
require_once '../commons/helper.php';
require_once '../commons/connect-db.php';
require_once '../commons/model.php';


require_file(PATH_CONTROLLER_ADMIN);
require_file(PATH_MODEL_ADMIN);


// Điều hướng
$act = $_GET['act'] ?? '/';
// debug($act);
match($act){
    '/' => dashboard(),
    //CRUD user 
    'users' => userListAll(),
    'user-detail' => userShowOne($_GET['id']),
    'user-create' => userCreate(),
    'user-update' => userUpdate($_GET['id']),
    'user-delete' => userDelete($_GET['id']),

    //CRUD Category
    'categories' => categoryListAll(),
    'category-detail' => categoryShowOne($_GET['id']),
    'category-create' => categoryCreate(),
    'category-update' => categoryUpdate($_GET['id']),
    'category-delete' => categoryDelete($_GET['id']),

    //CRUD tag 
    'tags' => tagListAll(),
    'tag-detail' => tagShowOne($_GET['id']),
    'tag-create' => tagCreate(),
    'tag-update' => tagUpdate($_GET['id']),
    'tag-delete' => tagDelete($_GET['id']),
};
//...

echo "Đây là trang chủ";

require_once '../commons/disconnect-db.php'
?>