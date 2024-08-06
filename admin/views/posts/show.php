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
                <?php foreach ($post as $fieldName => $value) : ?>
                    <tr>
                        <td> <?= ucfirst($fieldName) ?></td>
                        <td> 
                            <?php
                                switch ($fieldName){
                                    case 'p_img_thumbnail':
                                    case 'p_img_cover':
                                    case 'au_avatar':
                                        echo '<img src="'. BASE_URL . $value . '" alt="Image" width="100" height="100">';
                                        break;
                                    default:
                                    echo $value;
                                    break;
                                }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>

                <tr>
                    <td>Tags</td>
                    <td>
                        <?php foreach ($tags as $tag) : ?>
                            <span class="badge badge-info"><?= $tag['t_name']?></span>
                    <?php endforeach; ?>
                        </td>
                </tr>
            </table>
            <a class="btn btn-info"href="<?=  BASE_URL_ADMIN ?>?act=posts">Back to list</a>

        </div>
    </div>
</div>