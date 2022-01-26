<?php
include "config.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body class="container">
    <?php 
        $pdostatement = $pdo->prepare("SELECT * FROM todo ORDER BY id DESC");
        $pdostatement->execute();
        $result = $pdostatement->fetchAll();
        $i=1;
    ?>
    <div class="card mt-4">
        <div class="card-body">
            <h1 class="text-primary">Todo Home Page</h1>
            <a href="add.php" class="btn btn-primary my-2">Create New</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Title</td>
                        <td>Description</td>
                        <td>Created</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($result as $value): ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $value['title'] ?></td>
                            <td><?= $value['description'] ?></td>
                            <td><?= date('Y-m-d',strtotime($value['created_at'])) ?></td>
                            <td>
                                <a href="edit.php?id=<?= $value['id'] ?>" class="btn btn-success btn-sm btn-pill">Edit</a>
                                <a href="delete.php?id=<?= $value['id'] ?>" class="btn btn-danger btn-sm btn-pill">Delete</a>
                            </td>
                        </tr>
                    <?php $i++; endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>