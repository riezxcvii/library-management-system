<?php
include("../db/conDB.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE borrowed_books SET paid = '1' WHERE borrow_ID = '$id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "<script>
            alert('Penalty cleared successfully.');
            window.location.href='../../client/librarian/return-book.php'
            </script>";
    } else {
        echo "Failed to clear penalty.";
    }
}
