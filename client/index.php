<?php
include "../server/db/conDB.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign in</title>
    <link href="./assets/logo.png" type="image/x-icon" rel="shortcut icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
</head>

<body>
    <div class="h-screen flex-col bg-gradient-to-b from-blue-400 to-white flex justify-center items-center">

        <!-- Login Form -->
        <div class="bg-gray-100 shadow-md md:w-2/5 w-80 rounded-lg p-8">
            <form autocomplete="off" action="../server/admin/login.php" method="POST">
                <div class="flex items-center justify-center mb-4">
                    <img src="./assets/logo.png" class="h-14 mr-3" alt="ANS Logo" />
                    <h1 class="font-extrabold md:text-2xl text-lg">ANS Library Management System</h1>
                </div>
                <h1 class="font-semibold md:text-xl text-lg md:mt-0 mt-6 md:mb-6 mb-6 text-center text-gray-900">Sign in to your account</h1 class="font-semibold text-lg">
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Enter
                        username</label>
                    <input type="username" id="username" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-2" minlength="5" maxlength="30" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Enter
                        password</label>
                    <div class="flex">
                        <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="30" minlength="8" required>
                        <div class=" mt-[0.6rem] ml-[-2rem]">
                            <i class="fa fa-eye" id="eye" aria-hidden="true" onClick="viewPassword()"></i>
                        </div>
                    </div>
                </div>
                <div class="text-right mb-6 text-xs text-blue-600 underline">
                    <a href="./admin/forgot-password.php" class="text-left">Change password?</a>
                </div>

                <!-- Display error message when entered credentials does not match any of the data registered in the database. -->
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error text-red-600 font-bold text-center mb-4 md:text-md text-sm">
                        <?php echo $_GET['error']; ?>
                    </p>
                <?php } ?>

                <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 flex justify-center items-center mx-auto">Sign
                    in</button>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script src="./js/show-hide-password.js"></script>

    <!-- Clear input boxes when wrong credentials entered. -->
    <script>
        window.history.replaceState({}, document.title, window.location.href.split('?')[0]);
    </script>
</body>

</html>