<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                View detail
            </h6>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Trường dữ liệu</th>
                    <th>Dữ liệu</th>

                </tr>
                <?php foreach ($tag as $fieldName => $value) : ?>
                    <tr>
                        <td> <?= ucfirst($fieldName) ?></td>

                    </tr>
                <?php endforeach; ?>
            </table>
            <a class="btn btn-info"href="<?=  BASE_URL_ADMIN ?>?act=tags">Back to list</a>

        </div>
    </div>
</div>