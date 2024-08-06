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
                     <?= $_SESSION['success']?>
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
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-lable">Name:</label>
                            <input type="text" class="form-control" id="name" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['name'] : null ?>" placeholder="Enter name" name="name">
                        </div>
                        
                    </div>
                </div>
                




                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-info" href="<?= BASE_URL_ADMIN ?>?act=tags">Back to list</a>
            </form>


        </div>
    </div>
</div>
<?php
if (isset($_SESSION['data'])) unset($_SESSION['data']);
?>