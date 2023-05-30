<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ANS LMS - Borrower</title>
    <link href="../assets/logo.png" type="image/x-icon" rel="shortcut icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="h-screen flex flex-col bg-gradient-to-b from-blue-400 to-white">
        <!--navigation bar-->
        <nav class="z-10 sticky top-0 bg-black border-gray-200 dark:border-black">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-2">
                <a href="search-book.php" class="flex items-center">
                    <img src="../assets/logo.png" class="h-12 mr-3" alt="ANS Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">ANS Library
                        Management System</span>
                </a>
                <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </button>

                <?php
                session_start();
                include "../../server/db/conDB.php";
                $borrower_ID = $_SESSION['borrower_ID'];

                $res = mysqli_query($conn, "SELECT * FROM borrowers where id_number='" . $_SESSION['id_number'] . "'");
                while ($row = mysqli_fetch_array($res)) {
                    $first  =  $row["first_name"];
                    $last  =  $row["last_name"];
                    $id  =  $row["borrower_ID"];
                }
                ?>

                <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                    <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-transparent dark:border-gray-700">
                        <li>
                            <a href="search-book.php" class="block py-2 pl-3 pr-4 bg-blue-700 rounded md:bg-transparent text-white md:p-0" aria-current="page">Home</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="mb-4 flex justify-center items-center mt-[-0.3rem]">
            <div class="bg-gray-50 rounded-md m-12 my-8 w-[30rem]">
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 text-center">Registration Form</h3>
                    <form class="space-y-6" action="#" autocomplete="off" method="POST">

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900">ID Number</label>
                                <input type="number" name="employeeID" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" onKeyPress="if(this.value.length==20) return false;" required>
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                                <select id="nameExtension" name="role" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                    <option value="" selected>Select Role</option>
                                    <option value="Student">Student</option>
                                    <option value="Teacher">Teacher</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                                <input type="text" name="lastName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="20" required maxlength="20" minlength="2">
                            </div>
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">First
                                    Name</label>
                                <input type="text" name="firstName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="25" required maxlength="20" minlength="2">
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900">Middle
                                    Initial</label>
                                <input type="text" name="middleInitial" class="text-center bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="1">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900">Name Extension</label>
                                <select id="nameExtension" name="extension" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-center">
                                    <option value="" selected>Select Extension</option>
                                    <option value="Jr">Jr</option>
                                    <option value="Sr">Sr</option>
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                    <option value="V">V</option>
                                    <option value="VI">VI</option>
                                    <option value="VII">VII</option>
                                    <option value="VIII">VIII</option>
                                </select>
                            </div>

                            <div class="flex">
                                <label class="block text-sm font-medium text-gray-900">Sex</label>
                                <div class="flex items-center mb-4 mr-4">
                                    <input id="female" type="radio" value="Female" name="sex" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-400 focus:ring-blue-500 dark:focus:ring-blue-600 mt-5 ml-[-1rem]" required>
                                    <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 mt-5">Female</label>
                                </div>
                                <div class="flex items-center mb-4">
                                    <input id="male" type="radio" value="Male" name="sex" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-400 focus:ring-blue-500 dark:focus:ring-blue-600 mt-5" required>
                                    <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 mt-5">Male</label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" name="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register</button>
                    </form>
                    <?php
                    if (isset($_POST['submit'])) {
                        $id = $_POST['employeeID'];
                        $role = $_POST['role'];
                        $last_name = $_POST['lastName'];
                        $first_name = $_POST['firstName'];
                        $middle_initial = $_POST['middleInitial'];
                        $extension = $_POST['extension'];
                        $sex = $_POST['sex'];

                        $sql = "INSERT INTO `borrowers` (id_number, first_name,last_name, middle_initial,name_extension,sex,role,status)VALUES('$id', '$first_name','$last_name','$middle_initial','$extension','$sex','$role',0)";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            echo "<script>
                        window.location.href='../index2.php'
                        </script>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="flex justify-end pr-4 pb-2 mt-[-1.5rem]">
            <a href="../index2.php">
                <button type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-black rounded-lg hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-red-300">
                    Back
                </button>
            </a>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>