<?php
if (!function_exists('require_file')) {
    function require_file($pathFolder)
    {
        $files = scandir($pathFolder);

        $files = array_diff($files, ['.', '..']);

        foreach ($files as $file) {
            require_once $pathFolder . $file;
        }
    }
}
if (!function_exists('debug')) {

    function debug($data)
    {
        echo '<pre>';
        print_r($data);

        die;
    }
}

if (!function_exists('e404')) {
    function e404()
    {
        echo "404 - Not found";
        die;
    }
}


if (!function_exists('upload_file')) {
    function upload_file($file, $pathFolderUpload)
    {
            $imgPath = 'uploads/authurs/' . time() . '-' . basename($file['name']);

            if (move_uploaded_file($file['tmp_name'], PATH_UPLOAD . $imgPath)) {
                return $imgPath;
            }
            return null;
    
    }
}
