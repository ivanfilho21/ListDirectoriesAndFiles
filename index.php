<?php include 'config.php' ?>
<?php include 'read_path.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index of <?= ROOT.$path ?></title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <h1>Index of <?= ROOT.$path ?></h1>
    <hr>

    <?php
    $pathArray = explode('/', $path);
    array_shift($pathArray);
    array_pop($pathArray);
    $back = implode('/', $pathArray);
    ?>

    <?php if (! empty($path)): ?>
    <a class="icon back" href="<?= empty($back) ? 'index.php' : "?path=/$back" ?>">Back</a>
    <br><br>
    <?php endif ?>

    <table>
        <thead>
            <tr>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($folders as $folder): ?>
            <tr>
                <td class="icon folder">
                    <a href="?path=<?= $path.'/'.$folder ?>"><?= $folder ?></a>
                </td>
            </tr>
            <?php endforeach ?>

            <?php foreach ($files as $file): ?>
            <?php if (! empty($file['type'])): ?>
            <tr>
                <td class="icon <?= $file['type'] ?>">
                    <a href="view.php?content=<?= $path.'/'.$file['name'] ?>"><?= $file['name'] ?></a>
                </td>
            </tr>
            <?php endif ?>
            <?php endforeach ?>
        </tbody>
    </table>
    </body>
</html>