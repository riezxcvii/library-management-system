<?php
include('navigation-bar.php');
?>

<!--cards-->
<div class="flex justify-center items-center flex-1">
    <div class="inline-flex flex-wrap gap-4 sm:gap-12">
        <!--log history card-->
        <div class="w-full sm:w-72 p-4 bg-black border border-gray-200 rounded-lg shadow sm:p-8 dark:border-gray-700">
            <h5 class="mb-4 text-xl text-center font-semibold text-white">Log History</h5>
            <div class="mb-8 w-full flex items-baseline justify-center text-gray-900 dark:text-white text-center">
                <span class="text-md text-gray-400 font-semiabold">View users log in details.</span>
            </div>
            <a href="log-history.php">
                <button type="button" class="text-white bg-blue-500 hover:bg-blue-500 focus:ring-1 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full sm:text-center">View</button>
            </a>
        </div>
        <!--account management card-->
        <div class="w-full sm:w-72 p-4 bg-black border border-gray-200 rounded-lg shadow sm:p-8 dark:border-gray-700">
            <h5 class="mb-4 text-xl text-center font-semibold text-white">Account Management</h5>
            <div class="mb-8 w-full flex items-baseline justify-center text-gray-900 dark:text-white text-center">
                <span class="text-md text-gray-400 font-semiabold">Manage pending registrations.</span>
            </div>
            <div class="flex gap-4 justify-center">
                <a href="librarian-registration.php">
                    <button type="button" class="text-white bg-blue-500 hover:bg-blue-500 focus:ring-1 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full sm:text-center">Librarian</button>
                </a>
                <a href="account-registration.php">
                    <button type="button" class="text-white bg-blue-500 hover:bg-blue-500 focus:ring-1 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full sm:text-center">Borrower</button>
                </a>
            </div>
        </div>
        <!--account reports card-->
        <div class="w-full sm:w-72 p-4 bg-black border border-gray-200 rounded-lg shadow sm:p-8 dark:border-gray-700">
            <h5 class="mb-4 text-xl text-center font-semibold text-white">Account Reports</h5>
            <div class="mb-8 w-full flex items-baseline justify-center text-gray-900 dark:text-white text-center">
                <span class="text-md text-gray-400 font-semiabold">Manage registered users.</span>
            </div>
            <div class="flex gap-4 justify-center">
                <a href="librarian-accounts.php">
                    <button type="button" class="text-white bg-blue-500 hover:bg-blue-500 focus:ring-1 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full sm:text-center">Librarian</button>
                </a>
                <a href="account-reports.php">
                    <button type="button" class="text-white bg-blue-500 hover:bg-blue-500 focus:ring-1 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full sm:text-center">Borrower</button>
                </a>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>