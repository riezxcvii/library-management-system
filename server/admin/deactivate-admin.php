<?php
include("../db/conDB.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $date = date("Y.m.d", strtotime("+6 HOURS"));
    $sql = "UPDATE library_admin SET deactivate = 1, deactivation_date = '$date' WHERE admin_ID = '$id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "Account deactivated successfully.";
    } else {
        echo "Failed to deactivate account.";
    }
}
