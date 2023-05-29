<?php
include "./server/db/conDB.php";

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['newPassword'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    $newPassword = validate($_POST['newPassword']);

    if (empty($username)) {
        header("Location: ../../client/admin/forgot-password.php");
        exit();
    } else if (empty($password)) {
        header("Location: ../../client/admin/forgot-password.php");
        exit();
    } else if (empty($newPassword)) {
        header("Location: ../../client/admin/forgot-password.php");
        exit();
    } else {

        $sql = "SELECT username FROM library_admin WHERE username='$_POST[username]' AND password='$_POST[password]'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $sql_2 = "UPDATE library_admin SET password='$_POST[newPassword]' WHERE username='$_POST[username]'";
            mysqli_query($conn, $sql_2);
            header("Location: ../../client/index.php");
            exit();
        } else {
            header("../../client/admin/forgot-password.php");
            exit();
        }
    }
} else {
    header("Location: ../../client/admin/forgot-password.php");
    exit();
}
