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
        if(isset($_POST['submit'])){
            $title = $_POST['title'];
            $author = $_POST['author'];
            $type = $_POST['type'];
            $description = $_POST['description'];

            $sql = "INSERT INTO books(title, author, type, description) VALUES('$title', '$author', '$type', '$description')";
            $result = mysqli_query($conn, $sql);
            if(!$result){
                die("Something went wrong!! <br>");
            }
            else{
                session_start();
                $_SESSION['create'] = "Books added successfully!!";
                header("Location: index.php");
            }
        }
        
        
        ?>
        <form action="create.php" method="post">
            <div class="header d-flex justify-content-between my-4">
                <h1>Add New Book</h1>
                <a href="index.php" class="btn btn-primary btn-lg">Back</a>
            </div><br>
            <div class="form-group">
                <input type="text" name="title" placeholder="Book Title.." class="form-control">
            </div><br>
            <div class="form-group">
                <input type="text" name="author" placeholder="Author Name.." class="form-control">
            </div><br>
            <div class="form-group">
                <select name="type" class="form-control">
                    <option value="">Select book type</option>
                    <option value="Adventure">Adventure</option>
                    <option value="SciFi">SciFi</option>
                    <option value="Fantasy">Fantasy</option>
                    <option value="Comedy">Comedy</option>
                    <option value="Thriller and Horror">Thriller and Horror</option>
                </select>
            </div><br>
            <div class="form-group" class="form-control">
                <input type="text" name="description" placeholder="Book Description.." class="form-control">
            </div><br>
            <div class="form-group">
                <input type="submit" name="submit" value="Add Book" class="btn btn-success">
            </div>
        </form>
    </div>
</body>
</html>