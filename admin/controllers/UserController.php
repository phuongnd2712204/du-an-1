<?php
function userListAll()
{
    $title  = 'Danh sách user';
    $view = 'users/index';
    $script = 'datatable';
    $script2 = 'users/script';
    $style = 'datatable';

    $users = listAll('users');
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function userShowOne($id)
{
    $user = showOne('users', $id);
    if (empty($user)) {
        e404();
    }
    $title  = 'Chi tiết user: ' . $user['name'];
    $view = 'users/show';
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function userCreate()
{

    $title  = 'Danh sách user';
    $view = 'users/create';

    if (!empty($_POST)) {

        $data = [
            "name" => $_POST['name']  ?? null,
            "email" => $_POST['email'] ?? null,
            "password" => $_POST['password'] ?? null,
            "type" => $_POST['type'] ?? null,
        ];

        $errors = validateUserCreate($data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;

            header('Location: ' . BASE_URL_ADMIN . '?act=user-create');
            exit();
        }
            insert('users', $data);
        $_SESSION['success'] = 'Thao tác thành công';

        header('Location: ' . BASE_URL_ADMIN . '?act=users');
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

 function  validateUserCreate($data){
    $errors = [];
    //name
    if(empty($data['name'])){
        $errors[] = 'Name là bắt buộc nhập';
    }else if(strlen($data['name']) > 50){
        $errors[] = 'Name tối đa 50 ký tự';
    }

    //email
    if(empty($data['email'])){
        $errors[] = 'Email là bắt buộc nhập';
    }else if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
        $errors[] = 'Email khoong đúng định dạng';
    }
    else if(!checkUniqueEmail('users', $data['email'])){
        $errors[] = 'Email đã được sử dụng';
    }
    //password
    if(empty($data['password'])){
        $errors[] = 'password là bắt buộc nhập';
    }else if(strlen($data['password']) < 8 || strlen($data['password']) > 20){
        $errors[] = 'password tối đa 20 ký tự và nhỏ nhất là 8';
    }
    // //typr
    // if($data['type'] === null){
    //     $errors[] = 'type là bắt buộc nhập';
    // }
    // else if(!in_array($data['type'],[0,1])){
    //     $errors[] = 'type tối đa 20 ký tự và nhỏ nhất là 8';
    // }
    return $errors;
 }

function userUpdate($id)
{
    $user = showOne('users', $id);
    if (empty($user)) {
        e404();
    }

    $title  = 'cập nhật user' . $user['name'];
    $view = 'users/update';

    if (!empty($_POST)) {

        $data = [
            "name" => $_POST['name']  ?? $user['name'],
            "email" => $_POST['email'] ?? $user['email'],
            "password" => $_POST['password'] ?? $user['password'],
            "type" => $_POST['type'] ?? $user['type'],
        ];

        $errors = validateUserUpdate($id,$data);
        
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;

        }else{
            update('users', $id, $data);
            $_SESSION['success'] = 'Thao tác thành công';
        }
        

        

        header('Location: ' . BASE_URL_ADMIN . '?act=user-update&id=' . $id);
        exit();
    }


    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}


function  validateUserUpdate($id, $data){
    $errors = [];
    //name
    if(empty($data['name'])){
        $errors[] = 'Name là bắt buộc nhập';
    }else if(strlen($data['name']) > 50){
        $errors[] = 'Name tối đa 50 ký tự';
    }

    //email
    if(empty($data['email'])){
        $errors[] = 'Email là bắt buộc nhập';
    }else if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
        $errors[] = 'Email khoong đúng định dạng';
    }
    else if(!checkUniqueEmailForUpdate('users',$id, $data['email'])){
        $errors[] = 'Email đã được sử dụng';
    }
    //password
    if(empty($data['password'])){
        $errors[] = 'password là bắt buộc nhập';
    }else if(strlen($data['password']) < 8 || strlen($data['password']) > 20){
        $errors[] = 'password tối đa 20 ký tự và nhỏ nhất là 8';
    }
    // //typr
    // if($data['type'] === null){
    //     $errors[] = 'type là bắt buộc nhập';
    // }
    // else if(!in_array($data['type'],[0,1])){
    //     $errors[] = 'type tối đa 20 ký tự và nhỏ nhất là 8';
    // }
    return $errors;
 }

function userDelete($id)
{
    delete2('users', $id);
    $_SESSION['success'] = 'Thao tác thành công';

    header('Location: ' . BASE_URL_ADMIN . '?act=users');
    exit();
}
