<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Read More</title>
</head>
<style>
    .container{
        background: #f5f5f5;
    }
</style>
<body>
    <div class="container">
     <div class="header d-flex justify-content-between my-4 p-5">
                <h1>Book Details</h1>
                <a href="index.php" class="btn btn-primary btn-lg">Back</a>
        </div><br>
        <?php 
        include "database.php";
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "SELECT * FROM books WHERE id=$id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            ?>
            <h1>Title:</h1>
            <p><?php echo $row["title"]; ?></p>
            <h1>Author:</h1>
            <p><?php echo $row["author"]; ?></p>
            <h1>Type:</h1>
            <p><?php echo $row["type"]; ?></p>
            <h1>Description:</h1>
            <p><?php echo $row["description"]; ?></p>
            <?php
           }
           ?>
        </div>
</body>
</html>