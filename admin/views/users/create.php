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
                        <div class="form-group">
                            <label for="email" class="form-lable">Email:</label>
                            <input type="email" class="form-control" id="email" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['email'] : null ?>" placeholder="Enter email" name="email">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="form-lable">Password: </label>
                            <input type="password" class="form-control" id="password" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['password'] : null ?>" placeholder="Enter email" name="password">
                        </div>
                        <div>
                            <label for="type" class="form-lable">Type: </label>
                            <select name="type" id="type" class="form-control">
                                <option value="1">
                                    Admin
                                </option>
                                <option value="0">
                                    Menber
                                </option>
                            </select>
                        </div>
                    </div>
                </div>




                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-info" href="<?= BASE_URL_ADMIN ?>?act=users">Back to list</a>
            </form>


        </div>
    </div>
</div>
<?php
if (isset($_SESSION['data'])) unset($_SESSION['data']);
?>