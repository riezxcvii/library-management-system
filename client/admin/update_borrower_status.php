<?php

include "../../server/db/conDB.php";
// Get the borrower ID and status from the AJAX request
$borrowerId = $_POST['borrowerId'];
$status = $_POST['status'];


$sql = " UPDATE borrowers SET status = :status WHERE borrower_ID = :borrowerId";
$res = mysqli_query($conn, $sql);
