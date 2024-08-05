<?php
function getControllers(){
    $users = getAllUser();
   require_once PATH_VIEW . 'home.php';
}
// luồng MVC 1
// Vào index được điều hướng đến hàm xử lý logic trong controller tương ứng
// Hàm sẽ trả về view luôn vì không có tương tác với model.

// luồng MVC 1
// Vào index được điều hướng đến hàm xử lý logic trong controller tương ứng
// Hàm sẽ tương tác với hàm xử lý dữ liệu trong model.
// Dữ liệu này sẽ được trả về view
?>