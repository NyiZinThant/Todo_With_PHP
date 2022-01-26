<?php
require 'config.php';
if($_POST){
    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = "INSERT todo(title,description) VALUES (:title,:description)";
    $pdostatement = $pdo->prepare($sql);
    $result = $pdostatement->execute([
        ":title" => $title,
        ":description" => $description
    ]);
    if($result){
        echo "<script>alert('New Todo Is Added');window.location.href='index.php';</script>";
    };
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body class="container">
    <div class="card mt-4">
        <div class="card-body">
            <h1 class="text-primary">Create New Todo</h1>
            <form action="add.php" method="post">
                <label>Title</label>
                <input type="text" class="form-control mb-3" name="title" required>
                <label>Description</label>
                <textarea name="description" class="form-control mb-3" cols="80" rows="8" required></textarea>
                <div class="mb-1">
                    <input type="submit" class="btn btn-primary" value="SUBMIT">
                    <a href="index.php" class="btn btn-warning">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>