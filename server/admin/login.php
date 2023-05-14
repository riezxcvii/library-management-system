<?php

session_start();
include "../db/conDB.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    if (empty($username)) {
        header("Location: ../../client/index.php");
        exit();
    } else if (empty($password)) {
        header("Location: ../../client/index.php");
        exit();
    } else {
        $sql = "SELECT * FROM library_admin WHERE username='$username' AND password='$password' AND status='1'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if ($row['username'] === $username && $row['password'] === $password) {
                if ($row['role'] == 'Admin') {
                    echo "Logged in!";
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['admin_ID'] = $row['admin_ID'];
                    header("Location: ../../client/admin/dashboard.php");
                    exit();
                } else {
                    echo "Logged in!";
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['admin_ID'] = $row['admin_ID'];
                    header("Location: ../../client/librarian/dashboard.php");
                    exit();
                }
            } else {
                header("Location: ../../client/index.php");
                exit();
            }
        } else {
            header("Location: ../../client/index.php");
            exit();
        }
    }
} else {
    header("Location: ../../client/index.php");
    exit();
}
