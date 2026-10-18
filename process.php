<?php
include "database.php";
if(isset($_POST['submit'])){
            $id = $_POST['id'];
            $title = $_POST['title'];
            $author = $_POST['author'];
            $type = $_POST['type'];
            $description = $_POST['description'];

            $sql = "UPDATE books SET title = '$title', author='$author', type = '$type', description = '$description' WHERE id=$id";
            $result = mysqli_query($conn, $sql);
                if($result){
                session_start();
                $_SESSION['edit'] = "Book updated Successfully!!";
                header("Location: index.php");
            }
            else{
                die("Something went wrong!!");
            }
}

?>