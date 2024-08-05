<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Đây là trang chủ</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>email</th>
            <th>action</th>
          
        </tr>
        
        <?php foreach ($users as $nguoiDung) : ?>
        <tr>
            <td><?= $nguoiDung['id']?></td>
            <td><?= $nguoiDung['name']?></td>
            <td><?= $nguoiDung['email']?></td>
            <td>
                <a href="<?= BASE_URL . '?act=user-detail&id=' . $nguoiDung['id']?>">Xem chi tiết</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    

</body>
</html>