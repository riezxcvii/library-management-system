<?php
include("../db/conDB.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE library_admin SET deactivate = 1 WHERE admin_ID = '$id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "Account deactivated successfully.";
    } else {
        echo "Failed to deactivate account.";
    }
}
