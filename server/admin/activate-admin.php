<?php
include("../db/conDB.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE library_admin SET deactivate = 0 WHERE admin_ID = '$id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "Account activated successfully.";
    } else {
        echo "Failed to activate account.";
    }
}
