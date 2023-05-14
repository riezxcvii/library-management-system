<?php
include "../db/conDB.php";
$sql = "UPDATE `log_history` SET time_out = NOW() WHERE date = CURDATE() ORDER BY time_in DESC LIMIT 1 ";
mysqli_query($conn, $sql);
session_destroy();
header("Location: ../../client/index.php");
