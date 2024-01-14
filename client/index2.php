<?php
include "../server/db/conDB.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link href="./assets/logo.png" type="image/x-icon" rel="shortcut icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>

<body>
    <div class="h-screen flex-col bg-gradient-to-b from-blue-400 to-white flex justify-center items-center">
        <!-- Login Form -->
        <div class="bg-gray-100 shadow-md md:w-2/5 w-80 rounded-lg p-8">
            <div class="flex items-center justify-center mb-4">
                <img src="./assets/logo.png" class="h-14 mr-3" alt="ANS Logo" />
                <h1 class="font-extrabold md:text-2xl text-lg">ANS Library Management System</h1>
            </div>
            <h1 class="font-semibold md:text-xl text-center mb-4">Scan your QR Code here!</h1>
            <form action="../server/borrower/login.php" method="POST">
                <!-- QR Code Scanner -->
                <div class="md:w-[20rem] w-full flex justify-center items-center mx-auto">
                    <div>
                        <video id="preview"></video>
                    </div>

                    <div>
                        <input type="text" name="qrcode_text" id="text" readonly="" class="hidden">
                    </div>
                </div>

                <!-- Display error message when credentials does not match any of the data registered in the database. -->
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error text-red-600 font-bold text-center mt-4">
                        <?php echo $_GET['error']; ?>
                    </p>
                <?php } ?>

                <!-- Link -->
                <div class="underline text-blue-700 text-center mt-4 w-full md:text-base text-sm">
                    <a href="./borrower/create-account.php">No library account yet? Sign up!</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script src="../client/js/qr-scanner.js"></script>
</body>

</html>