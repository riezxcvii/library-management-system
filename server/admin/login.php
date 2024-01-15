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
        header("Location: ../../index.php?error=Username is required!");
        exit();
    } else if (empty($password)) {
        header("Location: ../../index.php?error=Password is required!");
        exit();
    } else {
        $sql = "SELECT * FROM library_admin WHERE username='$username' AND password='$password' AND status=1 AND deactivate=0";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if ($row['username'] === $username && $row['password'] === $password) {
                if ($row['role'] == 'Admin') {
                    echo "Logged in!";
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['admin_ID'] = $row['admin_ID'];
                    $id = $row['admin_ID'];
                    $sql1 = "INSERT INTO `log_history` (admin_ID, date,time_in)VALUES('$id',NOW(),NOW())";
                    $res = mysqli_query($conn, $sql1);
                    if ($res) {
                        header("Location: ../../client/admin/dashboard.php");
                        exit();
                    } else {
                        echo "Cannot record log history.";
                    }
                } else {
                    echo "Logged in!";
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['admin_ID'] = $row['admin_ID'];
                    $id = $row['admin_ID'];
                    $sql1 = "INSERT INTO `log_history` (admin_ID, date,time_in)VALUES('$id',NOW(),NOW())";
                    $res = mysqli_query($conn, $sql1);
                    header("Location: ../../client/librarian/dashboard.php");
                    exit();
                }
            } else {
                header("Location: ../../index.php");
                exit();
            }
        } else {
            header("Location: ../../index.php?error=Invalid credentials!");
            exit();
        }
    }
} else {
    header("Location: ../../index.php");
    exit();
}
