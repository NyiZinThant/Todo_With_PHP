<?php
require "config.php";
if($_POST){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $id = $_POST['id'];

    $sql = "UPDATE todo SET title=:title, description=:description WHERE id=:id";
    $pdostatement = $pdo->prepare($sql);
    $result = $pdostatement->execute([
        ":title" => $title,
        ":description" => $description,
        ":id" => $id
    ]);
    if($result){
        echo "<script>alert('Updated');window.location.href='index.php';</script>";
    };
}else{
    $pdostatement = $pdo->prepare("SELECT * FROM todo WHERE id=:id");
    $pdostatement->execute([":id" => $_GET['id']]);
    $result = $pdostatement->fetchAll();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body class="container">
    <div class="card mt-4">
        <div class="card-body">
            <h1 class="text-primary">Edit</h1>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $result[0]["id"] ?>">
                <label>Title</label>
                <input type="text" class="form-control mb-3" name="title" value="<?= $result[0]['title'] ?>" required>
                <label>Description</label>
                <textarea name="description" class="form-control mb-3" cols="80" rows="8" required><?= $result[0]["description"] ?></textarea>
                <div class="mb-1">
                    <input type="submit" class="btn btn-primary" value="SUBMIT">
                    <a href="index.php" class="btn btn-warning">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>