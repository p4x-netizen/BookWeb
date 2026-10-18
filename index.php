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
     <link rel="stylesheet" href="style.css">
    <title>Book List</title>
</head>
<style>
    .header a{
        margin-left: 300px;
    }
</style>
<?php 
if(isset($_SESSION['create'])){
    ?>
    <div class="alert alert-success">
        <?php 
        echo $_SESSION['create'];
        unset($_SESSION['create']);

        ?>
    </div>

 <?php   
}
?>
<?php 
if(isset($_SESSION['edit'])){
    ?>
    <div class="alert alert-success">
        <?php 
        echo $_SESSION['edit'];
        unset($_SESSION['edit']);

        ?>
    </div>

 <?php   
}
?>
<?php 
if(isset($_SESSION['delete'])){
    ?>
    <div class="alert alert-success">
        <?php 
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);

        ?>
    </div>

 <?php   
}
?>
<body>
        <div class="header d-flex justify-content-between my-4">
                <h1>Book List</h1>
                <a href="create.php" class="btn btn-primary btn-lg dir='ltr'">Add New Book</a>
        </div><br>
        <table class="table">
            <thead>
                <tr>
                <th>#</th>
                <th>Title</th>
                <th>Author</th>
                <th>Type</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include "database.php";
                $sql = "SELECT * FROM books";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($result)){
                ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["title"]; ?></td>
                        <td><?php echo $row["author"]; ?></td>
                        <td><?php echo $row["type"]; ?></td>
                        <td>
                            <a href="readmore.php? id=<?php echo $row["id"]; ?>" class="btn btn-primary">Read more</a>
                            <a href="edit.php? id=<?php  echo $row["id"]; ?>" class="btn btn-warning">Edit</a>
                             <a href="delete.php? id=<?php  echo $row["id"]; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <a href="logout.php" class="btn btn-warning">Log Out</a>
</body>
</html>