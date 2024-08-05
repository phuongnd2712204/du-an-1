<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document:</title>
</head>
<body>
    <h2>Đây là trang chi tiết: <?= $user['name'] ?></h2>

    <table>
        <tr>
            <th>Tên trường</th>
            <th>Giá trị</th>
        </tr>
        <tr>
            <td>name</td>
            <td><?= $user['name'] ?></td>
        </tr>
        <tr>
            <td>email</td>
            <td><?= $user['email'] ?></td>
        </tr>
    </table>
    
</body>
</html>