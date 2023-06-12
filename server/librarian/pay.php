<?php
include("../db/conDB.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE borrowed_books SET penalty = '0' WHERE borrow_ID = '$id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        header('location:../../client/librarian/return-book.php');
    } else {
        echo "Failed to clear penalty.";
    }
}
