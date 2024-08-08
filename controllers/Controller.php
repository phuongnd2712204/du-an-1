<?php
function getControllers(){
    $view = 'home';

    $postTopView = postTopViewOnHome();
    $postTop6latest = postTop6latestOnHome($postTopView['p_id']);
    $postTop6latest = array_chunk($postTop6latest, 3);
    //
    $postTop5Trending = postTop5TrendingLatest($postTopView['p_id']);
    // debug($postTop5Trending);


   require_once PATH_VIEW . 'layouts/master.php';
}
// luồng MVC 1
// Vào index được điều hướng đến hàm xử lý logic trong controller tương ứng
// Hàm sẽ trả về view luôn vì không có tương tác với model.

// luồng MVC 1
// Vào index được điều hướng đến hàm xử lý logic trong controller tương ứng
// Hàm sẽ tương tác với hàm xử lý dữ liệu trong model.
// Dữ liệu này sẽ được trả về view
?>