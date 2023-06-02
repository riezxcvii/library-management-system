<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ANS LMS - Admin</title>
    <link href="../assets/logo.png" type="image/x-icon" rel="shortcut icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="../js/activate.js"></script>
    <script type="text/javascript" src="../js/deactivate.js"></script>
</head>

<body>
    <div class="h-screen flex flex-col bg-gradient-to-b from-blue-400 to-white">
        <!--navigation bar-->
        <nav class="z-10 sticky top-0 bg-black border-gray-200 dark:border-black">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-2">
                <a href="dashboard.php" class="flex items-center">
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
                $admin_ID = $_SESSION['admin_ID'];

                $res = mysqli_query($conn, "SELECT * FROM library_admin 
                WHERE username='" . $_SESSION['username'] . "'");
                while ($row = mysqli_fetch_array($res)) {
                    $first  =  $row["first_name"];
                    $last  =  $row["last_name"];
                }
                ?>

                <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                    <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-transparent dark:border-gray-700">
                        <li>
                            <a href="dashboard.php" class="block py-2 pl-3 pr-4 bg-blue-700 rounded md:bg-transparent text-white md:p-0" aria-current="page">Home</a>
                        </li>
                        <!--notifications-->
                        <li>
                            <button id="dropdownNavbarLink1" data-dropdown-toggle="dropdownNavbar1" class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-white rounded md:border-0 hover:text-blue-400 md:p-0 md:w-auto">Notifications</button>
                            <!-- Dropdown menu -->
                            <div id="dropdownNavbar1" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-96 dark:divide-gray-600">
                                <ul class="py-2 text-sm text-black" aria-labelledby="dropdownLargeButton1">
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-blue-100 hover:text-black">Content Here</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-white rounded md:border-0 hover:text-blue-400 md:p-0 md:w-auto"><span><?php echo $first; ?> <?php echo $last; ?></span> <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg></button>
                            <!-- Dropdown menu -->
                            <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:divide-gray-600">
                                <ul class="py-2 text-sm text-black" aria-labelledby="dropdownLargeButton">
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-blue-100 hover:text-black">Profile</a>
                                    </li>
                                    <div class="py-1" data-modal-target="popup-modal" data-modal-toggle="popup-modal">
                                        <a href="#" class="block px-4 py-2 text-sm text-black hover:bg-blue-100 hover:text-black">Sign
                                            out</a>
                                    </div>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!--modal for sign out link-->
        <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <svg aria-hidden="true" class="mx-auto mb-4 text-gray-700 w-14 h-14" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-900">Are you sure you want to
                            sign out?</h3>
                        <a href="../../server/admin/logout.php?id=<?php echo $admin_ID; ?>">
                            <button type="button" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Yes, I'm sure
                            </button>
                        </a>
                        <button data-modal-hide="popup-modal" type="button" class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-white focus:z-10">No,
                            cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <!--button and search bar-->
        <div class="p-4 flex justify-end">
            <?php
            $pending = mysqli_query($conn, "SELECT COUNT(status) AS total FROM borrowers WHERE status = '0'");
            $p = mysqli_fetch_assoc($pending)
            ?>

            <a href="account-registration.php" class="flex mr-8">
                <button type="button" class="inline-flex items-center px-5 py-2.5 text-m font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:outline-none focus:ring-blue-300">
                    Pending Registration
                    <span class="inline-flex items-center justify-center w-8 h-8 ml-2 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full"><?php echo $p['total']; ?></span>
                </button>
            </a>
            <!--search bar-->
            <form autocomplete="off">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative w-96">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input onkeyup="mySearch()" type="search" id="default-search" class="border-0 block w-full p-4 pl-10 text-sm text-black rounded-lg bg-white focus:border-gray-500" placeholder="Search">
                </div>
            </form>
        </div>

        <!--table-->
        <div class="p-4 h-screen overflow-y-auto ">
            <div class="relative overflow-y-auto h-full bg-white shadow-md sm:rounded-lg">
                <table id="table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="sticky top-0 text-xs text-white uppercase bg-black">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Role
                                    <a href="#" onclick="sortTable(0)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                            <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                        </svg></a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Last Name
                                    <a href="#" onclick="sortTable(1)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                            <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                        </svg></a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    First Name
                                    <a href="#" onclick="sortTable(2)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                            <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                        </svg></a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Middle Initial
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Name Extension
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Account Status
                                    <a href="#" onclick="sortTable(5)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                            <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                        </svg></a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 flex justify-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $i = 0;
                        $user = $conn->query("SELECT * FROM `borrowers` 
                        WHERE status = '1'
                        ORDER BY deactivate ASC") or die(mysqli_error($conn));
                        while ($borrower = $user->fetch_array()) {
                            $id = $borrower['borrower_ID'];
                            $idNumber = $borrower['id_number'];
                            $last = $borrower['last_name'];
                            $first = $borrower['first_name'];
                            $middle = $borrower['middle_initial'];
                            $extension = $borrower['name_extension'];
                            $idNumber = $borrower['id_number'];
                            $sex = $borrower['sex'];
                            $role = $borrower['role'];
                            $status = $borrower['deactivate'];
                        ?>

                            <tr class="bg-white border-b text-black font-semibold">
                                <td scope="row" class="px-6 py-2 font-semibold text-black whitespace-nowrap">
                                    <?php echo $borrower['role'] ?>
                                </td>
                                <td class="px-6 py-2">
                                    <?php echo $borrower['last_name'] ?>
                                </td>
                                <td class="px-6 py-2">
                                    <?php echo $borrower['first_name'] ?>
                                </td>
                                <td class="px-6 py-2">
                                    <?php echo $borrower['middle_initial'] ?>
                                </td>
                                <td class="px-6 py-2">
                                    <?php echo $borrower['name_extension'] ?>
                                </td>
                                <?php
                                if  ($status=='0'){
                                ?>
                                    <td class="px-6 py-2">
                                    Active
                                    </td>
                                <?php
                                } else {
                                ?>
                                <td class="px-6 py-2 text-red-600">
                                    Deactivated
                                    </td>
                                    <?php
                                    }
                                    ?>

                                <?php
                                if ($status == '1') {
                                ?>
                                    <td class="px-6 py-2 justify-center flex">
                                        <a href="#" id="<?php echo $id; ?>" class="actbutton">
                                            <svg class="w-[1.6rem] text-black items-center align-middle my-2 mr-[1rem]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </a>
                                        <a href="./update-details-form.php?id=<?php echo $id ?>">
                                            <svg class="w-6 text-black items-center align-middle my-2 mr-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"></path>
                                            </svg>
                                        </a>
                                        <svg class="w-6 text-black items-center align-middle my-2" data-modal-target="view-modal_<?php echo $id; ?>" data-modal-toggle="view-modal_<?php echo $id; ?>" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <div id="view-modal_<?php echo $id; ?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative w-full max-w-md max-h-full">
                                                <!--view form modal content-->
                                                <div class="relative bg-gray-200 rounded-lg shadow">
                                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="view-modal_<?php echo $id; ?>">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="px-6 py-6 lg:px-8">
                                                        <h3 class="mb-4 text-xl font-medium text-gray-900 text-center">Registration Details</h3>
                                                        <form class="space-y-6" action="#" autocomplete="off">

                                                            <div class="grid grid-cols-2 gap-4 mb-[-1.4rem]">
                                                                <div>
                                                                    <label class="block mb-2 text-sm font-medium text-gray-900">ID Number</label>
                                                                    <input type="number" name="employeeID" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" onKeyPress="if(this.value.length==15) return false;" disabled value="<?php echo $idNumber ?>">
                                                                </div>

                                                                <div>
                                                                    <label class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                                                                    <select id="nameExtension" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-center" disabled>
                                                                        <option value="" selected><?php echo $role ?></option>
                                                                        <option value="Student">Student</option>
                                                                        <option value="Teacher">Teacher</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="grid grid-cols-3 gap-4 mt-[1.5rem]">
                                                                <div>
                                                                    <label class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                                                                    <input type="text" name="lastName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="20" disabled value="<?php echo $last ?>">
                                                                </div>
                                                                <div>
                                                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">First
                                                                        Name</label>
                                                                    <input type="text" name="firstName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="25" disabled value="<?php echo $first ?>">
                                                                </div>
                                                                <div>
                                                                    <label class="block mb-2 text-sm font-medium text-gray-900">Middle
                                                                        Initial</label>
                                                                    <input type="text" name="middleInitial" class="text-center bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="1" disabled value="<?php echo $middle ?>">
                                                                </div>
                                                            </div>

                                                            <div class="grid grid-cols-2 gap-4">
                                                                <div>
                                                                    <label class="block mb-2 text-sm font-medium text-gray-900">Name Extension</label>
                                                                    <select id="nameExtension" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-center" disabled>
                                                                        <option value="" selected><?php echo $extension ?></option>
                                                                    </select>
                                                                </div>

                                                                <div class="flex">
                                                                    <label class="block text-sm font-medium text-gray-900">Sex</label>
                                                                    <div class="flex items-center mb-4 mr-4">
                                                                        <input id="female" <?php if ($sex == 'Female') {
                                                                                   echo 'checked';
                                                                                } ?> type="radio" value="Female" name="sex" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 mt-5 ml-[-1rem]" disabled>
                                                                        <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 mt-5">Female</label>
                                                                    </div>
                                                                    <div class="flex items-center mb-4">
                                                                        <input id="male" <?php if ($sex == 'Male') {
                                                                                 echo 'checked';
                                                                                } ?> type="radio" value="Male" name="sex" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 mt-5" disabled>
                                                                        <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 mt-5">Male</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                <?php

                                } else {
                                ?>
                                    <td class="px-6 py-2 justify-center flex">

                                        <a href="#" id="<?php echo $id; ?>" class="delbutton">
                                            <svg class="w-6 text-black items-center align-middle my-2 mr-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                                            </svg>
                                        </a>
                                        <a href="./update-details-form.php?id=<?php echo $id ?>">
                                            <svg class="w-6 text-black items-center align-middle my-2 mr-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"></path>
                                            </svg>
                                        </a>
                                        <svg class="w-6 text-black items-center align-middle my-2" data-modal-target="view-modal_<?php echo $id; ?>" data-modal-toggle="view-modal_<?php echo $id; ?>" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <div id="view-modal_<?php echo $id; ?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative w-full max-w-md max-h-full">
                                                <!--view form modal content-->
                                                <div class="relative bg-gray-200 rounded-lg shadow">
                                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="view-modal_<?php echo $id; ?>">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="px-6 py-6 lg:px-8">
                                                        <h3 class="mb-4 text-xl font-medium text-gray-900 text-center">Registration Details</h3>
                                                        <form class="space-y-6" action="#" autocomplete="off">

                                                            <div class="grid grid-cols-2 gap-4 mb-[-1.4rem]">
                                                                <div>
                                                                    <label class="block mb-2 text-sm font-medium text-gray-900">ID Number</label>
                                                                    <input type="number" name="employeeID" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" onKeyPress="if(this.value.length==15) return false;" disabled value="<?php echo $idNumber ?>">
                                                                </div>

                                                                <div>
                                                                    <label class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                                                                    <select id="nameExtension" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-center" disabled>
                                                                        <option value="" selected><?php echo $role ?></option>
                                                                        <option value="Student">Student</option>
                                                                        <option value="Teacher">Teacher</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="grid grid-cols-3 gap-4 mt-[1.5rem]">
                                                                <div>
                                                                    <label class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                                                                    <input type="text" name="lastName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="20" disabled value="<?php echo $last ?>">
                                                                </div>
                                                                <div>
                                                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">First
                                                                        Name</label>
                                                                    <input type="text" name="firstName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="25" disabled value="<?php echo $first ?>">
                                                                </div>
                                                                <div>
                                                                    <label class="block mb-2 text-sm font-medium text-gray-900">Middle
                                                                        Initial</label>
                                                                    <input type="text" name="middleInitial" class="text-center bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="1" disabled value="<?php echo $middle ?>">
                                                                </div>
                                                            </div>

                                                            <div class="grid grid-cols-2 gap-4">
                                                                <div>
                                                                    <label class="block mb-2 text-sm font-medium text-gray-900">Name Extension</label>
                                                                    <select id="nameExtension" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-center" disabled>
                                                                        <option value="" selected><?php echo $extension ?></option>
                                                                    </select>
                                                                </div>

                                                                <div class="flex">
                                                                    <label class="block text-sm font-medium text-gray-900">Sex</label>
                                                                    <div class="flex items-center mb-4 mr-4">
                                                                        <input id="female" <?php if ($sex == 'Female') {
                                                                                                echo 'checked';
                                                                                            } ?> type="radio" value="Female" name="sex" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 mt-5 ml-[-1rem]" disabled>
                                                                        <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 mt-5">Female</label>
                                                                    </div>
                                                                    <div class="flex items-center mb-4">
                                                                        <input id="male" <?php if ($sex == 'Male') {
                                                                                                echo 'checked';
                                                                                            } ?> type="radio" value="Male" name="sex" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 mt-5" disabled>
                                                                        <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 mt-5">Male</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                <?php
                                }
                                ?>
                            </tr>

                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>

        <div class="flex justify-end pr-4 pb-2">
            <a href="../../server/print/borrower-accounts.php" target="_blank">
                <button id="print" type="button" class="mr-2 inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-green-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:outline-none focus:ring-blue-500">
                    Print
                </button>
            </a>
            <a href="dashboard.php">
                <button type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-black rounded-lg hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-red-300">
                    Back
                </button>
            </a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script src="../js/sort.js"></script>
    <script>
        function mySearch() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("default-search");
            filter = input.value.toUpperCase();
            table = document.getElementById("table");
            tr = table.getElementsByTagName("tr");
            // Loop through all table rows, and hide those who don't match the search query
            for (i = 1; i < tr.length; i++) {
                column1 = tr[i].getElementsByTagName("td")[0];
                column2 = tr[i].getElementsByTagName("td")[1];
                column3 = tr[i].getElementsByTagName("td")[2];
                column4 = tr[i].getElementsByTagName("td")[3];
                column5 = tr[i].getElementsByTagName("td")[4];
                if (column1 && column2 && column3 && column4 && column5) {
                    column1 = column1.textContent || column1.innerText;
                    column2 = column2.textContent || column2.innerText;
                    column3 = column3.textContent || column3.innerText;
                    column4 = column4.textContent || column4.innerText;
                    column5 = column5.textContent || column5.innerText;
                    if (column1.toUpperCase().indexOf(filter) > -1 || column2.toUpperCase().indexOf(filter) > -1 || column3.toUpperCase().indexOf(filter) > -1 || column4.toUpperCase().indexOf(filter) > -1 || column5.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>

</html>