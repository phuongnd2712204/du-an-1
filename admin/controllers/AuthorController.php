        <?php
        function authorListAll()
        {
            $title  = 'Danh sách author';
            $view = 'authors/index';
            $script = 'datatable';
            $script2 = 'authors/script';
            $style = 'datatable';

            $authors = listAll('authors');
            require_once PATH_VIEW_ADMIN . 'layouts/master.php';
        }

        function authorShowOne($id)
        {
            $author = showOne('authors', $id);
            if (empty($author)) {
                e404();
            }
            $title  = 'Chi tiết author: ' . $author['name'];
            $view = 'authors/show';
            require_once PATH_VIEW_ADMIN . 'layouts/master.php';
        }
        function authorCreate()
        {

            $title  = 'Danh sách author';
            $view = 'authors/create';

            if (!empty($_POST)) {

                $data = [
                    "name" => $_POST['name']  ?? null,
                    'avatar' => $_FILES['avatar'] ?? null
                ];

                $errors = validateAuthorCreate($data);
                if (!empty($errors)) {
                    $_SESSION['errors'] = $errors;
                    $_SESSION['data'] = $data;

                    header('Location: ' . BASE_URL_ADMIN . '?act=author-create');
                    exit();
                }

                $avatar = $_FILES['avatar'] ?? null;
                if (!empty($avatar)) {
                    $data['avatar'] = upload_file($avatar, 'uploads/authurs/');
                }


                insert('authors', $data);
                $_SESSION['success'] = 'Thao tác thành công';

                header('Location: ' . BASE_URL_ADMIN . '?act=authors');
                exit();
            }
            require_once PATH_VIEW_ADMIN . 'layouts/master.php';
        }

        function  validateAuthorCreate($data)
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

        function authorUpdate($id)
        {
            $author = showOne('authors', $id);
            if (empty($author)) {
                e404();
            }

            $title  = 'cập nhật author' . $author['name'];
            $view = 'authors/update';

            if (!empty($_POST)) {

                $data = [
                    "name" => $_POST['name']  ?? null,
                    'avatar' => $_FILES['avatar'] ?? null

                ];
                $errors = validateAuthorUpdate($id, $data);
                if (!empty($errors)) {
                    $_SESSION['errors'] = $errors;
                    $_SESSION['data'] = $data;
                } else {
                    $avatar = $_FILES['avatar'] ?? null;
                    if (!empty($avatar)) {
                        $data['avatar'] = upload_file($avatar, 'uploads/authurs/');
                    }
                    update('authors', $id, $data);
                    if (
                        !empty($avatar) // có update file
                        && !empty($author['avatar']) //có giá trị
                        && !empty($data['avatar']) // upload file thành công
                        && file_exists(PATH_UPLOAD . $author['avatar']) //còn tồn tại trên hệ thống
                    ) {
                        unlink(PATH_UPLOAD . $author['avatar']); //xóa file 
                    }
                    $_SESSION['success'] = 'Thao tác thành công';
                }

                header('Location: ' . BASE_URL_ADMIN . '?act=author-update&id=' . $id);
                exit();
            }


            require_once PATH_VIEW_ADMIN . 'layouts/master.php';
        }


        function  validateAuthorUpdate($id, $data)
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

        function authorDelete($id)
        {
            $author = showOne('authors', $id);
            if (empty($author)) {
                e404();
            }
            delete2('authors', $id);
            if (
                !empty($author['avatar']) //có giá trị
                && file_exists(PATH_UPLOAD . $author['avatar']) //còn tồn tại trên hệ thống
            ) {
                unlink(PATH_UPLOAD . $author['avatar']); //xóa file 
            }

            
            $_SESSION['success'] = 'Thao tác thành công';

            header('Location: ' . BASE_URL_ADMIN . '?act=authors');
            exit();
        }
