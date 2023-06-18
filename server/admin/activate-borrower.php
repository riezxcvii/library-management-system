<?php
include("../db/conDB.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE borrowers SET deactivate = 0, deactivation_date = '' WHERE borrower_ID = '$id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "Account activated successfully.";
    } else {
        echo "Failed to activate borrower account.";
    }
}
