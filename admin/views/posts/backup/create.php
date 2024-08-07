<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                DataTables Example
            </h6>
        </div>
        <div class="card-body">
            <?php if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success">
                    <?= $_SESSION['success'] ?>
                </div>
                <?php unset($_SESSION['success']) ?>
            <?php endif; ?>
            <?php if (isset($_SESSION['errors'])) : ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($_SESSION['errors'] as $error) : ?>
                            <li> <?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php unset($_SESSION['errors']) ?>
            <?php endif; ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="title" class="form-lable">title:</label>
                            <input type="text" class="form-control" id="title" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['title'] : null ?>" placeholder="Enter name" name="title">
                        </div>

                        <div class="mb-3 mt-3>
                            <div class="mb-3 mt-3">
                                <label for="excerpt" class="form-lable">Excerpt:</label>
                                <textarea class="form-control" id="excerpt" rows="7" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['excerpt'] : null ?>" placeholder="Enter excerpt" name="excerpt"></textarea>
                            </div>
                        </div>
                        <div class="mb-3 mt-3>
                            <div class="mb-3 mt-3">
                                <label for="img_thumbnail" class="form-lable">img_thumbnail:</label>
                                <input type="file" class="form-control" id="img_thumbnail" name="img_thumbnail">
                            </div>
                        </div>
                        <div class="mb-3 mt-3>
                            <div class="mb-3 mt-3">
                                <label for="img_cover" class="form-lable">img_cover:</label>
                                <input type="file" class="form-control" id="img_cover" name="img_cover">
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="category_id" class="form-lable">category:</label>
                            <select class="form-control" id="category_id" name="category_id">
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?= $category['id'] ?>"> <?= $category['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="author_id" class="form-lable">author:</label>
                            <select class="form-control" id="author_id" name="author_id">
                                <?php foreach ($authors as $author) : ?>
                                    <option value="<?= $author['id'] ?>"> <?= $author['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="tags" class="form-label">Tags:</label>
                            <select class="form-control" id="tags" name="tags[]" multiple>
                                <?php foreach ($tags as $tag) : ?>
                                    <option value="<?= $tag['id'] ?>"><?= $tag['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="status" class="form-label">Status:</label>
                            <select class="form-control" id="status" name="status">
                                <option value="<?= STATUS_DRAFT ?>"><?= ucfirst(STATUS_DRAFT) ?></option>
                                <option value="<?= STATUS_PUBLISHED ?>"><?= ucfirst(STATUS_PUBLISHED) ?></option>
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="is_trending" class="form-label">Is_Trending:</label>
                            <select class="form-control" id="is_trending" name="is_trending">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3 mt-3">
                            <label for="content" class="form-label">Content:</label>
                            <textarea id="content" name="content"><?= isset($_SESSION['data']) ? $_SESSION['data']['content'] : null ?></textarea>
                        </div>
                    </div>


                </div>



                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-info" href="<?= BASE_URL_ADMIN ?>?act=authors">Back to list</a>
            </form>


        </div>
    </div>
</div>
<?php
if (isset($_SESSION['data'])) unset($_SESSION['data']);
?>