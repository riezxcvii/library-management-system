<?php
include("../../server/db/conDB.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $return = date("Y-m-d", strtotime("+8 HOURS"));
    $sql = "UPDATE borrowed_books SET status = 'Returned', returned_date = '$return', copies= copies - 1 WHERE borrow_ID = '$id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        header('location:return-book.php');
    } else {
        echo "Cannot return book.";
    }
}
