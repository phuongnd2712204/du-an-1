<?php
function categoryListAll()
{
    $title  = 'Danh sách category';
    $view = 'categories/index';
    $script = 'datatable';
    $script2 = 'categories/script';
    $style = 'datatable';

    $categories = listAll('categories');
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function categoryShowOne($id)
{
    $category = showOne('categories', $id);
    if (empty($category)) {
        e404();
    }
    $title  = 'Chi tiết category: ' . $category['name'];
    $view = 'categories/show';
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function categoryCreate()
{

    $title  = 'Danh sách category';
    $view = 'categories/create';

    if (!empty($_POST)) {

        $data = [
            "name" => $_POST['name']  ?? null,
        ];

        $errors = validateCategoryCreate($data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;

            header('Location: ' . BASE_URL_ADMIN . '?act=category-create');
            exit();
        }
            insert('categories', $data);
        $_SESSION['success'] = 'Thao tác thành công';

        header('Location: ' . BASE_URL_ADMIN . '?act=categories');
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

 function  validateCategoryCreate($data){
    $errors = [];
    //name
    if(empty($data['name'])){
        $errors[] = 'Name là bắt buộc nhập';
    }else if(strlen($data['name']) > 50){
        $errors[] = 'Name tối đa 50 ký tự';
    }else if(!checkUniqueName('categories', $data['name'])){
        $errors[] = 'Name đã được sử dụng';
    }

   
    return $errors;
 }

function categoryUpdate($id)
{
    $category = showOne('categories', $id);
    if (empty($category)) {
        e404();
    }

    $title  = 'cập nhật category' . $category['name'];
    $view = 'categories/update';

    if (!empty($_POST)) {

        $data = [
            "name" => $_POST['name']  ?? $category['name'],
        ];

        $errors = validateCategoryUpdate($id,$data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;

        }else{
            update('categories', $id, $data);
            $_SESSION['success'] = 'Thao tác thành công';
        }
        

        

        header('Location: ' . BASE_URL_ADMIN . '?act=category-update&id=' . $id);
        exit();
    }


    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}


function  validateCategoryUpdate($id, $data){
    $errors = [];
    //name
    if(empty($data['name'])){
        $errors[] = 'Name là bắt buộc nhập';
    }else if(strlen($data['name']) > 50){
        $errors[] = 'Name tối đa 50 ký tự';
    }
    else if(!checkUniqueNameForUpdate('categories',$id, $data['name'])){
        $errors[] = 'Name đã được sử dụng';
    }

    
    return $errors;
 }

function categoryDelete($id)
{
    delete2('categories', $id);
    $_SESSION['success'] = 'Thao tác thành công';

    header('Location: ' . BASE_URL_ADMIN . '?act=categories');
    exit();
}
