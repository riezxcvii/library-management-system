<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change Password</title>
    <link href="../assets/logo.png" type="image/x-icon" rel="shortcut icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
</head>

<body>
    <div class="h-screen flex-col bg-gradient-to-b from-blue-400 to-white flex justify-center items-center">
        <!-- Forgot Password Form -->
        <div class="bg-gray-100 shadow-md md:w-2/5 w-80 rounded-lg p-8">
            <form autocomplete="off" method="POST" action="../../server/admin/forgot.php">
                <div class="flex items-center justify-center mb-4">
                    <img src="../assets/logo.png" class="h-14 mr-3" alt="ANS Logo" />
                    <h1 class="font-extrabold md:text-2xl text-lg">ANS Library Management System</h1>
                </div>
                <h1 class="font-semibold md:text-xl text-lg mb-6 md:mt-0 mt-6 text-center text-gray-900">Change your password</h1 class="font-semibold text-lg">
                <div class="mb-6">
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Enter
                        username</label>
                    <input type="text" id="username" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-2" maxlength="30" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Enter
                        current password</label>
                    <div class="flex">
                        <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-2" maxlength="30" required>
                        <div class="w-4 mt-[1.15rem] ml-[-2rem]">
                            <i class="fa fa-eye" id="eye" aria-hidden="true" onClick="viewPassword()"></i>
                        </div>
                    </div>
                </div>
                <div class="mb-6">
                    <label for="newPassword" class="block mb-2 text-sm font-medium text-gray-900">Enter
                        new password</label>
                    <div class="flex">
                        <input type="password" id="newPassword" name="newPassword" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-2" maxlength="30" required>
                        <div class="w-4 mt-[1.15rem] ml-[-2rem]">
                            <i class="fa fa-eye" id="eye" aria-hidden="true" onClick="viewNewPassword()"></i>
                        </div>
                    </div>
                </div>
                <!-- Display error message when entered credentials does not match any of the data registered in the database. -->
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error text-red-600 font-bold text-center mb-4 md:text-md text-sm">
                        <?php echo $_GET['error']; ?>
                    </p>
                <?php } ?>
                <!-- Display success message when entered credentials matched any of the data registered in the database. -->
                <?php if (isset($_GET['success'])) { ?>
                    <p class="success text-green-700 font-bold text-center mb-4 md:text-md text-sm">
                        <?php echo $_GET['success']; ?>
                    </p>
                <?php } ?>
                <div class="flex gap-4">
                    <a href="../../index.php" class="w-full text-white bg-red-700 hover:bg-red-600 focus:ring-2 focus:outline-none focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <button type="button">Return to Login</button>
                    </a>
                    <button type="submit" class="w-full text-white bg-green-700 hover:bg-green-600 focus:ring-2 focus:outline-none focus:ring-green-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Change
                        Password</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script src="../js//show-hide-password.js"></script>
    <script src="../js//show-hide-newPassword.js"></script>
    <!-- Clear input boxes when wrong credentials entered. -->
    <script>
        window.history.replaceState({}, document.title, window.location.href.split('?')[0]);
    </script>
</body>

</html>