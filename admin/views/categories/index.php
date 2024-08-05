<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">
    <?= $title ?>
    <a class="btn btn-info" href="<?= BASE_URL_ADMIN ?>?act=category-create">Create</a>
  </h1>


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
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>NAME</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>NAME</th>
             
            </tr>
          </tfoot>

          <tbody>
            <?php foreach ($categories as $category) : ?>
              <tr>
                <td><?= $category['id'] ?></td>
                <td><?= $category['name'] ?></td>
                
                  <a class="btn btn-info" href="<?= BASE_URL_ADMIN ?>?act=category-detail&id=<?= $category['id'] ?>">Show</a>
                  <a class="btn btn-warning" href="<?= BASE_URL_ADMIN ?>?act=category-update&id=<?= $category['id'] ?>">Update</a>
                  <a class="btn btn-danger" href="<?= BASE_URL_ADMIN ?>?act=category-delete&id=<?= $category['id'] ?>" onclick="confirm('are you sure delete')">Delete</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>