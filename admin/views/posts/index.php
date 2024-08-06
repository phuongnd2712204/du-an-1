<!DOCTYPE html>
<html>

<head>
  <title>post Management</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
      <a href="<?= BASE_URL_ADMIN ?>?act=post-create" class="btn btn-info btn-sm">
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
                <th>title</th>
                <th>excerpt</th>
                <th>category</th>
                <th> author</th>
                <th>img_thumnail</th>
                <th>img_cover</th>
                <th>status</th>
                <th>is_trending</th>
                <th>created_at</th>
                <th>undated_at</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
              <th>ID</th>
                <th>title</th>
                <th>excerpt</th>
                <th>category</th>
                <th> author</th>
                <th>img_thumnail</th>
                <th>img_cover</th>
                <th>status</th>
                <th>is_trending</th>
                <th>created_at</th>
                <th>undated_at</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              <?php foreach ($posts as $post) : ?>
                <tr>
                  <td><?= $post['p_id'] ?></td>
                  <td><?= $post['p_title'] ?></td>
                  <td><?= $post['p_excerpt'] ?></td>
                  <td><?= $post['c_name'] ?></td>
                  <td>
                    <div style="display: flex">
                      <img src="<?= $post['avatar']?>" alt="" width="100px">
                      <p><?= $post['au_name']?></p>
                    </div>
                  </td>
                  <td>
                  <img src="<?= BASE_URL . $post['p_img_thumbnail']?>" width="100px" alt="">

                  </td>
                  <td>
                    <img src="<?= BASE_URL . $post['p_img_cover']?>" width="100px" alt="">
                  </td>
                  <td><?= $post['p_status']?></td>
                  
                  
                  <td>
                    <?= $post['p_is_trending'] ? '<span class="badge badge-success">Yes</span>'
                    : '<span class="badge badge-warning">no</span>' ?>
                  </td>
                  <td><?= $post['p_created_at']?></td>
                  <td><?= $post['p_undated_at']?></td>
                  <td>
                    <img src="<?= BASE_URL . $post['avatar'] ?>" alt="" width="100px">
                  </td>
                  <td>
                    <a href="<?= BASE_URL_ADMIN ?>?act=post-detail&id=<?= $post['p_id'] ?>" class="btn btn-info btn-sm btn-action">
                      <i class="fas fa-eye">Show</i>
                    </a>
                    <a href="<?= BASE_URL_ADMIN ?>?act=post-update&id=<?= $post['p_id'] ?>" class="btn btn-warning btn-sm btn-action">
                      <i class="fas fa-edit">Edit</i>
                    </a>
                    <a href="<?= BASE_URL_ADMIN ?>?act=post-delete&id=<?= $post['p_id'] ?>" class="btn btn-danger btn-sm btn-action" onclick="return confirm('Are you sure you want to delete this post?')">
                      <i class="fas fa-trash">DELETE</i>
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