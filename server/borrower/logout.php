<?php
include "../db/conDB.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE `log_history` SET time_out = NOW() WHERE date = CURDATE() and borrower_ID = $id ORDER BY time_in DESC LIMIT 1 ";
    mysqli_query($conn, $sql);
    session_destroy();
    header("Location: ../../client/index2.php");
}
