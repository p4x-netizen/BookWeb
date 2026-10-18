<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Add Book</title>
</head>
<body>
    <div class="container">
        <?php 
        include "database.php";
        $id = $_GET['id'];
        if(isset($_GET['id'])){
        $sql = "SELECT * FROM books WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        
            ?>
             <form action="process.php" method="post">
            <div class="header d-flex justify-content-between my-4">
                <h1>Edit Book</h1>
                <a href="index.php" class="btn btn-primary btn-lg">Back</a>
            </div><br>
            <div class="form-group">
                <input type="text" name="title" placeholder="Book Title.." class="form-control" value=<?php echo $row['title'];?>>
            </div><br>
            <div class="form-group">
                <input type="text" name="author" placeholder="Author Name.." class="form-control"  value=<?php echo $row['author'];?>>
            </div><br>
            <div class="form-group">
                <select name="type" class="form-control">
                    <option value="">Select book type</option>
                <option value="Adventure" <?php if($row['type'] == "Adventure" ){echo "selected";}?>>Adventure</option>
                    <option value="SciFi"  <?php if($row['type'] == "SciFi" ){echo "selected";}?>>SciFi</option>
                    <option value="Fantasy"  <?php if($row['type'] == "Fantasy" ){echo "selected";}?>>Fantasy</option>
                    <option value="Comedy"  <?php if($row['type'] == "Comedy" ){echo "selected";}?>>Comedy</option>
                    <option value="Thriller and Horror" <?php if($row['type'] == "THriler and Horor" ){echo "selected";}?>>Thriller and Horror</option>
                </select>
            </div><br>
            <div class="form-group" class="form-control">
                <input type="text" name="description" placeholder="Book Description.." class="form-control"  value=<?php echo $row['description'];?>>
            </div><br>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <input type="submit" name="submit" value="Edit Book" class="btn btn-success">
            </div>
        </form>

            <?php
        }
             
             ?>
    </div>
</body>
</html>