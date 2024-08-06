<?php
        function postListAll()
        {
            $title  = 'Danh sách post';
            $view = 'posts/index';
            $script = 'datatable';
            $script2 = 'posts/script';
            $style = 'datatable';

            $posts = listAllForPost();
            require_once PATH_VIEW_ADMIN . 'layouts/master.php';
        }

        function postShowOne($id)
        {
            $post = showOneForPost($id);
            if (empty($post)) {
                e404();
            }
            $title  = 'Chi tiết post: ' . $post['name'];
            $view = 'posts/show';

            $tags = getTagsForPost($id);

            require_once PATH_VIEW_ADMIN . 'layouts/master.php';
        }

        function postCreate()
        {

            $title  = 'Danh sách post';
            $view = 'posts/create';

            if (!empty($_POST)) {

                $data = [
                    "name" => $_POST['name']  ?? null,
                    'avatar' => $_FILES['avatar'] ?? null
                ];

                $errors = validatepostCreate($data);
                if (!empty($errors)) {
                    $_SESSION['errors'] = $errors;
                    $_SESSION['data'] = $data;

                    header('Location: ' . BASE_URL_ADMIN . '?act=post-create');
                    exit();
                }

                $avatar = $_FILES['avatar'] ?? null;
                if (!empty($avatar)) {
                    $data['avatar'] = upload_file($avatar, 'uploads/authurs/');
                }


                insert('posts', $data);
                $_SESSION['success'] = 'Thao tác thành công';

                header('Location: ' . BASE_URL_ADMIN . '?act=posts');
                exit();
            }
            require_once PATH_VIEW_ADMIN . 'layouts/master.php';
        }

        function  validatepostCreate($data)
        {
            $errors = [];
            //name
            if (empty($data['name'])) {
                $errors[] = 'Name là bắt buộc nhập';
            } else if (strlen($data['name']) > 50) {
                $errors[] = 'Name tối đa 50 ký tự';
            } else if (!checkUniqueName('categories', $data['name'])) {
                $errors[] = 'Name đã được sử dụng';
            }

            $typeImage = ['image/png', 'image/jpg', 'image/jpeg'];
            if (empty($data['avatar']['size'] < 2 * 1024 * 1024)) {
                $errors[] = 'Trường avatar có dung lượng nhỏ hơn 2M';
            } else if (!in_array($data['avatar']['type'], $typeImage)) {
                $errors[] = 'Trường avatar chỉ chấp nhận định dạng file: png, jpg, jpeg';
            }


            return $errors;
        }

        function postUpdate($id)
        {
            $post = showOne('posts', $id);
            if (empty($post)) {
                e404();
            }

            $title  = 'cập nhật post' . $post['name'];
            $view = 'posts/update';

            if (!empty($_POST)) {

                $data = [
                    "name" => $_POST['name']  ?? null,
                    'avatar' => $_FILES['avatar'] ?? null

                ];
                $errors = validatepostUpdate($id, $data);
                if (!empty($errors)) {
                    $_SESSION['errors'] = $errors;
                    $_SESSION['data'] = $data;
                } else {
                    $avatar = $_FILES['avatar'] ?? null;
                    if (!empty($avatar)) {
                        $data['avatar'] = upload_file($avatar, 'uploads/authurs/');
                    }
                    update('posts', $id, $data);
                    if (
                        !empty($avatar) // có update file
                        && !empty($post['avatar']) //có giá trị
                        && !empty($data['avatar']) // upload file thành công
                        && file_exists(PATH_UPLOAD . $post['avatar']) //còn tồn tại trên hệ thống
                    ) {
                        unlink(PATH_UPLOAD . $post['avatar']); //xóa file 
                    }
                    $_SESSION['success'] = 'Thao tác thành công';
                }

                header('Location: ' . BASE_URL_ADMIN . '?act=post-update&id=' . $id);
                exit();
            }


            require_once PATH_VIEW_ADMIN . 'layouts/master.php';
        }


        function  validatepostUpdate($id, $data)
        {
            $errors = [];
            //name
            if (empty($data['name'])) {
                $errors[] = 'Name là bắt buộc nhập';
            } else if (strlen($data['name']) > 50) {
                $errors[] = 'Name tối đa 50 ký tự';
            } else if (!checkUniqueNameForUpdate('categories', $id, $data['name'])) {
                $errors[] = 'Name đã được sử dụng';
            }

            $typeImage = ['image/png', 'image/jpg', 'image/jpeg'];
            if (empty($data['avatar']['size'] < 2 * 1024 * 1024)) {
                $errors[] = 'Trường avatar có dung lượng nhỏ hơn 2M';
            } else if (!in_array($data['avatar']['type'], $typeImage)) {
                $errors[] = 'Trường avatar chỉ chấp nhận định dạng file: png, jpg, jpeg';
            }

            return $errors;
        }

        function postDelete($id)
        {
            $post = showOne('posts', $id);
            if (empty($post)) {
                e404();
            }
            delete2('posts', $id);
            if (
                !empty($post['avatar']) //có giá trị
                && file_exists(PATH_UPLOAD . $post['avatar']) //còn tồn tại trên hệ thống
            ) {
                unlink(PATH_UPLOAD . $post['avatar']); //xóa file 
            }

            
            $_SESSION['success'] = 'Thao tác thành công';

            header('Location: ' . BASE_URL_ADMIN . '?act=posts');
            exit();
        }
