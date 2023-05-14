<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="../assets/logo.png" type="image/x-icon" rel="shortcut icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="h-screen flex flex-col bg-gradient-to-b from-blue-400 to-white">
        <!--navigation bar-->
        <nav class="sticky top-0 bg-black border-gray-200 dark:border-black">
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
                <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                    <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-transparent dark:border-gray-700">
                        <li>
                            <a href="dashboard.php" class="block py-2 pl-3 pr-4 bg-blue-700 rounded md:bg-transparent text-blue-400 md:p-0" aria-current="page">Home</a>
                        </li>
                        <li>
                            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-white rounded md:border-0 hover:text-blue-400 md:p-0 md:w-auto">Rieza
                                Marie Banquillo <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
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
                        <a href="../index.php">
                            <button data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Yes, I'm sure
                            </button>
                        </a>
                        <button data-modal-hide="popup-modal" type="button" class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-white focus:z-10">No,
                            cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <!--cards-->
        <div class="flex justify-center items-center flex-1">
            <div class="inline-flex flex-wrap gap-4 sm:gap-12">
                <!--book management card-->
                <div class="w-full sm:w-72 p-4 bg-black border border-gray-200 rounded-lg shadow sm:p-8 dark:border-gray-700">
                    <h5 class="mb-4 text-xl text-center font-semibold text-white">Book Management</h5>
                    <div class="mb-8 w-full flex items-baseline justify-center text-gray-900 dark:text-white text-center">
                        <span class="text-md text-gray-400 font-semiabold">View and add books.</span>
                    </div>
                    <a href="./all-books.html">
                        <button type="button" class="text-white bg-blue-500 hover:bg-blue-500 focus:ring-1 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full sm:text-center">Open</button>
                    </a>
                </div>
                <!--book transaction card-->
                <div class="w-full sm:w-72 p-4 bg-black border border-gray-200 rounded-lg shadow sm:p-8 dark:border-gray-700">
                    <h5 class="mb-4 text-xl text-center font-semibold text-white">Book Transaction</h5>
                    <div class="mb-8 w-full flex items-baseline justify-center text-gray-900 dark:text-white text-center">
                        <span class="text-md text-gray-400 font-semiabold">Borrow and return books.</span>
                    </div>
                    <div class="flex gap-4 justify-center">
                        <a href="./borrow-book.html">
                            <button type="button" class="text-white bg-blue-500 hover:bg-blue-500 focus:ring-1 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full sm:text-center">Borrow</button>
                        </a>
                        <a href="./return-book.html">
                            <button type="button" class="text-white bg-blue-500 hover:bg-blue-500 focus:ring-1 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full sm:text-center">Return</button>
                        </a>
                    </div>
                </div>
                <!--boook reports card-->
                <div class="w-full sm:w-72 p-4 bg-black border border-gray-200 rounded-lg shadow sm:p-8 dark:border-gray-700">
                    <h5 class="mb-4 text-xl text-center font-semibold text-white">Reports</h5>
                    <div class="mb-8 w-full flex items-baseline justify-center text-gray-900 dark:text-white text-center">
                        <span class="text-md text-gray-400 font-semiabold">View reports.</span>
                    </div>
                    <div class="flex gap-4 justify-center">
                        <a href="./inventory-reports.html">
                            <button type="button" class="text-white bg-blue-500 hover:bg-blue-500 focus:ring-1 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full sm:text-center">Inventory</button>
                        </a>
                        <a href="./statistical-reports.html">
                            <button type="button" class="text-white bg-blue-500 hover:bg-blue-500 focus:ring-1 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full sm:text-center">Statistical</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>