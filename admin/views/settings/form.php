<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Save
            </h6>
        </div>
        <div class="card-body">
            <form action="<?= BASE_URL_ADMIN . '?act=setting-save' ?>" method="POST">
                <table class="table">
                    <tr>
                        <th>Trường dữ liệu</th>
                        <th>Dữ liệu</th>
                    </tr>

                    <tr>
                        <td>Logo</td>
                        <td>
                            <input type="text" class="form-control" name="logo" value="<?= $settings['logo'] ?? null ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Overview</td>
                        <td>
                            <textarea type="text" class="form-control" name="overview"><?= $settings['overview'] ?? null ?></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td>Link Facebook</td>
                        <td>
                            <input type="text" class="form-control" name="link_facebook" value="<?= $settings['link_facebook'] ?? null ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Link Twitter</td>
                        <td>
                            <input type="text" class="form-control" name="link_twitter" value="<?= $settings['link_twitter'] ?? null ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Link Instagram</td>
                        <td>
                            <input type="text" class="form-control" name="link_instagram" value="<?= $settings['link_instagram'] ?? null ?>">
                        </td>
                    </tr>
                  
                </table>
                <button type="submit" class="btn btn-success">Save</button>

                <a href="<?= BASE_URL_ADMIN ?>?act=posts" class="btn btn-danger">Back to list</a>

            </form>
        </div>
    </div>
</div>