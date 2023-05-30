<?php

session_start();
include "../db/conDB.php";

if (isset($_POST['qrcode_text'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $qrcode_text = validate($_POST['qrcode_text']);

    if (empty($qrcode_text)) {
        header("Location: ../../client/index2.php?error=ID number is required!");
        exit();
    } else {
        $sql = "SELECT * FROM borrowers WHERE id_number='$qrcode_text' AND status='1'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if ($row['id_number'] === $qrcode_text) {
                echo "Logged in!";
                $_SESSION['id_number'] = $row['id_number'];
                $_SESSION['borrower_ID'] = $row['borrower_ID'];
                $id = $row['borrower_ID'];
                $sql1 = "INSERT INTO `log_history` (borrower_ID, date,time_in)VALUES('$id',NOW(),NOW())";
                $res = mysqli_query($conn, $sql1);
                if ($res) {
                    header("Location: ../../client/borrower/search-book.php");
                    exit();
                } else {
                    echo "Error!";
                }
            } else {
                header("Location: ../../client/index2.php?error=Invalid credentials!");
                exit();
            }
        } else {
            header("Location: ../../client/index2.php?error=Account does not exist.");
            exit();
        }
    }
} else {
    header("Location: ../../client/index2.php");
    exit();
}
