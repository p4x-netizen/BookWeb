<?php 
include "database.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM books WHERE id=$id";
    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION['delete'] = "Book deleted successfully!!";
        header("Location: index.php");
    }

}

?>