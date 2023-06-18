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
        $sql = "SELECT * FROM borrowers WHERE id_number='$qrcode_text' AND status='1' AND deactivate='0'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if ($row['id_number'] === $qrcode_text) {
                echo "Logged in!";
                $_SESSION['id_number'] = $row['id_number'];
                $_SESSION['borrower_ID'] = $row['borrower_ID'];
                $id = $row['borrower_ID'];
                $currentDate = date("Y-m-d");
                $sql1 = "INSERT INTO `log_history` (borrower_ID, date,time_in)VALUES('$id',NOW(),NOW())";
                $res = mysqli_query($conn, $sql1);
                if ($res) {
                    $query = "SELECT * FROM `borrowed_books` WHERE `borrower_ID` = '$row[borrower_ID]'";
                    $qbook = $conn->query($query) or die(mysqli_error($conn));
                    $fbook = mysqli_fetch_assoc($qbook);
                    if ($fbook && $fbook['penalty'] > 0) {
                        $penalty = "" . $fbook['penalty'] . ".00";
                        $borrowerId = mysqli_insert_id($conn);
                        $notificationText = "" . $row['first_name'] . " " . $row['last_name'] . " who just logged in has a pending fine of " . $penalty . " for not returning book on time.";

                        // Insert the notification into the notifications table
                        $insertQuery = "INSERT INTO notification (borrower_ID,notification_text,type,date) VALUES ($borrowerId,'$notificationText', 'admin','$currentDate')";
                        $conn->query($insertQuery);
                        header("Location: ../../client/borrower/search-book.php");
                        exit();
                    } else {
                        header("Location: ../../client/borrower/search-book.php");
                        exit();
                    }
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
