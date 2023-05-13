<?php

session_start();
include ".././db/conDB.php";

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
        header("Location: ../../client/src/index.php?error=Username is required.");
        exit();
    } else if (empty($password)) {
        header("Location: ../../client/src/index.php?error=Password is required.");
        exit();
    } else {
        $sql = "SELECT * FROM library_admin WHERE username='$username' AND password='$password' AND status='Active'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if ($row['username'] === $username && $row['password'] === $password && $row['role'] ==='Admin') {
                echo "Logged in!";
                $_SESSION['username'] = $row['username'];
                $_SESSION['admin_ID'] = $row['admin_ID'];
                header("Location: ../../client/src/pages/admin/dashboard.html");
                exit();
            }if ($row['username'] === $username && $row['password'] === $password && $row['role'] ==='librarian') {
                    echo "Logged in!";
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['admin_ID'] = $row['admin_ID'];
                    header("Location: ../../client/src/pages/librarian/dashboard.html");
                    exit();
                } 
            else {
                header("Location: ../../client/src/index.php?error=Incorrect username or password.");
                exit();
            }
        } else {
            header("Location: ../../client/src/index.php?error=Incorrect username or password.");
            exit();
        }
    }
} else {
    header("Location: ../../client/src/index.php");
    exit();
}
