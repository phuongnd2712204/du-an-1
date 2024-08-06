<!DOCTYPE html>
<html>
<head>
  <title>author Management</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
      <a href="<?= BASE_URL_ADMIN ?>?act=author-create" class="btn btn-info btn-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Create
      </a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
      </div>
      <div class="card-body">
        <?php if (isset($_SESSION['success'])) : ?>
          <div class="alert alert-success">
            <?= $_SESSION['success'] ?>
          </div>
          <?php unset($_SESSION['success']) ?>
        <?php endif; ?>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>Action</th>
                <th>Image</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>Action</th>
                <th>Image</th>
              </tr>
            </tfoot>
            <tbody>
              <?php foreach ($authors as $author) : ?>
                <tr>
                  <td><?= $author['id'] ?></td>
                  <td><?= $author['name'] ?></td>
                  <td>
                    <img src="<?= BASE_URL . $author['avatar'] ?>" alt="" width="100px">
                    </td>
                  <td>
                    <a href="<?= BASE_URL_ADMIN ?>?act=author-detail&id=<?= $author['id'] ?>" class="btn btn-info btn-sm btn-action">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a href="<?= BASE_URL_ADMIN ?>?act=author-update&id=<?= $author['id'] ?>" class="btn btn-warning btn-sm btn-action">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a href="<?= BASE_URL_ADMIN ?>?act=author-delete&id=<?= $author['id'] ?>" class="btn btn-danger btn-sm btn-action" onclick="return confirm('Are you sure you want to delete this author?')">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
 
</body>
</html>