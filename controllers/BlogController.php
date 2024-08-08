<?php
 function blogDetail($id){

   $view  = 'post-detail';
   $post = getPostByID( $id);
   // debug($post);
   $postTop6Latest = postTop6latestOnDetail($id);
   $postTop6Trending = postTop6TrendingOnDetail($id);

    require_once PATH_VIEW. 'layouts/master.php';
 }

 function blogListByDanhMucID($id){

    
    require_once PATH_VIEW. 'layouts/master.php';
 }