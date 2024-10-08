<?php
function tagListAll()
{
    $title  = 'Danh sách tag';
    $view = 'tags/index';
    $script = 'datatable';
    $script2 = 'tags/script';
    $style = 'datatable';

    $tags = listAll('tags');
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function tagShowOne($id)
{
    $tag = showOne('tags', $id);
    if (empty($tag)) {
        e404();
    }
    $title  = 'Chi tiết tag: ' . $tag['name'];
    $view = 'tags/show';
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function tagCreate()
{

    $title  = 'Danh sách tag';
    $view = 'tags/create';

    if (!empty($_POST)) {

        $data = [
            "name" => $_POST['name']  ?? null,
        ];

        $errors = validateTagCreate($data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;

            header('Location: ' . BASE_URL_ADMIN . '?act=tag-create');
            exit();
        }
            insert('tags', $data);
        $_SESSION['success'] = 'Thao tác thành công';

        header('Location: ' . BASE_URL_ADMIN . '?act=tags');
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

 function  validateTagCreate($data){
    $errors = [];
    //name
    if(empty($data['name'])){
        $errors[] = 'Name là bắt buộc nhập';
    }else if(strlen($data['name']) > 50){
        $errors[] = 'Name tối đa 50 ký tự';
    }
    else if(!checkUniqueName('categories',$data['name'])){
        $errors[] = 'Name đã được sử dụng';
    }

  
    return $errors;
 }

function tagUpdate($id)
{
    $tag = showOne('tags', $id);
    if (empty($tag)) {
        e404();
    }

    $title  = 'cập nhật tag' . $tag['name'];
    $view = 'tags/update';

    if (!empty($_POST)) {

        $data = [
            "name" => $_POST['name']  ?? $tag['name'],
           
        ];

        $errors = validateTagUpdate($id,$data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;

        }else{
            update('tags', $id, $data);
            $_SESSION['success'] = 'Thao tác thành công';
        }
        

        

        header('Location: ' . BASE_URL_ADMIN . '?act=tag-update&id=' . $id);
        exit();
    }


    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}


function  validateTagUpdate($id, $data){
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

function tagDelete($id)
{
    delete2('tags', $id);
    $_SESSION['success'] = 'Thao tác thành công';

    header('Location: ' . BASE_URL_ADMIN . '?act=tags');
    exit();
}
