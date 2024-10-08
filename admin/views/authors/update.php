<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"> Update <?= $title ?>
    </h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Update
            </h6>
        </div>
        <div class="card-body">
            <?php if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success">
                    <p> <?= $_SESSION['success']?></p>
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
                        <div class="form-group">
                            <label for="name" class="form-lable">Name:</label>
                            <input type="text" value="<?= $author['name'] ?>" class="form-control" id="name" placeholder="Enter name" name="name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="avatar" class="form-lable">avatar:</label>
                            <input type="file" class="form-control" id="avatar" name="avatar" >
                            <img src="<?= BASE_URL . $author['avatar'] ?>" alt="" width="100px">
                        </div>
                    </div>
                </div>
              



                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-info" href="<?= BASE_URL_ADMIN ?>?act=authors">Back to list</a>
            </form>


        </div>
    </div>
</div>