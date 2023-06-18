<?php
include("../db/conDB.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE books SET archive = 0 WHERE book_ID = '$id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "Book returned to stock successfully.";
    } else {
        echo "Failed to return book to stock.";
    }
}
