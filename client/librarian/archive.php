<?php

include("../../server/db/conDB.php");

if (isset($_GET['id'])) {
    $bookId = $_GET['id'];

    // Execute the query to update the book status
    $sql = "UPDATE books SET archive = 1 WHERE book_ID = $bookId";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo "Book archived successfully.";
    } else {
        echo "Failed to archive the book.";
    }
}
